<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Editar Administrador</h3><br>
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
                    required
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
                    label="email"
                    type="email"
                    placeholder="Ingrese un correo electrónico"
                    name="email"
                    v-model="email"
                    :error="emailError"
                />

                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Editar" btnClass="btn-primary"></Button>
                    <router-link :to="{ path:  '/administrators/' }">
                        <Button btnClass="btn-dark" text="Cancelar" />
                    </router-link>
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
                        <p class="font-bold dark:text-white">Nombre/s:</p>
                        <span class="dark:text-gray-300">
                            {{ name }}
                        </span>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Apellido/s:</p>
                        <span class="dark:text-gray-300">
                            {{ lastname }}
                        </span>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">email:</p>
                        <span class="dark:text-gray-300">
                            {{ email }}
                        </span>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Participante:</p>
                        <span class="dark:text-gray-300">{{ participants.find(b => b.value == user_id)?.label }}</span>
                    </div>
                </div>
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
    import Textinput from "@/components/Textinput";
    import Select from "@/components/Select";
    import { ref, watch } from "vue";
    import { useField, useForm } from "vee-validate";
    import * as yup from "yup";
    import axios from "@/plugins/axios";
    import { useToast } from "vue-toastification";
    import { useRouter } from 'vue-router';
    import { useCachedDataStoreAdministrators } from '../../stores/administratorsStore';


    export default {
        components: {
            Textinput,
            Button,
            Select,
            Card
        },
        setup() {
            const schema = yup.object({
                name: yup.string().required("El nombre es requerido")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                lastname: yup.string().required("Los apellidos son requeridos")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                email: yup.string().required("El correo electrónico es requerido").email(),
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
                console.log("sup");
                const newUserForm = [
                    { name: 'name', value: name.value },
                    { name: 'lastName', value: lastname.value },
                    { name: 'email', value: email.value },
                ];
                trySubmit(newUserForm);
            });

            const { value: name, errorMessage: nameError } = useField("name");
            const { value: lastname, errorMessage: lastnameError } = useField("lastname");
            const { value: email, errorMessage: emailError } = useField("email");

            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            const router = useRouter();
            function userRedirect(){
                router.push('/administrators', {shallow: false});
            }
            function createUser(){
                confirmMessageFlag.value = false;
                axios.put(`/api/administrators/${administratorId}`, formValues)
                    .then(res => {
                        useCachedDataStoreAdministrators().refreshData();
                        toast.success("¡Administrador editado correctamente!", { timeout: 1000 });
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

            const { administratorsTable } = useCachedDataStoreAdministrators();
            const administratorId = router.currentRoute.value.params.id;
            useCachedDataStoreAdministrators().fetchData();

            function passAgentValuesToSingleVariables(){
                name.value = administratorData.value.name;
                lastname.value = administratorData.value.lastname;
                email.value = administratorData.value.email;
            }

            let administratorData = ref(null); 
            watch(administratorsTable, () => {
                administratorData.value = administratorsTable.find(objeto => objeto.id == administratorId);
                if(administratorData.value != null){
                    passAgentValuesToSingleVariables();
                }
            });
            if(administratorsTable){
                administratorData.value = administratorsTable.find(objeto => objeto.id == administratorId);
                if(administratorData.value != null){
                    passAgentValuesToSingleVariables();
                }
            }

            return {
                confirmMessageFlag,
                createUser,
                displayConfirmMessage,
                onSubmit,
                name,
                nameError,
                lastname,
                lastnameError,
                email,
                emailError,
            };
        }
    }
</script>