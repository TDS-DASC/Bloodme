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
                v-if="agentData"
            >
                <Textinput
                    label="Nombre *"
                    type="text"
                    placeholder="Ingrese el nombre"
                    name="name"
                    v-model=name
                />
                <Textinput
                    label="Apellidos"
                    type="text"
                    placeholder="Ingrese sus apellidos"
                    name="lastname"
                    v-model=lastname
                />
                <Textinput
                    label="Alias"
                    type="text"
                    placeholder="Ingrese el alias"
                    name="alias"
                    v-model=alias
                />

                <Textinput
                    label="Fecha de nacimiento"
                    type="date"
                    placeholder="Fecha de nacimiento"
                    name="date"
                    v-model=birth_date
                />

                <Select
                    label="Tipo de sangre"
                    type="text"
                    placeholder="Enter minimum 3 Characters"
                    name="bloodtype"
                    v-model=blood_type
                    :options=bloodTypes
                />
                <Textinput
                    label="Número celular"
                    placeholder="8+ characters, 1 capitat letter "
                    name="phone"
                    v-model=phone_number
                />
                <Textinput
                    label="CURP"
                    type="text"
                    placeholder="Enter Valid CURP"
                    name="curp"
                    v-model=curp
                />
                <Textinput
                    label="email"
                    type="email"
                    placeholder="Enter Valid URL"
                    name="email"
                    v-model=email
                />

                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Modificar" btnClass="btn-primary"></Button>
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
                name: yup.string().required("El nombre es requerido"),
                lastname: yup.string().required("Los apellidos son requeridos"),
                alias: yup.string().required("El alias es requerido"),
                birth_date: yup.date().nullable().required("La fecha de nacimiento es requerida"),
                blood_type: yup.string().nullable().required("El tipo de sangre es requerido"),
                phone_number: yup.string().required("El número de teléfono es requerido"),
                curp: yup.string().required("El CURP es requerido"),
                email: yup.string().required("El correo electrónico es requerido").email("Correo electrónico inválido"),
                sex: yup.string().required("El sexo es requerido"),
                hospital_id: yup.string().required("El debe de seleccionar un hospital"),
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
                    { name: 'phone_number', value: phone_number.value },
                    { name: 'sex', value: sex.value },
                    { name: 'email', value: email.value },
                    { name: 'hospital_id', value: hospital_id.value },
                ];
                console.log("wep");
                console.log(newUserForm);
                trySubmit(newUserForm);
            });


            const bloodTypes = [
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

            const router = useRouter();
            const { agentsTable } = useCachedDataStoreAgents();
            const agentId = router.currentRoute.value.params.id;
            useCachedDataStoreAgents().fetchData();

            function passAgentValuesToSingleVariables(){
                name.value = agentData.value.name;
                lastname.value = agentData.value.lastname;
                alias.value = agentData.value.alias;
                birth_date.value = agentData.value.birth_date;
                blood_type.value = agentData.value.blood_type;
                phone_number.value = agentData.value.phone_number;
                curp.value = agentData.value.curp;
                email.value = agentData.value.email;
                
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
                        toast.success("Agente editado correctamente!", { timeout: 1000 });
                        /* setTimeout(userRedirect, 1000); */
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
                bloodTypes,
                onSubmit,
                agentsTable,
                agentData,
                confirmMessageFlag,
                displayConfirmMessage,
                editAgent
            };
        }
    }
</script>