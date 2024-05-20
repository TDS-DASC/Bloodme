<template>
    <div class="relative transition-all duration-300 flex gap-2">
        <input
            class="p-2 w-full focus:-translate-y-5 focus:outline-none transition-all duration-300 border-2 border-gray-400 rounded-md"
            placeholder="Buscar..."
        />
        <div>
            <div class="px-2 bg-white rounded-md text-center flex items-center justify-center 
                border-2 border-gray-400 hover:-translate-y-5 transition-all duration-300
                hover:bg-gray-100 select-none" @click="displayMenu">
                <Icon icon="ion:menu" style="font-size: 180%; font-weight: bold; color: gray;"/>
            </div>
            <div v-if="showMenu" class="h-20 w-20 bg-gray-500 absolute -translate-y-5">
                
            </div>
        </div>
    </div>
</template>

<script>
    import { ref } from "vue";
    import Icon from "@/components/Icon";
    export default{
        components: {
            Icon,
        },
        props: {
            typeOfModal: {
                type: String,
            }
        },
        setup(props) {
            console.log(props.typeOfModal)
            console.log("This is my modal component");

            let showMenu = ref(false)
            const displayMenu = () => {
                showMenu.value = !showMenu.value
            }
            return {
                displayMenu,
                showMenu
            }
        }
    }
</script>