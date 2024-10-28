<template>
     <div class="fixed inset-0 h-screen flex flex-col justify-center items-center bg-white bg-opacity-30 z-10" >
        <div class="w-1/4 group">
            <div class="fixed inset-0 h-screen flex flex-col justify-center items-center bg-white bg-opacity-40 z-10 gap-2">
                <div class="flex flex-col pb-2 gap-2 bg-white w-1/2 justify-center items-center align-middle border-2 shadow-lg rounded-md">
                    <div class="flex border-b-2 border-gray-200 pb-2 w-full p-2 gap-2">
                        <input
                            class="h-8 p-2 w-full focus:outline-none transition-all duration-300 border-2 border-gray-400 rounded-md"
                            placeholder="Buscar..."
                            @input="searchInputEvent($event.target.value)"
                        />
                        <Button btnClass="btn-danger" class="p-4 py-1" text="X" @click="action(false, null)" />
                    </div>
                    <div class="select-none p-4">
                        <div class="grid grid-cols-5 overflow-hidden gap-5 w-full">
                            <div v-for="item, index in paginatedValues" :key="index"  
                            class="p-2 w-full focus:outline-none transition-all duration-300
                            flex justify-center items-center">
                                <Button btnClass="btn-primary" class="text-left w-full bg-cyan-700"  @click="action(false, item.label)"> {{ item.label }} </Button>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center gap-2">
                        <Button :btnClass="selectedPage === index ? 'btn-primary' : 'btn-secondary'" v-for="index in numberOfPages" :key="index" class="py-1 px-4" @click="selectedPage=index">{{ index }}</Button>
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
            const paginatedValues = ref(new Array())
            const numberOfPages = ref(0)
            const selectedPage = ref(1)
            const elementsPerPageWanted = ref(10)

            /*  */
            function searchInputEvent(searchQuery){
                if (searchQuery.trim() == '' || searchQuery == '') {
                    paginatedValues.value = paginateValues(props.modalValues, elementsPerPageWanted.value);
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
                return paginatedArray
            }

            const action = (flag, value) => emit('close', [flag, value]);

            watch(() => props.modalValues, (newVal) => {
                if (newVal && newVal.values) {
                    paginatedValues.value = paginateValues(props.modalValues, elementsPerPageWanted.value)
                    numberOfPages.value = Math.ceil((props.modalValues.length)/elementsPerPageWanted.value)
                }
            }, { immediate: true });

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
                searchInputEvent
            };
        }
    }
</script>