<template>
  <div class="loginwrapper">
    <div class="lg-inner-column">
      <div class="right-column relative">
        <div
          class="inner-content h-full flex flex-col bg-white dark:bg-slate-800"
          v-if="!userIsLoggedFlag"
        >
          <div class="auth-box h-full flex flex-col justify-center">
            <div class="text-center 2xl:mb-10 mb-4">
              <h4 class="font-medium">¡Bienvenido de nuevo!</h4>
              <div class="text-slate-500 dark:text-slate-400 text-base">
                Accede a tu cuenta para crear una nueva campaña o buscar una campaña para realizar una donación
              </div>
            </div>
            <Signin />
            <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6"></div>
            <div class="md:max-w-[345px] mt-6 mx-auto font-normal text-slate-500 dark:text-slate-400mt-12 uppercase text-sm">
              ¿Aún no tienes una cuenta?
              <router-link
                to="/register"
                class="text-slate-900 dark:text-white font-medium hover:underline"
              >
              Crea una aquí .</router-link
              >
            </div>
          </div>
          <div class="auth-footer text-center flex flex-col justify-center items-center gap-1">
              <p>Aplicación diseñada por DASC.</p>
              <img :src="dasclogo" alt="Dasc logo." />
          </div>
        </div>
        <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800" 
        v-else>
          <div class="auth-box h-full flex flex-col justify-center">
            <div class="text-center 2xl:mb-10 mb-4">
              <h4 class="font-medium">¡Hola! {{ user.name }} {{ user.lastname }}</h4>
              <div class="text-slate-500 dark:text-slate-400 text-base">
                De momento ya hay una sesión iniciada con tu correo: <br> 
                {{ user.email }} <br><br>
                Pudes volver al inicio desde aquí: <br>
                <router-link
                  to="/home"
                  class="text-slate-900 dark:text-white font-medium hover:underline"
                >
                Volver al inicio .</router-link>
              </div>
            </div>
            <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6"></div>
            <div class="md:max-w-[345px] mt-6 mx-auto font-normal text-slate-500 dark:text-slate-400mt-12 uppercase text-sm text-center">
              ¿Quieres cerrar tu sesión e iniciar una nueva?
                <button class="text-xl" @click="sendLogOutRequest">
                  Cerrar sesión
                </button>
            </div>
          </div>
          <div class="auth-footer text-center flex flex-col justify-center items-center gap-1">
              <p>Aplicación diseñada por DASC.</p>
              <img :src="dasclogo" alt="Dasc logo." />
          </div>
        </div>
      </div>
      <div
        class="left-column bg-cover bg-no-repeat bg-center"
        :style="{
          backgroundImage: 'url(' + bgloginimage + ')',
        }"
      >
        <div class="flex flex-col h-full justify-center">
          <div class="flex-1 flex justify-center items-center ">
            <img :src="blooddrop" alt="" class="w-20" />
            <p class="text-white text-7xl font-semibold">Blood Me</p>
          </div>
          <div>
            <div
              class="black-500-title max-w-[525px] mx-auto pb-20 text-center"
            >
              Comienza el día
              <span class="text-white font-bold">salvando vidas.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import Signin from "./common/Signin";
  import Social from "./common/Social";
  // Image Import
  import bgloginimage from "@/assets/images/all-img/bg-auth.jpg";
  import blooddrop from "@/assets/images/icon/blooddrop.svg";
  import dasclogo from "@/assets/images/logo/dasclogo.png";
  import axios from "@/plugins/axios";
  import { useToast } from "vue-toastification";
  import { ref } from "vue";

  export default {
    data() {
      return {
        blooddrop,
        bgloginimage,
        dasclogo,
      };
    },
    components: {
      Social,
      Signin,
    },
    setup() {
      let user = JSON.parse(localStorage.getItem('user'));
      let userIsLoggedFlag = ref(false);
      console.log(user)
      if(user != null){
        userIsLoggedFlag.value = true;
      }

      let toast = useToast();
      function deleteCookie(name) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
      }
      function closeSession(){
        localStorage.removeItem('user');
        deleteCookie('XSRF-TOKEN');
        deleteCookie('laravel_session');
        window.location.href = '/home';
      }
      function sendLogOutRequest(){
        axios.post(`/logout`)
            .then(res => {
              toast.info("¡A cerrado su sesión!", { timeout: 1000 });
              setTimeout(closeSession, 1000);
            })
            .catch(error => {
              console.error('Error in login request:', error);
            });
      }

      return {
        userIsLoggedFlag,
        user,
        sendLogOutRequest
      }
    }
  };
</script>
<style lang="scss"></style>
