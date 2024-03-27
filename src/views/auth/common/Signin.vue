<template>
  <form @submit.prevent="onSubmit" class="space-y-4">
    <Textinput
      label="Correo Electronico"
      type="email"
      placeholder="Ingrese su correo electronico"
      name="email"
      v-model="email"
      :error="emailError"
      classInput="h-[48px]"
    />
    <Textinput
      label="Contraseña"
      type="password"
      placeholder="Ingrese su contraseña"
      name="password"
      v-model="password"
      :error="passwordError"
      hasicon
      classInput="h-[48px]"
    />

    <div class="flex justify-between">
      <label class="cursor-pointer flex items-start">
        <input
          type="checkbox"
          class="hidden"
          @change="() => (checkbox = !checkbox)"
        />
        <span
          class="h-4 w-4 border rounded flex-none inline-flex mr-3 relative top-1 transition-all duration-150"
          :class="
            checkbox
              ? 'ring-2 ring-black-500 dark:ring-offset-slate-600 dark:ring-slate-900  dark:bg-slate-900 ring-offset-2 bg-slate-900'
              : 'bg-slate-100 dark:bg-slate-600 border-slate-100 dark:border-slate-600 '
          "
        >
          <img
            src="@/assets/images/icon/ck-white.svg"
            alt=""
            class="h-[10px] w-[10px] block m-auto"
            v-if="checkbox"
          />
        </span>
        <span class="text-slate-500 dark:text-slate-400 text-sm leading-6"
          >Mantén mi sesión abierta</span
        >
      </label>
      <router-link
        to="/forgot"
        class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium"
        >¿Olvidaste tú contraseña?</router-link
      >
    </div>

    <button type="submit" class="btn bg-red-500 text-white block w-full text-center">
      Iniciar Sesion
    </button>
  </form>
</template>
<script>
  import Textinput from "@/components/Textinput";
  import { useField, useForm } from "vee-validate";
  import * as yup from "yup";
  import axios from "@/plugins/axios";
  import { useToast } from "vue-toastification";
  export default {
    components: {
      Textinput,
    },
    data() {
      return {
        checkbox: false,
      };
    },
    setup() {
      const toast = useToast();

      
      const schema = yup.object({
        email: yup.string().required("El correo electronico es requerido").email(),
        password: yup.string().required("La contraseña es requerida").min(3),
      });

      const formValues = {
        email: "",
        password: "",
      };

      const { handleSubmit } = useForm({
        validationSchema: schema,
        initialValues: formValues,
      });

      const { value: email, errorMessage: emailError } = useField("email");
      const { value: password, errorMessage: passwordError } = useField("password");
     
      function onSubmit() {
          function handleLoginSuccess(userData) {
              const userDataString = JSON.stringify(userData);
              localStorage.setItem('user', userDataString);
              window.location.href = '/home';
          }

          function handleLoginError(error) {
              console.error('Error in login request:', error);
          }

          function fetchCSRFToken() {
              return axios.get(`/sanctum/csrf-cookie`);
          }

          function performLogin() {
              return axios.post(`/login`, {
                  email: email.value,
                  password: password.value,
              });
          }

          function fetchUserData() {
              return axios.get(`/api/user`)
                  .then(response => {
                      handleLoginSuccess(response.data);
                  })
                  .catch(handleLoginError);
          }

          fetchCSRFToken()
              .then(() => performLogin())
              .then(response => {
                  console.log(response);
                  toast.success("¡A iniciado sesión!", { timeout: 1000 });
                  setTimeout(fetchUserData, 1000);
              })
              .catch(error => {
                  console.error('Error in login process:', error);
              });
      }

      return {
        email,
        emailError,
        password,
        passwordError,
        onSubmit,
      };
    },
  };
</script>
<style lang="scss"></style>