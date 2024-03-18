<template>
  <div class="loginwrapper">
    <div class="lg-inner-column">
      <div class="right-column relative">
        <div
          class="inner-content h-full flex flex-col bg-white dark:bg-slate-800"
        >
          <div class="auth-box2 flex flex-col justify-center h-full">
            <div class="mobile-logo text-center mb-6 lg:hidden block">
              <router-link to="/"
                ><img
                  :src="logo"
                  alt=""
                  class="mx-auto"
              /></router-link>
            </div>
            <div class="text-center 2xl:mb-10 mb-5">
              <h4 class="font-medium mb-4">¿Olvidaste tu contraseña?</h4>
              <div class="text-slate-500 dark:text-slate-400 text-base">
                Cambia tu contraseña.
              </div>
            </div>
            <div
              class="font-normal text-base text-slate-500 dark:text-slate-400 text-center px-2 bg-slate-100 dark:bg-slate-600 rounded py-3 mb-4 mt-10"
            >
              ¡Ingresa tu correo electronico y te enviaremos las instrucciones!
            </div>

            <ForgotPass />
            <div
              class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-8 uppercase text-sm"
            >
              Olvidalo,
              <router-link
                to="/login"
                class="text-slate-900 dark:text-white font-medium hover:underline"
              >
                Regresame
              </router-link>
              al inicio
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
              Donar sangre es <br>
              <span class="text-white font-bold">obsequiar la vida</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import ForgotPass from "./common/forgot";
  // Image Import
  import bgloginimage from "@/assets/images/all-img/bg-auth.jpg";
  import dasclogo from "@/assets/images/logo/dasclogo.png";

export default {
  data () {
    return {
      bgloginimage,
      dasclogo
    }
  },
  components: {
    ForgotPass,
    
  },
};
</script>
<style lang="scss"></style>
