<template class="">
  <form @submit.prevent="onSubmit" class="space-y-4 flex flex-col">
    <span v-if="!checkbox && submitForm" class="text-red-500 dark:text-slate-400 text-sm leading-6 p-2 text center">
      Revise por favor todos los campos del formulario correctamente
    </span>
    <div name="form-container" class="w-full">
      <div v-if="stepIndex==0">
        <Textinput
          label="Nombre*"
          type="text"
          placeholder="Ingrese su nombre ó nombres"
          name="name"
          v-model="name"
          :error="nameError"
          classInput="h-[48px]"
        />
        <Textinput
          label="Apellidos*"
          type="text"
          placeholder="Ingrese sus apellidos"
          name="lastName"
          v-model="lastName"
          :error="lastNameError"
          classInput="h-[48px]"
        />
        <Textinput
          label="Alias*"
          type="text"
          placeholder="Ingrese su alias"
          name="alias"
          v-model="alias"
          :error="aliasError"
          classInput="h-[48px]"
        />
        <Select
          label="Seleccione su sexo*"
          name="sex"
          :options="sexOptions"
          :error="sexError"
          v-model="sex"
        />
      </div>
      <div v-if="stepIndex==1">
        <Select
          label="Tipo de sangre*"
          name="blood_type"
          :options="bloodTypes"
          :error="blood_typeError"
          v-model="blood_type"
        />
        <Textinput
          label="CURP*"
          type="text"
          placeholder="Ingrese su CURP"
          name="curp"
          v-model="curp"
          :error="curpError"
          classInput="h-[48px]"
        />
        <Textinput
          label="Correo electronico*"
          type="email"
          placeholder="Ingrese su correo electronico"
          name="email"
          v-model="email"
          :error="emailError"
          classInput="h-[48px]"
        />
        <Textinput
          label="Fecha de nacimiento*"
          type="date"
          name="birth_date"
          v-model="birth_date"
          :error="birth_dateError"
          classInput="h-[48px] mr-3"
        />
      </div>
      <div v-if="stepIndex==2">
        <Textinput
          label="Numero de celular*"
          type="number"
          placeholder="Ingres su numero celular"
          name="phone_number"
          v-model="phone_number"
          :error="phone_numberError"
          classInput="h-[48px]"
        />
        <span v-if="validPhone" class="text-red-500 dark:text-slate-400 text-sm leading-6 p-2 text center">
          Ingrese por favor un número válido (6##-####-###)
        </span>
        <Textinput
          label="Contraseña*"
          type="password"
          placeholder="Ingrese su contraseña"
          name="password"
          v-model="password"
          :error="passwordError"
          hasicon
          classInput="h-[48px]"
        />
        <Textinput
          label="Repite la Contraseña*"
          type="password"
          placeholder="Repita su contraseña"
          name="password_confirmation"
          v-model="password_confirmation"
          hasicon
          classInput="h-[48px]"
        />
        <span v-if="passwordDontMatch" class="text-red-500 dark:text-slate-400 text-sm leading-6"
            >Las contraseñas no coinciden</span
          >
        <label class="cursor-pointer flex items-start">
          <input
            type="checkbox"
            class="hidden"
            name="checkbox"
            @change="() => (checkbox = !checkbox)"
          />
          <span
            class="h-4 w-4 border rounded inline-flex mr-3 relative flex-none top-1 transition-all duration-150"
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
            >Acepta nuestros terminos y condiciones</span
          >
          
        </label>
        <span v-if="!checkbox && submitForm" class="text-red-500 dark:text-slate-400 text-sm leading-6"
            >Es necesario que acepte nuestros terminos y condiciones de uso</span
          >
      </div>
    </div>

    <div class="flex gap-2 justify-end">
      <button type="button" class="btn bg-red-500 block text-center text-white" v-if="stepIndex>0" @click="stepIndex--">
          Atras
      </button>
      <button type="button" class="btn bg-red-500 block text-center text-white"  v-if="stepIndex!=2" @click="stepIndex++">
          Siguiente
      </button>
      <button @click="submitForm=true" type="submit" class="btn bg-red-500 block text-center text-white"  v-else>
        Crea tu cuenta
      </button>
    </div>
    
  </form>
  <div name="progress-bar"
    class="flex justify-center gap-12 mt-5">
    <div :class="storageOfStepClass[0]">
      <p class="font-bold">1</p>
    </div>
    <div :class="storageOfStepClass[1]">
      <p class="font-bold">2</p>
    </div>
    <div :class="storageOfStepClass[2]">
      <p class="font-bold">3</p>
    </div>
  </div>
</template>
<script>
import Textinput from "@/components/Textinput";
import { useField, useForm } from "vee-validate";
import * as yup from "yup";

import { inject, ref, watch } from "vue";
import Select from "@/components/Select";
import axios from "@/plugins/axios";


export default {
  components: {
    Textinput,
    Select,
  },
  data() {
    return {
    };
  },
  setup() {
    const schema = yup.object({
      email: yup.string().required("El correo electronico es requerido").email(),
      password: yup.string().required("La contraseña es requerida").min(8),
      name: yup.string().required("El nombre es requerido"),
      lastName: yup.string().required("Sus apellidos son requeridos"),
      alias: yup.string().required("Su alias es requerido"),
      blood_type: yup.string().required("Su tipo de sangre es requerido"),
      curp: yup.string().required("Su CURP es requerido"),
      birth_date: yup.string().required("Su fecha de nacimiento es requerido"),
      sex: yup.string().required("Es obligatorio que escoja su sexo"),
      phone_number: yup.string().required("Es obligatorio que proporcione su telefono"),
    });

    const { handleSubmit } = useForm({
      validationSchema: schema
    });

    const { value: name, errorMessage: nameError } = useField("name");
    const { value: lastName, errorMessage: lastNameError } = useField("lastName");
    const { value: alias, errorMessage: aliasError } = useField("alias");
    const { value: birth_date, errorMessage: birth_dateError } = useField("birth_date");
    const { value: blood_type, errorMessage: blood_typeError } = useField("blood_type");
    const { value: phone_number, errorMessage: phone_numberError } = useField("phone_number");
    const { value: sex, errorMessage: sexError } = useField("sex");
    const { value: curp, errorMessage: curpError } = useField("curp");
    const { value: email, errorMessage: emailError } = useField("email");
    const { value: password, errorMessage: passwordError } = useField("password");
    const { value: password_confirmation, errorMessage: password_confirmationError } = useField("password_confirmation");

    /* mustRemoveOnceIsDone */
    const baseUrl = "http://127.0.0.1:8000";
    const trySubmit = handleSubmit(async (values) => {
      let response = await axios.get(`${baseUrl}/sanctum/csrf-cookie`);
      response = await axios.post(`${baseUrl}/register`, {
          name: "Kenneth de Guadalupe",
          lastname: "Quintero Valles",
          alias: "Kenneth Quintero",
          birth_date: "2001-12-05",
          blood_type: "A+",
          phone_number: "6131051468", 
          sex: "H",
          curp: "sdfghjqwertyu1234k",
          email: "kennethgqv@gmail.com",
          password: "uytjhgmnbuytqwe",
          password_confirmation: "uytjhgmnbuytqwe",
          image_url: "placeholder.jpg"  
        });
    }); 

    const onSubmit = handleSubmit((values) => {
        console.log("sup");
        if(password_confirmation.value != password.value){
          console.log("different password");
          console.log(password_confirmation);
          console.log(password);
          return;
        }
        if(!checkbox.value)
          return;
        /* const newUserForm = [
          { name: 'name', value: name.value },
          { name: 'lastName', value: lastName.value },
          { name: 'alias', value: alias.value },
          { name: 'birth_date', value: birth_date.value },
          { name: 'blood_type', value: blood_type.value },
          { name: 'phone_number', value: phone_number.value },
          { name: 'sex', value: sex.value },
          { name: 'curp', value: curp.value },
          { name: 'email', value: email.value },
          { name: 'password', value: password.value },
          { name: 'password_confirmation', value: password_confirmation.value },
          { name: 'image_url', value: '0'}
        ]; */
          
        trySubmit();
    });

    //Not from the template
    const checkbox = ref(false);
    const bloodTypes = ([
      { value: "0", label: "A+" },
      { value: "1", label: "A-" },
      { value: "2", label: "B+" },
      { value: "3", label: "B-" },
      { value: "4", label: "AB+" },
      { value: "5", label: "AB-" },
      { value: "6", label: "O+" },
      { value: "7", label: "O-" }
    ]);
    const sexOptions = ([
      { value: "H", label: "Hombre" },
      { value: "M", label: "Mujer" },
    ]);
    
    const submitForm = ref(false);
    watch(submitForm, () => {
      setTimeout(() => {
        stepIndex.value = 0;
      }, 100);
    });

    const passwordDontMatch = ref(false);
    watch(password_confirmation, () => {
      if(password.value != password_confirmation.value)
        passwordDontMatch.value = true;
      else
        passwordDontMatch.value = false;
    });

    const defaultStepClass = 'py-2 px-4 rounded-full border-solid border-2 border-gray-300 bg-white duration-300 text-slate-300 bg-gray-100 dark:border-gray-400 dark:bg-gray-800 dark:text-slate-400 ';
    const selectedStepClass = 'py-2 px-4 rounded-full border-solid border-2 border-black-900 -translate-y-3 bg-red-100 duration-300 text-black-900 dark:text-black-900 dark:border-black-300 dark:bg-white'
    const storageOfStepClass = ref([selectedStepClass,defaultStepClass,defaultStepClass]);
    const stepIndex = ref(0);
    watch(stepIndex, () => {
      if(stepIndex.value >= 0 && stepIndex.value <= 2){
        const updatedStepClassStorage = ([defaultStepClass,defaultStepClass,defaultStepClass]);
        updatedStepClassStorage[stepIndex.value] = selectedStepClass; 
        storageOfStepClass.value = updatedStepClassStorage; 
        return;
      }
    });

    const validPhone = ref(false);
    watch(phone_number, () => {
      if(phone_number.value.length > 10)
        validPhone.value = true;
      else 
        validPhone.value = false;
    });

    return {
      email,
      emailError,
      name,
      nameError,
      lastName,
      lastNameError,
      password,
      passwordError,
      password_confirmation,
      password_confirmationError,
      blood_type,
      blood_typeError,
      curp,
      curpError,
      birth_date,
      birth_dateError,
      phone_number,
      phone_numberError,
      sex,
      sexError,
      alias,
      aliasError,
      bloodTypes,
      storageOfStepClass,
      stepIndex,
      checkbox,
      submitForm,
      validPhone,
      passwordDontMatch,
      sexOptions,
      onSubmit,
    };
  },
};
</script>

<style lang="scss">
</style>