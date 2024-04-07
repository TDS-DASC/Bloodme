<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Editar Hospital</h3><br>
            </div>
            <div class="w-full border-slate-200 border-b-2 dark:border-slate-600"></div>
            <br>
            <form
                @submit.prevent="onSubmit"
                class="lg:grid-cols-2 grid gap-5 grid-cols-1"
                v-if="hospitalData"
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
                        type="text" 
                        placeholder="Ingrese la coordenada longitud"
                        name="longitude"
                        v-model="longitude"
                        :error="longitudeError"
                        @input="validateFloatInput"
                    />
                    <p v-if="errors.longitude" class="mt-2 text-danger-500 block text-sm">{{ errors.longitude[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="latitude"
                        type="text"
                        placeholder="Ingrese la coordenada de latitud"
                        name="latitude"
                        v-model="latitude"
                        :error="latitudeError"
                        @input="validateFloatInput"
                    />
                    <p v-if="errors.latitude" class="mt-2 text-danger-500 block text-sm">{{ errors.latitude[0] }}</p>
                </div>
                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Modificar" btnClass="btn-primary"></Button>
                    <router-link :to="{ path:  '/hospitals/' }"><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                <p class="text-white">
                    Estas a punto de editar una entidad de la base de datos.<br>
                    ¿Estás seguro que quieres continuar?
                </p>
                <br>
                <div>
                    <div>
                        <p class="font-bold dark:text-white">Nombre del Hospital:</p>
                        <p class="dark:text-gray-300">
                            {{ name }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Direccion:</p>
                        <p class="dark:text-gray-300">
                            {{ address }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Longitude:</p>
                        <p class="dark:text-gray-300">
                            {{ longitude }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Latitude:</p>
                        <p class="dark:text-gray-300">
                            {{ latitude }}
                        </p>
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="editHospital()" />
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
    import { useCachedDataStoreHospitals } from '@/stores/hospitalsStore';
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
        methods: {
            validateLongitudeInput(event) {
                this.validateFloatInput(event, 'longitude');
            },
            validateLatitudeInput(event) {
                this.validateFloatInput(event, 'latitude');
            },
            validateFloatInput(event, field) {
                const regex = /^-?\d*\.?\d*$/;
                let input = event.target.value;

                if (!regex.test(input)) {
                    input = input.slice(0, -1);
                    event.target.value = input;
                }
                this[field] = input;
            }
        },
        setup() {
            const schema = yup.object().shape({
                name: yup.string()
                    .required("El nombre del hospital es requerido")
                    .min(5, "El nombre debe de contener al menos 5 caracteres")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                address: yup.string()
                    .required("Los apellidos son requeridos")
                    .min(10, "La direccion debe de contener al menos 10 caracteres"),
                longitude: yup.string()
                    .required("La coordenada de longitud es requerida"),
                latitude: yup.string()
                    .required("La coordenada de latitud es requerida"),
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
                const newHospitalForm = [
                    { name: 'name', value: name.value },
                    { name: 'address', value: address.value },
                    { name: 'longitude', value: longitude.value },
                    { name: 'latitude', value: latitude.value },
                ];
                trySubmit(newHospitalForm);
            });
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function userRedirect(){
                router.push('/hospitals', {shallow: false});
            }
            function editHospital() {
                confirmMessageFlag.value = false;
                axios.put(`/api/hospitals/${hospitalId}`, formValues)
                    .then(res => {
                        useCachedDataStoreHospitals().refreshData();
                        toast.success("¡Hospital editado correctamente!", { timeout: 1000 });
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
                    });
            }

            const { value: name, errorMessage: nameError } = useField("name");
            const { value: address, errorMessage: addressError } = useField("address");
            const { value: longitude, errorMessage: longitudeError } = useField("longitude");
            const { value: latitude, errorMessage: latitudeError } = useField("latitude");

            const router = useRouter();
            const { hospitalsTable } = useCachedDataStoreHospitals();
            const hospitalId = router.currentRoute.value.params.id;
            useCachedDataStoreHospitals().fetchData();

            function passHospitalValuesToSingleVariables() {
                name.value = hospitalData.value.name;
                address.value = hospitalData.value.address;
                latitude.value = hospitalData.value.latitude;
                longitude.value = hospitalData.value.longitude;
            }

            let hospitalData = ref(null); 
            watch(hospitalsTable, () => {
                hospitalData.value = hospitalsTable.find(objeto => objeto.id == hospitalId);
                if(hospitalData.value != null){
                    console.log(hospitalData.value);
                    passHospitalValuesToSingleVariables();
                }
            });
            if(hospitalsTable){
                hospitalData.value = hospitalsTable.find(objeto => objeto.id == hospitalId);
                if(hospitalData.value != null){
                    console.log(hospitalData.value);
                    passHospitalValuesToSingleVariables();
                }
            }

            return {
                onSubmit,
                hospitalsTable,
                hospitalData,
                confirmMessageFlag,
                displayConfirmMessage,
                editHospital,
                address,
                addressError,
                longitude,
                longitudeError,
                name,
                nameError,
                latitude,
                latitudeError,
                errors,
                errorMessage
            };
        }
    }
</script>