<template>
  <div class="loginwrapper">
    <div class="lg-inner-column">
      <div class="right-column relative">
        <div
          class="inner-content max-h-screen h-full overflow-hidden flex flex-col bg-white dark:bg-slate-800"
        >
          <div class="auth-box h-full flex flex-col justify-center">
            <div class="text-center 2xl:mb-10 mb-5">
              <h4 class="font-medium">Registrate</h4>
              <div class="text-slate-500 dark:text-slate-400 text-base">
                Crea una cuenta para crear una campaña o ser donador
              </div>
            </div>
            <Signup />
            <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6"></div>
            <div class="max-w-[215px] mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">
              ¿Ya estas registrado?
              <router-link
                to="/login"
                class="text-slate-900 dark:text-white font-medium hover:underline"
              >
                Inicia Sesión</router-link
              >
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
          backgroundImage: 'url(' + bgauth + ')',
        }"
      >
        <div class="flex flex-col h-full justify-center">
          <div class="flex-1 flex flex-col justify-center items-center">
            <div class="flex-1 flex justify-center items-center ">
              <img :src="blooddrop" alt="" class="w-20" />
              <p class="text-white text-7xl font-semibold">Blood Me</p>
            </div>
          </div>
          <div>
            <div
              class="black-500-title max-w-[525px] mx-auto pb-20 text-center"
            >
              Cada gota cuenta<br>
              <span class="text-white font-bold">Tú haces la diferencia</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import Signup from "./common/Signup";
  import Social from "./common/Social";
  // Image Import
    import bgauth from "@/assets/images/all-img/bg-auth.jpg";
    import blooddrop from "@/assets/images/icon/blooddrop.svg";
    import dasclogo from "@/assets/images/logo/dasclogo.png";

  export default {
    data() {
      return {
          blooddrop,
          bgauth,
          dasclogo,
      };
    },
    components: {
      Social,
      Signup,
    },
  };
</script>
<style lang="scss"></style>
