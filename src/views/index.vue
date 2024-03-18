<template>
    <div class="flex dark:bg-slate-900 gap-2" style="height: 85vh;">
      <!-- Citas pendientes -->
      <div class="flex flex-col rounded-md bg-gray-100 overflow-hidden min-w-fit">
        <div name="header" class="text-center bg-slate-700 text-white dark:text-white text-3xl p-1 font-semibold">
          Citas pendientes
        </div>
        <div class="flex items-center pr-2 dark:bg-gray-500 bg-white">
          <div class="flex flex-1 items-center m-2 bg-white rounded-xl overflow-hidden border-2 border-black-400 border-solid">
            <Icon icon="material-symbols-light:search" style="font-size: 180%; font-weight: bold; color: gray;"/>
            <input class="p-2 w-full focus:outline-none" placeholder="Buscar...">
          </div>
          <button class="hover:bg-gray-300 rounded-md">
            <Icon icon="system-uicons:filtering" style="font-size: 180%; font-weight: bold; color: darkslategray;"/>
          </button>
        </div>
        
        <div class="bg-white dark:bg-slate-600 w-full h-full p-2 pb-10 overflow-auto gap-2 flex flex-col">
          
          <!-- Separador de horas -->
          <div class="flex justify-center items-center">
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
            <p class="px-5 dark:text-white">5:00pm</p>
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
          </div>

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

          <!-- Separador de horas -->
          <div class="flex justify-center items-center">
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
            <p class="px-5 dark:text-white">6:00pm</p>
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
          </div>

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
      <div class="flex-auto rounded-md overflow-auto bg-white dark:bg-slate-600">
        <div name="header" class="text-start bg-slate-700 text-black text-5xl">
          <p class="text-white px-4 py-4 font-semibold">Información del donante</p>
        </div>
        <br>
        <div class="p-4">
          <div class="px-3 py-2">
            <div class="w-full border-2 border-black-900 rounded-sm p-3 border-opacity-10 gap-5 flex flex-col">
              <p class="font-semibold text-gray-600 text-2xl">Datos personales</p>
              <div class="flex gap-2 w-full ">
                <Textinput
                  label="Nombre/s*"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-full"
                  disabled
                />
                <Textinput
                  label="Apellidos*"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-full"
                  disabled
                />
              </div>
              <div class="flex gap-2 w-full">
                <Textinput
                  label="Fecha de nacimiento"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-1/2"
                  disabled
                />
                <Textinput
                  label="CURP"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-full"
                  disabled
                />
                <Textinput
                  label="Tipo de sangres"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-full"
                  disabled
                />
              </div>
              <div class="flex gap-2 w-full">
                <Textinput
                  label="Sexo"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-1/2"
                  disabled
                />
                <Textinput
                  label="Alias"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-full"
                  disabled
                />
              </div>
            </div>
          </div>
          <br>
          <div class="px-3 py-2">
            <div class="w-full border-2 border-black-900 rounded-sm p-3 border-opacity-10 gap-5 flex flex-col">
              <p class="font-semibold text-gray-600 text-2xl">Información de contacto</p>
              <div class="flex gap-2 w-full">
                <Textinput
                  label="Email"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-full"
                  disabled
                />
                <Textinput
                  label="Número de telefono celular"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  class="w-full"
                  disabled
                />
              </div>
              <div class="flex gap-2 w-full">
                <Textinput
                  label="Fecha de nacimiento"
                  type="text"
                  placeholder="Ingrese sus apellidos"
                  name="lastName"
                  v-model="lastName"
                  :error="lastNameError"
                  classInput="h-[48px]"
                  disabled
                />
              </div>
            </div>
          </div>
          <br>
          <div class="full flex justify-between">
            <button type="submit" class="btn bg-black-700 hover:bg-black-800 text-white block w-fit text-center">
              Cita cancelada
            </button>
            <button type="submit" class="btn bg-slate-400 hover:bg-slate-500 text-white block w-fit text-center">
              Cita completada con retardo
            </button>
            <button type="submit" class="btn bg-green-500 hover:bg-green-600 text-white block w-fit text-center">
              Cita completada
            </button>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
  import bloodbag from "@/assets/images/all-img/BloodBag.png";
  import Textinput from "@/components/Textinput";
  import Icon from "../components/Icon";
  import { ref } from "vue";
  export default {
    components: {
      Icon,
      Textinput,
    },
    data() {
      return {
        bloodbag,
      };
    },
    setup() {
      return {
        
      }
    }
  };
</script>
<style lang="css">
</style>
