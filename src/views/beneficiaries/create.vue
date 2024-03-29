<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Beneficiario</h3><br>
            </div>
            <div class="w-full border-slate-200 border-b-2 dark:border-slate-600"></div>
            <br>
            <form
                @submit.prevent="onSubmit"
                class="lg:grid-cols-2 grid gap-5 grid-cols-1"
            >
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Nombre *"
                        type="text"
                        placeholder="Ingrese el nombre del beneficiario"
                        name="name"
                        v-model="name"
                        :error="nameError"
                    />
                    <p v-if="errors.name" class="mt-2 text-danger-500 block text-sm">{{ errors.name[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                    label="Apellidos *"
                    type="text"
                    placeholder="Ingrese los apellidos del beneficiario"
                    name="lastname"
                    v-model="lastname"
                    :error="lastnameError"
                    />
                    <p v-if="errors.lastname" class="mt-2 text-danger-500 block text-sm">{{ errors.lastname[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Fecha de nacimiento *"
                        type="date" 
                        placeholder="Ingrese la fecha de nacimiento del beneficiario"
                        name="birth_date"
                        v-model="birth_date"
                        :error="birth_dateError"
                    />
                    <p v-if="errors.birth_date" class="mt-2 text-danger-500 block text-sm">{{ errors.birth_date[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="curp *"
                        type="text"
                        placeholder="Ingrese el curp del beneficiario"
                        name="curp"
                        v-model="curp"
                        :error="curpError"
                    />
                    <p v-if="errors.curp" class="mt-2 text-danger-500 block text-sm">{{ errors.curp[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Select
                        label="Tipo de sangre"
                        type="text"
                        placeholder="Seleccione su tipo de sangre"
                        name="bloodtype"
                        :options="blood_types"
                        v-model="blood_type"
                        :error="blood_typeError"
                    />
                    <p v-if="errors.curp" class="mt-2 text-danger-500 block text-sm">{{ errors.curp[0] }}</p>
                </div>
                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Crear" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/beneficiaries/' }"
                    ><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                Estas a punto de agregar una nueva entidad a la base de datos.<br>
                ¿Estás seguro que quieres continuar?
                <br><br>
                <div>
                    <div>
                        <p class="font-bold">Nombre del Hospital:</p>
                        {{ name }}
                    </div>
                    <div>
                        <p class="font-bold">Direccion:</p>
                        {{ lastname }}
                    </div>
                    <div>
                        <p class="font-bold">Longitude:</p>
                        {{ birth_date }}
                    </div>
                    <div>
                        <p class="font-bold">Latitude:</p>
                        {{ curp }}
                    </div>
                    <div>
                        <p class="font-bold">Latitude:</p>
                        {{ blood_type }}
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="createBeneficiary()" />
                    <Button btnClass="btn-dark" text="Retroceder" @click="displayConfirmMessage()" />
                </div>
            </Card>
        </div>
    </div>
</template>

<script>
    import Card from "@/components/Card";
    import Button from "@/components/Button";
    import Textarea from "@/components/Textarea";
    import Textinput from "@/components/Textinput";
    import { useField, useForm } from "vee-validate";
    import Select from "@/components/Select";
    import { ref } from "vue";
    import axios from "@/plugins/axios";
    import * as yup from 'yup';
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';
    import { useToast } from "vue-toastification";
    import router from '../../router';

    export default {
        components: {
            Textinput,
            Button,
            Textarea,
            Select,
            Textinput,
            Card
        },
        setup() {
            const schema = yup.object().shape({
                name: yup.string()
                    .required("El nombre del beneficiario es requerido")
                    .min(3, "El nombre debe de contener al menos 3 caracteres")
                    .matches(/^[^\d]+$/, "El nombre no puede contener numeros"),
                lastname: yup.string()
                    .required("Los apellidos son requeridos")
                    .min(3, "El apellido debe de contener al menos 3 caracteres")
                    .matches(/^[^\d]+$/, "El apellido no puede contener numeros"),
                birth_date: yup.string()
                    .required("La fecha de nacimiento es requerida"),
                curp: yup.string()
                    .required("El curp es requerido")
                    .max(18, "El curp no puede exceder los 18 caracteres")
                    .min(18, "El curp debe de tener al menos 18 caracteres"),
                blood_type: yup.string()
                    .required("El tipo de sangre es requerido")
            });

            let formValues = ref([]);
            const { handleSubmit } = useForm({
                validationSchema: schema,
            });
            const trySubmit = handleSubmit(async (values) => {
                formValues = values;
                displayConfirmMessage();
            }); 
            const onSubmit = handleSubmit((values) => {
                const newHospitalForm = [
                    { name: 'name', value: name.value },
                    { name: 'lastname', value: lastname.value },
                    { name: 'birth_date', value: birth_date.value },
                    { name: 'curp', value: curp.value },
                    { name: 'blood_type', value: blood_type.value },
                ];
                trySubmit(newHospitalForm);
            });

            
            let confirmMessageFlag = ref(false);
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            
            let errorMessage = ref("");
            let errors = ref([]);
            const toast = useToast();
            function userRedirect(){
                router.push('/beneficiaries', {shallow: false});
            }
            function createBeneficiary(){
                confirmMessageFlag.value = false;
                axios.post(`/api/beneficiaries/`, formValues)
                .then(res => {
                    console.log(res);
                    useCachedDataStoreHospitals().refreshData();
                    toast.success("¡Beneficiario creado correctamente!", { timeout: 1000 });
                    setTimeout(userRedirect, 1000);
                })
                .catch(error => {
                    toast.error("Ha ocurrido un error inesperado.", { timeout: 2000 });
                    if (error.response && error.response.data) {
                        const responseData = error.response.data;
                        errorMessage.value = responseData.message || 'An error occurred.';

                        if (responseData.errors) {
                            errors.value = responseData.errors;
                        }
                    } else {
                        errorMessage.value = 'An error occurred.';
                    }
                    console.log(errors)
                    console.log(errorMessage)
                });
            }

            const { value: name, errorMessage: nameError } = useField("name");
            const { value: lastname, errorMessage: lastnameError } = useField("lastname");
            const { value: birth_date, errorMessage: birth_dateError } = useField("birth_date");
            const { value: curp, errorMessage: curpError } = useField("curp");
            const { value: blood_type, errorMessage: blood_typeError } = useField("blood_type");

            const blood_types = [
                { value: 'A+', label: 'A+' },
                { value: 'A-', label: 'A-' },
                { value: 'B+', label: 'B+' },
                { value: 'B-', label: 'B-' },
                { value: 'AB+', label: 'AB+' },
                { value: 'AB-', label: 'AB-' },
                { value: 'O+', label: 'O+' },
                { value: 'O-', label: 'O-' }
            ];

            return {
                blood_types,
                createBeneficiary,
                displayConfirmMessage,
                confirmMessageFlag,
                name,
                nameError,
                lastname,
                lastnameError,
                birth_date,
                birth_dateError,
                curp,
                curpError,
                blood_type,
                blood_typeError,
                onSubmit,
                errors,
                errorMessage
            };
        }
    }
</script>