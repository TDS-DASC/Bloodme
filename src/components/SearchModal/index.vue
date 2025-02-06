<template>
     <div class="fixed inset-0 h-screen flex flex-col justify-center items-center
        bg-white bg-opacity-50 dark:bg-black-900 dark:bg-opacity-50 z-10" >
        <div class="relative w-1/4 group">
            <div class="fixed inset-0 h-screen flex flex-col justify-center items-center z-10 gap-2">
                <div class="flex flex-col pb-2 gap-2 bg-white w-1/2 justify-start 
                items-center align-middle border-2 shadow-lg rounded-md min-h-60 overflow-hidden
                dark:bg-black-900 dark:border-black-400 ">
                    <div class="flex border-b-2 border-gray-200 pb-2 w-full p-2 gap-2
                        dark:bg-black-900">
                        <input
                            class="h-8 p-2 w-full focus:outline-none transition-all duration-300 border-2 border-gray-400 rounded-md
                            dark:border-black-600 "
                            placeholder="Buscar por nombre"
                            @input="searchInputEvent($event.target.value)"
                        />
                        <Button btnClass="btn-danger" class="p-4 py-1" text="X" @click="action(false, null)" />
                    </div>
                    <div class="select-none p-4 w-full">
                        <div class="overflow-hidden w-full flex flex-col gap-1 px-1 py-2">
                            <Button v-for="item, index in paginatedValues" :key="index"  
                            :btnClass="'btn-secondary'" class="p-2 py-0 w-full focus:outline-none transition-all duration-300
                            flex flex-col border-white bg-gray-200 text-black-900 
                            hover:bg-cyan-200 hover:border-black-600 z-10 
                            dark:bg-white dark:hover:bg-black-800 dark:hover:border-blue-400 dark:hover:text-white dark:border-b-2
                            dark:hover:-translate-y-1"
                            @click="action(false, [item.value, item.label])">
                                <!-- <Button btnClass="btn-primary" class="text-left w-full bg-cyan-700"  @click="action(false, item.label)"> {{ item.label }} </Button> -->
                                <p>{{ item.label }}</p>
                            </Button>
                        </div>
                    </div>
                    <div class="flex justify-center gap-2">
                        <Button :btnClass="selectedPage === index ? 'btn-primary' : 'btn-secondary'" v-for="index in numberOfPages" :key="index" class="py-1 px-4" @click="selectedPage=index">{{ index }}</Button>
                    </div>
                    <div v-if="loadingFlag" class="absolute z-10 w-24 h-24 mt-24 flex justify-center items-center ">
                        <div class="w-full">
                            <div class="w-24 h-24">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-dasharray="15" stroke-dashoffset="15" stroke-linecap="round" stroke-width="2" d="M12 3C16.9706 3 21 7.02944 21 12">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/>
                                    <animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/>
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Icon from "@/components/Icon";
    import Button from "@/components/Button";
    import { ref, watch, defineEmits } from "vue";
    export default{

        components: {
            Icon,
            Button
        },
        props: {
            modalValues: {
                type: Array,
                required: true,
            }
        },
        setup(props, { emit }) { 
            const loadingFlag = ref(true)
            const paginatedValues = ref(new Array())
            const numberOfPages = ref(0)
            const selectedPage = ref(1)
            const elementsPerPageWanted = ref(10)

            function searchInputEvent(searchQuery){
                if (searchQuery.trim() == '' || searchQuery == '') {
                    paginatedValues.value = paginateValues(props.modalValues, elementsPerPageWanted.value)
                    selectedPage.value = 1
                    return;
                }

                const filteredData = props.modalValues.filter(item => {
                    const searchString = [
                        item.label
                    ].join(' ').toLowerCase();

                    return searchString.includes(searchQuery.toLowerCase());
                });
                paginatedValues.value = paginateValues(filteredData, elementsPerPageWanted.value);
            } 

            function paginateValues(unpaginatedArray, numberOfElementsPerPage){
                const paginatedArray = unpaginatedArray.slice(0,numberOfElementsPerPage);
                numberOfPages.value = Math.ceil((unpaginatedArray.length)/elementsPerPageWanted.value)
                loadingFlag.value = false
                return paginatedArray
            }

            const action = (flag, value) => emit('close', [flag, value]);

            /* Watch & do this on props.modalValues change */
            watch(() => props.modalValues, (newVal) => {
                if (props.modalValues.length > 0) {
                    paginatedValues.value = paginateValues(props.modalValues, elementsPerPageWanted.value)
                    console.log(paginatedValues)
                }
            }, { immediate: true });

            /* Watch & do this on selectedPage change */
            watch(selectedPage, () => {
                let base = 10
                let index = base*(selectedPage.value-1)
                paginatedValues.value = props.modalValues.slice((index),(index+base))
            })

            return {
                paginatedValues,
                numberOfPages,
                selectedPage,
                action,
                searchInputEvent,
                loadingFlag
            };
        }
    }
</script>