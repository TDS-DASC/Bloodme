<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Administrador</h3><br>
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
                    label="Apellidos *"
                    type="text"
                    placeholder="Ingrese sus apellidos"
                    name="lastname"
                    v-model="lastname"
                    :error="lastnameError"
                />

                <Textinput
                    label="email *"
                    type="email"
                    placeholder="Ingrese un correo electrónico"
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
                    <Button type="button" text="Cancelar" btnClass="btn-dark" @click="confirmCancelation()"></Button>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-36 right-1/3" v-if="confirmMessageFlag || cancellationFlag">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                <span class="dark:text-white" v-if="confirmMessageFlag == true">
                    Estas a punto de agregar una nueva entidad a la base de datos.<br>
                    ¿Estás seguro que quieres continuar?
                </span>
                <span class="dark:text-white" v-if="cancellationFlag == true">
                    Vas a abandonar el formulario de creación con información que ya has ingresado.<br><br>
                    ¿Estás seguro que quieres continuar? Esta información será eliminada.
                </span>
                <br><br>
                <div>
                    <div v-if="name">
                        <p class="font-bold dark:text-white">Nombre/s:</p>
                        <span class="dark:text-gray-300">
                            {{ name }}
                        </span>
                    </div>
                    <div v-if="lastname">
                        <p class="font-bold dark:text-white">Apellido/s:</p>
                        <span class="dark:text-gray-300">
                            {{ lastname }}
                        </span>
                    </div>
                    <div v-if="email">
                        <p class="font-bold dark:text-white">Email:</p>
                        <span class="dark:text-gray-300">
                            {{ email }}
                        </span>
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="createUser()" v-if="confirmMessageFlag == true" />
                    <Button btnClass="btn-dark" text="Retroceder" @click="displayConfirmMessage()" v-if="confirmMessageFlag == true" />
                    <Button btnClass="btn-primary" text="Confirmar" @click="backToIndex()" v-if="cancellationFlag == true" />
                    <Button btnClass="btn-dark" text="Retroceder" @click="displayCancellationMessage()" v-if="cancellationFlag == true" />
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
                password: yup.string().required("La contraseña es requerida").min(8),
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
                    { name: 'email', value: email.value },
                    { name: 'password', value: password.value },
                ];
                trySubmit(newUserForm);
            });

            const { value: name, errorMessage: nameError } = useField("name");
            const { value: lastname, errorMessage: lastnameError } = useField("lastname");
            const { value: password, errorMessage: passwordError } = useField("password");
            const { value: email, errorMessage: emailError } = useField("email");

            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function displayCancellationMessage(){
                cancellationFlag.value = !cancellationFlag.value;
            }
            const router = useRouter();
            function userRedirect(){
                router.push({ path: '/refresh', query: { urlHeader: 'administrators' } });
            }
            function createUser(){
                confirmMessageFlag.value = false;
                axios.post(`/api/administrators/`, formValues)
                    .then(res => {
                        useCachedDataStoreAdministrators().refreshData();
                        toast.success("¡Administrador creado correctamente!", { timeout: 1000 });
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
            let cancellationFlag = ref(false)
            let backToIndex = () => {
                router.push({ path: '/administrators' });
            }
            let confirmCancelation = () => {
                if(name.value || lastname.value || password.value || email.value){
                        cancellationFlag.value = true;
                }else 
                    backToIndex()
            }

            return {
                backToIndex,
                cancellationFlag,
                displayCancellationMessage,
                confirmCancelation,
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
                password,
                passwordError,
            };
        }
    }
</script>