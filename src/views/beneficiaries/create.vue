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
                    <Select
                        label="Participante *"
                        type="text"
                        placeholder="Seleccione el participante"
                        name="participant"
                        :options="sortedParticipantList"
                        v-model="participant_value"
                        :error="participant_valueError"
                    />
                    <p v-if="errors.blood_type" class="mt-2 text-danger-500 block text-sm">{{ errors.blood_type[0] }}</p>
                </div>
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
                        label="Fecha de nacimiento"
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
                        label="Tipo de sangre *"
                        type="text"
                        placeholder="Seleccione su tipo de sangre"
                        name="bloodtype"
                        :options="blood_types"
                        v-model="blood_type"
                        :error="blood_typeError"
                    />
                    <p v-if="errors.blood_type" class="mt-2 text-danger-500 block text-sm">{{ errors.blood_type[0] }}</p>
                </div>
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
                    <div>
                        <p class="font-bold dark:text-white">Participante al que será enlazado:</p>
                        <p class="dark:text-gray-300">
                            {{ sortedParticipantList.find(participant => participant.value == participant_value)?.label }}	
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Nombre/s:</p>
                        <p class="dark:text-gray-300">
                            {{ name }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Apellidos:</p>
                        <p class="dark:text-gray-300">
                            {{ lastname }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Fecha de nacimiento:</p>
                        <p class="dark:text-gray-300">
                            {{ birth_date }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">CURP:</p>
                        <p class="dark:text-gray-300">
                            {{ curp }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Tipo de sangre:</p>
                        <p class="dark:text-gray-300">
                            {{ blood_type }}
                        </p>
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="createBeneficiary()" v-if="confirmMessageFlag == true" />
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
    import Textarea from "@/components/Textarea";
    import Textinput from "@/components/Textinput";
    import { useField, useForm } from "vee-validate";
    import Select from "@/components/Select";
    import { ref } from "vue";
    import axios from "@/plugins/axios";
    import * as yup from 'yup';
    import { useToast } from "vue-toastification";
    import router from '../../router';
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useCachedDataStoreParticipants } from '../../stores/participantsStore';

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
            const { participantsTable} = useCachedDataStoreParticipants();
            const sortedParticipantList = ref([]);
            async function fetchData() {
                await useCachedDataStoreParticipants().fetchData();
                console.log(participantsTable)
                sortedParticipantList.value = participantsTable.map(participant => ({
                    value: participant.id,
                    label: participant.name
                }));
            }
            fetchData();
            const schema = yup.object().shape({
                participant: yup.string()
                    .required("El participante es requerido"),
                name: yup.string()
                    .required("El nombre del beneficiario es requerido")
                    .min(3, "El nombre debe de contener al menos 3 caracteres")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                lastname: yup.string()
                    .required("Los apellidos son requeridos")
                    .min(3, "El apellido debe de contener al menos 3 caracteres")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                birth_date: yup.string(),
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
                const newBeneficiaryForm = [
                    { name: 'name', value: name.value },
                    { name: 'lastname', value: lastname.value },
                    { name: 'birth_date', value: birth_date.value },
                    { name: 'curp', value: curp.value },
                    { name: 'blood_type', value: blood_type.value },
                ];
                trySubmit(newBeneficiaryForm);
            });

            
            let confirmMessageFlag = ref(false);
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function displayCancellationMessage(){
                cancellationFlag.value = !cancellationFlag.value;
            }
            
            let errorMessage = ref("");
            let errors = ref([]);
            const toast = useToast();
            function userRedirect(){
                router.push({ path: '/refresh', query: { urlHeader: 'beneficiaries' } });
            }
            function createBeneficiary(){
                confirmMessageFlag.value = false;
                axios.post(`api/participants/${participant_value.value}/beneficiaries`, formValues)
                .then(res => {
                    console.log(res);
                    useCachedDataStoreBeneficiaries().refreshData();
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
            let cancellationFlag = ref(false)
            let backToIndex = () => {
                router.push({ path: '/beneficiaries' });
            }
            let confirmCancelation = () => {
                if(name.value || lastname.value || birth_date.value || curp.value || blood_type.value || participant_value.value) {
                        cancellationFlag.value = true;
                }else 
                    backToIndex()
            }

            const { value: name, errorMessage: nameError } = useField("name");
            const { value: lastname, errorMessage: lastnameError } = useField("lastname");
            const { value: birth_date, errorMessage: birth_dateError } = useField("birth_date");
            const { value: curp, errorMessage: curpError } = useField("curp");
            const { value: blood_type, errorMessage: blood_typeError } = useField("blood_type");
            const { value: participant_value, errorMessage: participant_valueError } = useField("participant");

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
                backToIndex,
                displayCancellationMessage,
                cancellationFlag,
                confirmCancelation,
                sortedParticipantList,
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
                participant_value,
                participant_valueError,
                onSubmit,
                errors,
                errorMessage
            };
        }
    }
</script>