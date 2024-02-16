<template>
    <div class="fixed z-1 left-0 top-0 bg-black-900 w-full h-screen opacity-50" @click="$emit('update-popup-state', false)">

    </div>
    <div class="fixed top-1/3 right-0 w-full flex justify-center p-2">
        <div class="bg-white xl:w-1/2 rounded-md overflow-hidden w-11/12">
            <div class="flex bg-red-600 items-center justify-between px-4">
                <p class="text-white bg-red-600 font-semibold py-2 text-xl">Compartir</p>
                <button>
                    <Icon @click="$emit('update-popup-state', false)" icon="material-symbols:close" style="font-size: 140%; color: white; "/>
                </button>
            </div>
            <div name="share-type">
            </div>
            <div class="p-6 w-full flex">
                <input class="p-2 border-2 border-r-0 border-black-400 rounded-l-md w-full bg-gray-200 overflow-hidden" spellcheck="false" disabled value="https://www.google.com.mx/maps/place/Hospital+General+Juan+Mar%C3%ADa+Salvatierra" :value="campaignUrl">
                <button class="p-2 border-2 border-l-0 border-black-400 bg-gray-200 rounded-r-md">
                    <p class="bg-red-600 text-white px-2 py-1 rounded-full">Copiar</p>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import Icon from "../Icon";
    import { ref, watch } from "vue";
    export default{
        components: {
            Icon,
        },
        setup() {
            const campaignUrl = ref(''); 
            function copyText() {
                const element = campaignUrl;
                element.select();
                element.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(element.value);
            }

            return {
                campaignUrl,
                copyText,
            }
        }
    }
</script>

<style>

</style>