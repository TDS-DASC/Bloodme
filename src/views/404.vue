<template>
  <div
    class="min-h-screen flex flex-col justify-center items-center text-center py-20"
  >
    <img src="@/assets/images/all-img/404.svg" alt="" />
    <div class="max-w-[546px] mx-auto w-full mt-12">
      <h4 class="text-slate-900 mb-4">Pagina no encontrada</h4>
      <div
        class="text-slate-600 dark:text-slate-300 text-base font-normal mb-10"
      >
        La página que estas buscando puede que haya sido eliminada, dada de baja temporalmente o 
        que hayas escrito algo mal.
      </div>
    </div>
    <div class="max-w-[300px] mx-auto w-full">
      <router-link
        to="/"
        class="btn btn-dark dark:bg-slate-800 block text-center"
      >
        Regresar al inicio
      </router-link>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
