<template>
     <div class="fixed inset-0 h-screen flex flex-col justify-center items-center bg-white bg-opacity-80 z-10">
        <div class="w-1/4 group">
            <!-- <input class="p-2 w-full focus:outline-none focus:-translate-y-20 transition-all duration-300 border-2 border-gray-400 rounded-md" placeholder="Buscar..." @input="filterData($event.target.value)"> -->
            <Beneficiaries v-if="typeOfModal=='beneficiaries'" @close="beneficiariesModal = false" />
            <Campaigns v-if="typeOfModal=='campaigns'" />
        </div>
    </div>
</template>

<script>
    import Icon from "@/components/Icon";
    import Campaigns from "./Campaigns";
    import Beneficiaries from "./Beneficiaries";
    export default{

        components: {
            Icon,
            Beneficiaries,
            Campaigns
        },
        props: {
            typeOfModal: {
                type: String,
            }
        },
        setup(props) {
            console.log(props.typeOfModal)
            console.log("This is my modal component");
        }
    }
</script>