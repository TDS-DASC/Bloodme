<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Hospital</h3><br>
            </div>
            <div class="w-full border-slate-200 border-b-2 dark:border-slate-600"></div>
            <br>
            {{  errors.address }}
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
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                    label="Adress"
                    type="text"
                    placeholder="Ingrese sus apellidos"
                    name="lastname"
                    v-model="address"
                    :error="addressError"
                    />
                    <p v-if="errors.address" class="mt-2 text-danger-500 block text-sm">{{ errors.address[0] }}</p>
                </div>
                <Textinput
                    label="longitude"
                    type="number" 
                    placeholder="Ingrese el alias"
                    name="alias"
                    v-model="longitude"
                    :error="longitudeError"
                />

                <Textinput
                    label="latitude"
                    type="number"
                    placeholder="Fecha de nacimiento"
                    name="latitude"
                    v-model="latitude"
                    :error="latitudeError"
                />
                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Crear" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/hospitals/' }"
                    ><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessage">
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
    import { useField, useForm } from "vee-validate";
    import Select from "@/components/Select";
    import { ref } from "vue";
    import axios from "@/plugins/axios";
    import * as yup from 'yup';

    export default {
        components: {
            Textinput,
            Button,
            Textarea,
            Select,
            Textinput,
            Card
        },
        props: {
            formInformation: Object,
        },
        setup() {
            const schema = yup.object().shape({
                name: yup.string().required("El nombre del hospital es requerido"),
                address: yup.string().required("Los apellidos son requeridos"),
                longitude: yup.string().required("El alias es requerido"),
                latitude: yup.string().required("La fecha de nacimiento es requerida"),
            });

            const { handleSubmit } = useForm({
                validationSchema: schema,
            });

            const { value: name, errorMessage: nameError } = useField("name");
            const { value: address, errorMessage: addressError } = useField("address");
            const { value: longitude, errorMessage: longitudeError } = useField("longitude");
            const { value: latitude, errorMessage: latitudeError } = useField("latitude");

            let errorMessage = ref("");
            let errors = ref([]);
            const trySubmit = handleSubmit(async (values) => {
                axios.post(`/api/hospitals/`, values)
                .then(res => {
                    console.log(res);
                })
                .catch(error => {
                    if (error.response && error.response.data) {
                        const responseData = error.response.data;
                        errorMessage.value = responseData.message || 'An error occurred.';

                        // Check if there are errors for specific fields
                        if (responseData.errors) {
                            errors.value = responseData.errors;
                        }
                    } else {
                        errorMessage.value = 'An error occurred.';
                    }
                    console.log(errors)
                    console.log(errorMessage)
                });
            }); 
            const onSubmit = handleSubmit((values) => {
                const newUserForm = [
                    { name: 'name', value: name.value },
                    { name: 'address', value: address.value },
                    { name: 'longitude', value: longitude.value },
                    { name: 'latitude', value: latitude.value },
                ];
                trySubmit(newUserForm);
            });

            /* No de la template */
            const sex_options = [
                { value: "1", label: "Hombre" },
                { value: "2", label: "Mujer" },
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

            let confirmMessage = ref(false)
            function displayConfirmMessage(){
                console.log(confirmMessage.value);
                confirmMessage.value = !confirmMessage.value;
            }
            function createUser(){
                confirmMessage.value = false;
                console.log("Usuario creado");
            }
            

            return {
                blood_types,
                createUser,
                sex_options,
                displayConfirmMessage,
                confirmMessage,
                address,
                addressError,
                longitude,
                longitudeError,
                name,
                nameError,
                latitude,
                latitudeError,
                onSubmit,
                errors,
                errorMessage
            };
        }
    }
</script>