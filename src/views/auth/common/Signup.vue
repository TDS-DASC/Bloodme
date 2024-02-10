<template class="">
  <form @submit.prevent="onSubmit" class="space-y-4">
    <div name="form-container" class="w-full">
      <div v-if="stepIndex==0" class="overflow-hidden">
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
          label="Primer apellido*"
          type="text"
          placeholder="Ingrese su primer apellido"
          name="firstLastName"
          v-model="name"
          :error="nameError"
          classInput="h-[48px]"
        />
        <Textinput
          label="Segundo apellido*"
          type="text"
          placeholder="Ingrese su segundo apellido"
          name="secondLastName"
          v-model="name"
          :error="nameError"
          classInput="h-[48px]"
        />
        <Textinput
          label="Fecha de nacimiento*"
          type="text"
          placeholder="Ingrese su segundo apellido"
          name="birthDate"
          v-model="name"
          :error="nameError"
          classInput="h-[48px]"
        />
      </div>
      <div v-if="stepIndex==1">
        <Select
          label="Type of blood*"
          name="bloodType"
          :options="bloodTypes"
        />
        <Textinput
          label="CURP*"
          type="text"
          placeholder="Ingrese su CURP"
          name="curp"
          v-model="name"
          :error="nameError"
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
          label="Alias*"
          type="email"
          placeholder="Ingrese su correo electronico"
          name="email"
          v-model="email"
          :error="emailError"
          classInput="h-[48px]"
        />
      </div>
      <div v-if="stepIndex==2">
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
          placeholder="Ingrese su contraseña"
          name="password"
          v-model="password"
          :error="passwordError"
          hasicon
          classInput="h-[48px]"
        />
        <label class="cursor-pointer flex items-start">
          <input
            type="checkbox"
            class="hidden"
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
      </div>
    </div>

    <div class="flex gap-2 justify-center">
      <button class="btn bg-red-500 block text-center text-white" v-if="stepIndex>0" @click="stepIndex--">
          Atras
      </button>
      <button class="btn bg-red-500 block text-center text-white"  v-if="stepIndex!=2" @click="stepIndex++">
          Siguiente
      </button>
      <button type="submit" class="btn bg-red-500 block text-center text-white"  v-else>
        Crea tu cuenta
      </button>
    </div>
    
  </form>
  <div name="progress-bar"
    class="flex justify-center gap-12 mt-5">
    <div :class="stepClassStorage[0]">
      <p class="font-bold text-black-900 dark:text-white">1</p>
    </div>
    <div :class="stepClassStorage[1]">
      <p class="font-bold text-black-900 dark:text-white">2</p>
    </div>
    <div :class="stepClassStorage[2]">
      <p class="font-bold text-black-900 dark:text-white">3</p>
    </div>
  </div>
</template>
<script>
import Textinput from "@/components/Textinput";
import { useField, useForm } from "vee-validate";
import * as yup from "yup";

import { inject, ref, watch } from "vue";
import { useRouter } from "vue-router";
import { useToast } from "vue-toastification";
import Select from "@/components/Select";

export default {
  components: {
    Textinput,
    Select,
  },
  data() {
    return {
      checkbox: false,
    };
  },
  setup() {
    // Define a validation schema
    const schema = yup.object({
      email: yup.string().required("El correo electronico es requerido").email(),
      password: yup.string().required("La contraseña es requerida").min(8),
      name: yup.string().required("El nombre completo es requerido"),
    });
    const swal = inject("$swal");
    const toast = useToast();
    const router = useRouter();

    // Create a form context with the validation schema
    const users = [];
    const { handleSubmit } = useForm({
      validationSchema: schema,
    });
    // No need to define rules for fields

    const { value: email, errorMessage: emailError } = useField("email");
    const { value: name, errorMessage: nameError } = useField("name");
    const { value: password, errorMessage: passwordError } =
      useField("password");

    const onSubmit = handleSubmit((values) => {
      // add value into user array if same email not found
      if (!users.find((user) => user.email === values.email)) {
        users.push(values);
        localStorage.setItem("users", JSON.stringify(users));
        router.push("/");
        // use vue-toast-notification app use
        toast.success -
          500(" Account Create successfully", {
            timeout: 2000,  
          });
      } else {
        // use sweetalert 2
        swal.fire({
          title: "Email already exists",
          text: "Please try another email",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    });

    //Not from the template
    const bloodTypes = ([
      { value: "1", label: "A+" },
      { value: "2", label: "A-" },
      { value: "3", label: "B+" },
      { value: "4", label: "B-" },
      { value: "5", label: "AB+" },
      { value: "6", label: "AB-" },
      { value: "7", label: "O+" },
      { value: "8", label: "O-" }
    ]);
    
    const stepIndex = ref(0);

    const defaultStepClass = 'py-2 px-4 rounded-full border-solid border-2 border-black-900 dark:border-white bg-white duration-300';
    const selectedStepClass = 'py-2 px-4 rounded-full border-solid border-2 border-black-900 dark:border-white -translate-y-3 bg-yellow-100 duration-300'
    const stepClassStorage = ref([selectedStepClass,defaultStepClass,defaultStepClass]);
    
    watch(stepIndex, () => {
      console.log(stepIndex.value);

      if(stepIndex.value >= 0 && stepIndex.value <= 2){
        const updatedStepClassStorage = ([defaultStepClass,defaultStepClass,defaultStepClass]);
        updatedStepClassStorage[stepIndex.value] = selectedStepClass; 
        stepClassStorage.value = updatedStepClassStorage; 
        return;
      }
    });

    return {
      email,
      stepIndex,
      name,
      nameError,
      emailError,
      password,
      passwordError,
      bloodTypes,
      stepClassStorage,
      onSubmit,
    };
  },
};
</script>

<style lang="scss">

</style>
