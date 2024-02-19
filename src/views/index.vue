<template>
    <div class="flex bg-gray-200 dark:bg-slate-900 p-4 gap-2" style="height: 91vh;">
      <!-- Citas pendientes -->
      <div class="flex flex-col rounded-md bg-gray-100 overflow-hidden min-w-fit">
        <div name="header" class="text-center bg-red-600 text-white dark:bg-slate-600 dark:text-white text-3xl p-1">
          Citas pendientes
        </div>
        <div class="flex items-center pr-2 dark:bg-gray-500">
          <div class="flex flex-1 items-center m-2 bg-white rounded-xl overflow-hidden">
            <Icon icon="material-symbols-light:search" style="font-size: 180%; font-weight: bold; color: gray;"/>
            <input class="p-2 w-full focus:outline-none" placeholder="Buscar...">
          </div>
          <button class="hover:bg-gray-300 rounded-md">
            <Icon icon="system-uicons:filtering" style="font-size: 180%; font-weight: bold; color: darkslategray;"/>
          </button>
        </div>
        
        <div class="bg-white dark:bg-slate-600 w-full h-full p-2 pb-10 overflow-auto gap-2 flex flex-col">
          
          <!-- Desplegado del paciente -->
          <button class="flex bg-white hover:bg-gray-100 dark:bg-slate-200 p-2 rounded-xl items-center shadow-md select-none" @click="showPatienInformation(this)">
            <div class="relative">
              <img :src="bloodbag" alt="" class="max-h-16" />
              <p class="absolute  top-5 text-xs font-bold text-black-900 left-4">-A</p>
            </div>
            <div class="flex flex-col justify-start text-start px-4">
              <div class="flex items-center justify-between gap-4">
                <p class="font-bold text-xl">Alfonso Lopez</p>
                <div class="flex gap-2">
                  <Icon icon="mdi:eye" style="font-size: 120%;"/>
                </div>
              </div>
              <div class="flex items-center">
                  <Icon icon="mdi:location"/>
                  <p class="flex-2 max-w-xs">La Paz | Centro de salud. </p>
              </div>
              <div class="flex items-center">
                <Icon icon="healthicons:blood-bag-outline" style="font-size: 140%;"/>
                <p class="flex-2 max-w-xs">5 Unidades</p>
              </div>
            </div>
          </button>

          <button class="flex bg-white hover:bg-gray-100 dark:bg-slate-200 p-2 rounded-xl items-center shadow-md select-none" @click="showPatienInformation(this)">
            <div class="relative">
              <img :src="bloodbag" alt="" class="max-h-16" />
              <p class="absolute  top-5 text-xs font-bold text-black-900 left-4">-A</p>
            </div>
            <div class="flex flex-col justify-start text-start px-4">
              <div class="flex items-center justify-between gap-4">
                <p class="font-bold text-xl">Alfonso Lopez</p>
                <div class="flex gap-2">
                  <Icon icon="mdi:eye" style="font-size: 120%;"/>
                </div>
              </div>
              <div class="flex items-center">
                  <Icon icon="mdi:location"/>
                  <p class="flex-2 max-w-xs">La Paz | Centro de salud. </p>
              </div>
              <div class="flex items-center">
                <Icon icon="healthicons:blood-bag-outline" style="font-size: 140%;"/>
                <p class="flex-2 max-w-xs">5 Unidades</p>
              </div>
            </div>
          </button>

          <button class="flex bg-white hover:bg-gray-100 dark:bg-slate-200 p-2 rounded-xl items-center shadow-md select-none" @click="showPatienInformation(this)">
            <div class="relative">
              <img :src="bloodbag" alt="" class="max-h-16" />
              <p class="absolute  top-5 text-xs font-bold text-black-900 left-4">-A</p>
            </div>
            <div class="flex flex-col justify-start text-start px-4">
              <div class="flex items-center justify-between gap-4">
                <p class="font-bold text-xl">Alfonso Lopez</p>
                <div class="flex gap-2">
                  <Icon icon="mdi:eye" style="font-size: 120%;"/>
                </div>
              </div>
              <div class="flex items-center">
                  <Icon icon="mdi:location"/>
                  <p class="flex-2 max-w-xs">La Paz | Centro de salud. </p>
              </div>
              <div class="flex items-center">
                <Icon icon="healthicons:blood-bag-outline" style="font-size: 140%;"/>
                <p class="flex-2 max-w-xs">5 Unidades</p>
              </div>
            </div>
          </button>

          <button class="flex bg-white hover:bg-gray-100 dark:bg-slate-200 p-2 rounded-xl items-center shadow-md select-none" @click="showPatienInformation(this)">
            <div class="relative">
              <img :src="bloodbag" alt="" class="max-h-16" />
              <p class="absolute  top-5 text-xs font-bold text-black-900 left-4">-A</p>
            </div>
            <div class="flex flex-col justify-start text-start px-4">
              <div class="flex items-center justify-between gap-4">
                <p class="font-bold text-xl">Alfonso Lopez</p>
                <div class="flex gap-2">
                  <Icon icon="mdi:eye" style="font-size: 120%;"/>
                </div>
              </div>
              <div class="flex items-center">
                  <Icon icon="mdi:location"/>
                  <p class="flex-2 max-w-xs">La Paz | Centro de salud. </p>
              </div>
              <div class="flex items-center">
                <Icon icon="healthicons:blood-bag-outline" style="font-size: 140%;"/>
                <p class="flex-2 max-w-xs">5 Unidades</p>
              </div>
            </div>
          </button>

          <button class="flex bg-white hover:bg-gray-100 dark:bg-slate-200 p-2 rounded-xl items-center shadow-md select-none" @click="showPatienInformation(this)">
            <div class="relative">
              <img :src="bloodbag" alt="" class="max-h-16" />
              <p class="absolute  top-5 text-xs font-bold text-black-900 left-4">-A</p>
            </div>
            <div class="flex flex-col justify-start text-start px-4">
              <div class="flex items-center justify-between gap-4">
                <p class="font-bold text-xl">Alfonso Lopez</p>
                <div class="flex gap-2">
                  <Icon icon="mdi:eye" style="font-size: 120%;"/>
                </div>
              </div>
              <div class="flex items-center">
                  <Icon icon="mdi:location"/>
                  <p class="flex-2 max-w-xs">La Paz | Centro de salud. </p>
              </div>
              <div class="flex items-center">
                <Icon icon="healthicons:blood-bag-outline" style="font-size: 140%;"/>
                <p class="flex-2 max-w-xs">5 Unidades</p>
              </div>
            </div>
          </button>

        </div>
      </div>

      <!-- Información del paciente -->
      <div class="flex-auto rounded-md overflow-hidden bg-white dark:bg-slate-400 h-5/6">
        <div name="header" class="text-center bg-red-600 text-white dark:bg-slate-600 dark:text-white text-3xl p-1">
          <p>Información del paciente</p>
        </div>
        <div class="py-3 px-2"> 
          <div class="flex gap-4 flex-wrap">
            <div class="flex gap-3 w-full">
              <div class="flex flex-1 items-start rounded-md bg-gray-200 overflow-hidden shadow-md">
                <p class="p-1 bg-red-500 text-white select-none dark:bg-slate-600">Nombre/s</p>
                <input value="HOLA BUENAS TARDES COMO ESTAS" class="p-1 w-full" disabled>
              </div>
              <div class="flex items-start rounded-md bg-gray-200 overflow-hidden shadow-md">
                <p class="p-1 bg-red-500 text-white select-none dark:bg-slate-600 w-full">Fecha de nacimiento</p>
                <input value="12/20/23" class="p-1 w-full" disabled>
              </div>
            </div>
            <div class="flex justify-evenly w-full gap-4">
              <div class="flex items-start rounded-md w-full bg-gray-200 overflow-hidden shadow-md">
                <p class="p-1 bg-red-500 text-white select-none dark:bg-slate-600">Apellido Paterno</p>
                <input value="EEEH" class="p-1" disabled>
              </div>
              <div class="flex items-start rounded-md w-full bg-gray-200 overflow-hidden shadow-md">
                <p class="p-1 bg-red-500 text-white select-none dark:bg-slate-600">Apellido Materno</p>
                <input value="EEEH" class="p-1" disabled>
              </div>
            </div>
            <div class="flex w-full justify-between">
              <div class="flex items-start rounded-md bg-gray-200 overflow-hidden shadow-md">
                <p class="p-1 bg-red-500 text-white select-none dark:bg-slate-600">CURP</p>
                <input value="LOFE930312HVZLNS06" class="p-1" disabled>
              </div>
              <div class="flex items-start rounded-md bg-gray-200 overflow-hidden shadow-md">
                <p class="p-1 bg-red-500 text-white select-none dark:bg-slate-600">Alias</p>
                <input value="12/20/23" class="p-1" disabled>
              </div>
              <div class="flex items-start rounded-md bg-gray-200 overflow-hidden shadow-md">
                <p class="p-1 bg-red-500 text-white select-none dark:bg-slate-600">Tipo de Sangre</p>
                <input value="-A" class="p-1" disabled>
              </div>
            </div>
            <div class="flex  gap-4 w-full">
              <div class="flex items-start rounded-md bg-gray-200 overflow-hidden shadow-md w-1/2">
                <p class="p-1 bg-red-500 text-white select-none dark:bg-slate-600">Causa</p>
                <input value="Para el paciente Alfonso Lopez" class="p-1 w-1/2" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-4 py-3 px-2">
          <div class="rounded-xl overflow-hidden p-1">
            <p class="bg-red-500 dark:bg-slate-600 text-white w-fit rounded-tl-xl rounded-tr-xl p-2">Notas de consulta</p>
            <textarea class="w-full bg-gray-100 p-2 rounded-tr-xl h-40" style="resize: none;"></textarea>
          </div>
          <div class="flex gap-10 justify-center">
            <button class="bg-green-500 dark:bg-green-600 px-2 py-1 rounded-md text-white hover:bg-green-700">Finalizar consulta</button>
            <button class="hover:bg-gray-500 bg-gray-400 dark:bg-gray-800 px-2 py-1 rounded-md text-white">Marcar ausencia</button>
          </div>
          <div class="flex flex-col gap-2 items-center">
            <p class="">¿Hubo algún problema con el sistema? <span class="font-semibold">Crea un reporte.</span></p>
            <button class="bg-red-500 dark:bg-slate-600 font-bold text-white w-fit px-2 py-1 rounded-md hover:bg-red-600">Reportar</button>
          </div>
        </div>
      </div>

    </div>
</template>
<script>
  import bloodbag from "@/assets/images/all-img/BloodBag.png";
  import Icon from "../components/Icon";
  import { ref } from "vue";
  export default {
    components: {
      Icon,
    },
    data() {
      return {
        bloodbag,
      };
    },
    setup() {
      console.log("Hey");
      
      return {
      }
    }
  };
</script>
<style lang="css">
</style>
