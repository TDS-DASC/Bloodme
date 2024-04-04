<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Agente</h3><br>
            </div>
            <div class="w-full border-slate-200 border-b-2 dark:border-slate-600"></div>
            <br>
            <form
                @submit.prevent="onSubmit"
                class="lg:grid-cols-2 grid gap-5 grid-cols-1"
            >
                <Textinput
                    label="Nombre *"
                    type="text"
                    placeholder="Ingrese el nombre"
                    name="name"
                    v-model="name"
                    :error="nameError"
                />
                <Textinput
                    label="Apellidos"
                    type="text"
                    placeholder="Ingrese sus apellidos"
                    name="lastname"
                    v-model="lastname"
                    :error="lastnameError"
                />
                <Textinput
                    label="Alias"
                    type="text"
                    placeholder="Ingrese el alias"
                    name="alias"
                    v-model="alias"
                    :error="aliasError"
                />

                <Textinput
                    label="Fecha de nacimiento"
                    type="date"
                    placeholder="Fecha de nacimiento"
                    name="date"
                    v-model="birth_date"
                    :error="birth_dateError"
                />

                <Select
                    label="Tipo de sangre"
                    type="text"
                    placeholder="Seleccione su tipo de sangre"
                    name="bloodtype"
                    :options="blood_types"
                    v-model="blood_type"
                    :error="blood_typeError"
                />
                <Select
                    label="Sexo"
                    type="text"
                    placeholder="Seleccione su sexo"
                    name="sex"
                    v-model="sex"
                    :error="sexError"
                    :options="sex_options"
                />
                <Select
                    label="Hospital"
                    type="text"
                    placeholder="Hospital perteneciente"
                    name="hospital_id"
                    v-model="hospital_id"
                    :error="hospital_idError"
                    :options="hospitals"
                />
                <Textinput
                    label="Número celular"
                    type="number"
                    placeholder="Ingrese su número celular"
                    name="phone"
                    v-model="phone_number"
                    :error="phone_numberError"
                />
                <Textinput
                    label="CURP"
                    type="text"
                    placeholder="Ingrese un curp valido"
                    name="curp"
                    v-model="curp"
                    :error="curpError"
                />
                <Textinput
                    label="email"
                    type="email"
                    placeholder="Ingrese un correo electronico"
                    name="email"
                    v-model="email"
                    :error="emailError"
                />
                <Textinput
                    label="Contraseña*"
                    type="password"
                    placeholder="Ingrese su contraseña"
                    name="password"
                    v-model="password"
                    :error="passwordError"
                    hasicon
                />

                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Crear" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/agents/' }"
                    ><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                Estas a punto de agregar una nueva entidad a la base de datos.<br>
                ¿Estás seguro que quieres continuar?
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="createUser()" />
                    <Button btnClass="btn-dark" text="Cancelar" @click="displayConfirmMessage()" />
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
    import Select from "@/components/Select";
    import { ref, watch } from "vue";
    import * as yup from 'yup';
    import { useField, useForm } from "vee-validate";
    import axios from "@/plugins/axios";
    import { useToast } from "vue-toastification";
    import { useCachedDataStoreAgents } from '@/stores/agentsStore';
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';
    import { useRouter } from 'vue-router';

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
                name: yup.string().required("El nombre es requerido"),
                lastname: yup.string().required("Los apellidos son requeridos"),
                password: yup.string().required("La contraseña es requerida").min(8, "La contraseña debe tener al menos 8 caracteres"),
                email: yup.string().required("El correo electrónico es requerido").email("Correo electrónico inválido"),
                alias: yup.string().nullable(),
                birth_date: yup.date().nullable(),
                sex: yup.string().nullable(),
                phone_number: yup.string().nullable(),
                curp: yup.string()
                    .required("El curp es requerido")
                    .max(18, "El curp no puede exceder los 18 caracteres")
                    .min(18, "El curp debe de tener al menos 18 caracteres"),
                hospital_id: yup.string().nullable().required("Se debe de seleccionar un hospital"),
            });

            let errorMessage = ref("");
            let errors = ref([]);
            let formValues = ref([]);
            let confirmMessageFlag = ref(false);
            const toast = useToast();
            const { handleSubmit } = useForm({
                validationSchema: schema,
            });
            const trySubmit = handleSubmit(async (values) => {
                formValues = values;
                displayConfirmMessage();
            });
            const onSubmit = handleSubmit((values) => {
                const newUserForm = [
                    { name: 'name', value: name.value },
                    { name: 'lastName', value: lastname.value },
                    { name: 'alias', value: alias.value },
                    { name: 'birth_date', value: birth_date.value },
                    { name: 'blood_type', value: blood_type.value },
                    { name: 'phone_number', value: phone_number.value },
                    { name: 'curp', value: curp.value },
                    { name: 'email', value: email.value },
                    { name: 'sex', value: sex.value },
                    { name: 'hospital_id', value: hospital_id.value },
                    { name: 'password', value: password.value },
                ];
                console.log(newUserForm)
                trySubmit(newUserForm);
            });


            let hospitals = ref([]);
            const { hospitalsTable } = useCachedDataStoreHospitals();
            useCachedDataStoreHospitals().fetchData();
            watch(hospitalsTable, () => {
                fillHospitalArray();
            });

            if(hospitals.value.length == 0){
                if(hospitalsTable != null){
                    fillHospitalArray();
                }
            }
            function fillHospitalArray(){
                hospitals.value = hospitalsTable.map(hospital => ({
                    value: hospital.id,
                    label: hospital.name
                }));
            }

            const sex_options = [
                { value: "H", label: "Hombre" },
                { value: "M", label: "Mujer" },
            ];
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

            const { value: name, errorMessage: nameError } = useField("name");
            const { value: lastname, errorMessage: lastnameError } = useField("lastname");
            const { value: alias, errorMessage: aliasError } = useField("alias");
            const { value: birth_date, errorMessage: birth_dateError } = useField("birth_date");
            const { value: blood_type, errorMessage: blood_typeError } = useField("blood_type");
            const { value: phone_number, errorMessage: phone_numberError } = useField("phone_number");
            const { value: curp, errorMessage: curpError } = useField("curp");
            const { value: email, errorMessage: emailError } = useField("email");
            const { value: password, errorMessage: passwordError } = useField("password");
            const { value: sex, errorMessage: sexError } = useField("sex");
            const { value: hospital_id, errorMessage: hospital_idError } = useField("hospital_id");

            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            const router = useRouter();
            function userRedirect(){
                /* router.push('/agents', {shallow: false}); */
            }
            function createUser(){
                confirmMessageFlag.value = false;
                axios.post(`/api/agents/`, formValues)
                    .then(res => {
                        console.log(formValues.value);
                        useCachedDataStoreAgents().refreshData();
                        toast.success("¡Agente creado correctamente!", { timeout: 1000 });
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
                        console.log(error);
                    });
            }

            let selectedRole = ref(0);
            function handleRoleChange(newValue, selectedIndex){
                selectedRole = selectedIndex;
                console.log(selectedRole == 1);
            }
            

            return {
                blood_types,
                createUser,
                selectedRole,
                handleRoleChange,
                sex_options,
                hospitals,
                displayConfirmMessage,
                confirmMessageFlag,
                name,
                nameError,
                lastname,
                lastnameError,
                alias,
                aliasError,
                birth_date,
                birth_dateError,
                blood_type,
                blood_typeError,
                phone_number,
                phone_numberError,
                curp,
                curpError,
                email,
                emailError,
                password,
                passwordError,
                sex,
                sexError,
                onSubmit,
                hospital_id,
                hospital_idError,
            };
        }
    }
</script>