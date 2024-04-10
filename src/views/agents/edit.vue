<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Editar Agente</h3><br>
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
                        placeholder="Ingrese el nombre"
                        name="name"
                        v-model="name"
                        :error="nameError"
                    />
                    <p v-if="errors.name" class="mt-2 text-danger-500 block text-sm">{{ errors.name[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Apellidos"
                        type="text"
                        placeholder="Ingrese sus apellidos"
                        name="lastname"
                        v-model="lastname"
                        :error="lastnameError"
                    />
                    <p v-if="errors.lastname" class="mt-2 text-danger-500 block text-sm">{{ errors.lastname[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Alias"
                        type="text"
                        placeholder="Ingrese el alias"
                        name="alias"
                        v-model="alias"
                        :error="aliasError"
                    />
                    <p v-if="errors.alias" class="mt-2 text-danger-500 block text-sm">{{ errors.alias[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Fecha de nacimiento"
                        type="date"
                        placeholder="Fecha de nacimiento"
                        name="date"
                        v-model="birth_date"
                        :error="birth_dateError"
                        />
                    <p v-if="errors.birth_date" class="mt-2 text-danger-500 block text-sm">{{ errors.birth_date[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Select
                        label="Sexo"
                        type="text"
                        placeholder="Seleccione su sexo"
                        name="sex"
                        v-model="sex"
                        :error="sexError"
                        :options="sex_options"
                    />
                    <p v-if="errors.sex" class="mt-2 text-danger-500 block text-sm">{{ errors.sex[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Select
                        label="Hospital"
                        type="text"
                        placeholder="Hospital perteneciente"
                        name="hospital_id"
                        v-model="hospital_id"
                        :error="hospital_idError"
                        :options="hospitals"
                    />
                    <p v-if="errors.hospital_id" class="mt-2 text-danger-500 block text-sm">{{ errors.hospital_id[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">                    
                    <Textinput
                        label="Número celular"
                        type="number"
                        placeholder="Ingrese su número celular"
                        name="phone"
                        v-model="phone_number"
                        :error="phone_numberError"
                    />
                    <p v-if="errors.phone_number" class="mt-2 text-danger-500 block text-sm">{{ errors.phone_number[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">                    
                    <Textinput
                        label="CURP"
                        type="text"
                        placeholder="Ingrese un curp valido"
                        name="curp"
                        v-model="curp"
                        :error="curpError"
                    />
                    <p v-if="errors.curp" class="mt-2 text-danger-500 block text-sm">{{ errors.curp[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">                    
                    <Textinput
                        label="email"
                        type="email"
                        placeholder="Ingrese un correo electronico"
                        name="email"
                        v-model="email"
                        :error="emailError"
                    />
                    <p v-if="errors.email" class="mt-2 text-danger-500 block text-sm">{{ errors.email[0] }}</p>
                </div>

                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Editar" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/agents/' }"
                    ><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                <span class="dark:text-white">
                    Estas a punto de editar una entidad de la base de datos.<br>
                    ¿Estás seguro que quieres continuar?
                </span>
                <br><br>
                <div>
                    <div>
                        <p class="font-bold dark:text-white">Nombre del agente:</p>
                        <span class="dark:text-gray-300">
                            {{ name }}
                        </span>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Apellido del agente:</p>
                        <span class="dark:text-gray-300">
                            {{ lastname }}
                        </span>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Curp:</p>
                        <span class="dark:text-gray-300">{{ curp }}</span>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Email:</p>
                        <span class="dark:text-gray-300">{{ email }}</span>
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="editAgent()" />
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
    import { useField, useForm } from "vee-validate";
    import Select from "@/components/Select";
    import { useCachedDataStoreAgents } from '@/stores/agentsStore';
    import { useRouter } from 'vue-router';
    import { ref, watch } from 'vue';
    import * as yup from 'yup';
    import axios from "@/plugins/axios";
    import { useToast } from "vue-toastification";
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';

    export default {
        components: {
            Textinput,
            Button,
            Textarea,
            Select,
            Card
        },
        props: {
            formInformation: Object,
        },
        setup() {
            const schema = yup.object().shape({
                name: yup.string().required("El nombre es requerido")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                lastname: yup.string().required("Los apellidos son requeridos")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                email: yup.string().required("El correo electrónico es requerido").email("Correo electrónico inválido"),
                alias: yup.string().nullable()
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
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
                const newAgentForm = [
                    { name: 'name', value: name.value },
                    { name: 'lastName', value: lastname.value },
                    { name: 'email', value: email.value },
                    { name: 'alias', value: alias.value },
                    { name: 'birth_date', value: birth_date.value },
                    { name: 'image_url', value: null },
                    { name: 'sex', value: sex.value },
                    { name: 'phone_number', value: phone_number.value },
                    { name: 'curp', value: curp.value },
                    { name: 'hospital_id', value: hospital_id.value },
                ];
                console.log(newAgentForm)
                trySubmit(newAgentForm);
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
            const { value: phone_number, errorMessage: phone_numberError } = useField("phone_number");
            const { value: curp, errorMessage: curpError } = useField("curp");
            const { value: email, errorMessage: emailError } = useField("email");
            const { value: sex, errorMessage: sexError } = useField("sex");
            const { value: hospital_id, errorMessage: hospital_idError } = useField("hospital_id");

            const router = useRouter();
            const { agentsTable } = useCachedDataStoreAgents();
            const agentId = router.currentRoute.value.params.id;
            useCachedDataStoreAgents().fetchData();

            function passAgentValuesToSingleVariables(){
                name.value = agentData.value.name;
                lastname.value = agentData.value.lastname;
                alias.value = agentData.value.alias;
                birth_date.value = agentData.value.birth_date;
                phone_number.value = agentData.value.phone_number;
                curp.value = agentData.value.curp;
                email.value = agentData.value.email;
                sex.value = agentData.value.sex;
                hospital_id.value = agentData.value.hospital_id;
            }

            let agentData = ref(null); 
            watch(agentsTable, () => {
                agentData.value = agentsTable.find(objeto => objeto.id == agentId);
                if(agentData.value != null){
                    passAgentValuesToSingleVariables();
                }
            });
            if(agentsTable){
                agentData.value = agentsTable.find(objeto => objeto.id == agentId);
                if(agentData.value != null){
                    passAgentValuesToSingleVariables();
                }
            }

            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function userRedirect(){
                router.push('/agents', {shallow: false});
            }
            function editAgent() {
                confirmMessageFlag.value = false;
                axios.put(`/api/agents/${agentId}`, formValues)
                    .then(res => {
                        console.log(formValues.value);
                        useCachedDataStoreAgents().refreshData();
                        toast.success("¡Agente editado correctamente!", { timeout: 1000 });
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

            return {
                sex,
                sexError,
                name,
                nameError,
                lastname,
                lastnameError,
                alias,
                aliasError,
                birth_date,
                birth_dateError,
                phone_number,
                phone_numberError,
                hospital_id,
                hospital_idError,
                curp,
                curpError,
                email,
                emailError,
                blood_types,
                sex_options,
                hospitals,
                onSubmit,
                agentsTable,
                agentData,
                confirmMessageFlag,
                displayConfirmMessage,
                editAgent,
                errors
            };
        }
    }
</script>