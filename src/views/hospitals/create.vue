<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Hospital</h3><br>
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
                    label="Direccion"
                    type="text"
                    placeholder="Ingrese la direccion del hospital"
                    name="address"
                    v-model="address"
                    :error="addressError"
                    />
                    <p v-if="errors.address" class="mt-2 text-danger-500 block text-sm">{{ errors.address[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="longitude"
                        type="number" 
                        placeholder="Ingrese la coordenada longitud"
                        name="longitude"
                        v-model="longitude"
                        :error="longitudeError"
                    />
                    <p v-if="errors.longitude" class="mt-2 text-danger-500 block text-sm">{{ errors.longitude[0] }}</p>
                </div>

                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="latitude"
                        type="number"
                        placeholder="Ingrese la coordenada de latitud"
                        name="latitude"
                        v-model="latitude"
                        :error="latitudeError"
                    />
                    <p v-if="errors.latitude" class="mt-2 text-danger-500 block text-sm">{{ errors.latitude[0] }}</p>
                </div>
                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Crear" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/hospitals/' }"
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
                        {{ address }}
                    </div>
                    <div>
                        <p class="font-bold">Longitude:</p>
                        {{ longitude }}
                    </div>
                    <div>
                        <p class="font-bold">Latitude:</p>
                        {{ latitude }}
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="createHospital()" />
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
                    .required("El nombre del hospital es requerido")
                    .min(5, "El nombre debe de contener al menos 5 caracteres")
                    .matches(/^[^\d]+$/, "El nombre no puede contener numeros"),
                address: yup.string()
                    .required("Los apellidos son requeridos")
                    .min(10, "La direccion debe de contener al menos 10 caracteres"),
                longitude: yup.string()
                    .required("La coordenada de longitud es requerida")
                    .max(45, "La longitud no puede exceder los 45 caracteres"),
                latitude: yup.string()
                    .required("La coordenada de latitud es requerida")
                    .max(45, "La latitude no puede exceder los 45 caracteres"),
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
                    { name: 'address', value: address.value },
                    { name: 'longitude', value: longitude.value },
                    { name: 'latitude', value: latitude.value },
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
                router.push('/hospitals', {shallow: false});
            }
            function createHospital(){
                confirmMessageFlag.value = false;
                axios.post(`/api/hospitals/`, formValues)
                .then(res => {
                    console.log(res);
                    useCachedDataStoreHospitals().refreshData();
                    toast.success("¡Hospital creado correctamente!", { timeout: 1000 });
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
            const { value: address, errorMessage: addressError } = useField("address");
            const { value: longitude, errorMessage: longitudeError } = useField("longitude");
            const { value: latitude, errorMessage: latitudeError } = useField("latitude");

            return {
                createHospital,
                displayConfirmMessage,
                confirmMessageFlag,
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