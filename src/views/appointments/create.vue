<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Cita</h3><br>
            </div>
            <div class="w-full border-slate-200 border-b-2 dark:border-slate-600"></div>
            <br>
            <form
                @submit.prevent="onSubmit"
                class="lg:grid-cols-2 grid gap-5 grid-cols-1"
            >
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Fecha de la cita *"
                        type="date"
                        name="name"
                        v-model="date"
                        :error="dateError"
                    />
                    <p v-if="errors.date" class="mt-2 text-danger-500 block text-sm">{{ errors.date[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Hora de la cita *"
                        type="time"
                        name="name"
                        v-model="time"
                        :error="timeError"
                    />
                    <p v-if="errors.time" class="mt-2 text-danger-500 block text-sm">{{ errors.time[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Descripcion *"
                        type="text"
                        placeholder="Ingrese una descripción para su cita"
                        name="description"
                        v-model="description"
                        :error="descriptionError"
                    />
                    <p v-if="errors.description" class="mt-2 text-danger-500 block text-sm">{{ errors.description[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Select
                        label="Campaña *"
                        placeholder="Seleccione una campaña"
                        name="campaign"
                        :options="selectOptionForCampaignsInput"
                        v-model="campaign_id"
                        :error="campaign_idError"
                    />
                    <p v-if="errors.campaign_id" class="mt-2 text-danger-500 block text-sm">{{ errors.campaign_id[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Select
                        label="Participantes *"
                        placeholder="Seleccione una participante"
                        name="participant"
                        :options="users"
                        v-model="user_id"
                        :error="user_idError"
                    />
                    <p v-if="errors.user_id" class="mt-2 text-danger-500 block text-sm">{{ errors.user_id[0] }}</p>
                </div>
                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Crear" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/appointments/' }"
                    ><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                <span class="dark:text-white">
                    Estas a punto de agregar una nueva entidad a la base de datos.<br>
                    ¿Estás seguro que quieres continuar?
                </span>
                <br><br>
                <div>
                    <div>
                        <p class="font-bold dark:text-white">Fecha de la cita:</p>
                        <p class="dark:text-gray-300">
                            {{ date }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Descripcion:</p>
                        <p class="dark:text-gray-300">
                            {{ description }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Campaña:</p>
                        <p class="dark:text-gray-300">
                            {{ campaign_id }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Participante:</p>
                        <span class="dark:text-gray-300">{{ users.find(b => b.value == user_id)?.label }}</span>
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="createAppointment()" />
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
    import { ref, watch, watchEffect } from "vue";
    import axios from "@/plugins/axios";
    import * as yup from 'yup';
    import { useCachedDataStoreAppointments } from '../../stores/appointmentsStore';
    import { useCachedDataStoreCampaigns } from '../../stores/campaignsStore';
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useCachedDataStoreParticipants } from '../../stores/participantsStore';
    import { useCachedDataStoreUsers } from '../../stores/usersStore';
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
                date: yup.string()
                    .required("La fecha de la cita es requerida"),
                time: yup.string()
                    .required("Es necesario seleccionar la hora de la cita"),
                description: yup.string(),
                campaign_id: yup.string()
                    .required("La campaña es requerida"),
                user_id: yup.string()
                    .required("Se debe de escoger un participante")
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
                date.value = date.value + " " + time.value;
                const newAppointmentForm = [
                    { name: 'date', value: date.value },
                    { name: 'description', value: description.value },
                    { name: 'campaign_id', value: campaign_id.value },
                    { name: 'user_id', value: 22 },
                ];
                trySubmit(newAppointmentForm);
            });

            
            let confirmMessageFlag = ref(false);
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            
            let errorMessage = ref("");
            let errors = ref([]);
            const toast = useToast();
            function userRedirect(){
                router.push('/appointments', {shallow: false});
            }
            function createAppointment(){
                confirmMessageFlag.value = false;
                axios.post(`/api/appointments/`, formValues)
                .then(res => {
                    useCachedDataStoreAppointments().refreshData();
                    toast.success("Cita creada correctamente!", { timeout: 1000 });
                    console.log("Form Values:");
                    console.log(formValues);
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
                    console.log(errors)
                    console.log(errorMessage)
                });
            }
            /* año-mes-día -espacio- hora:minuto */
            const { value: date, errorMessage: dateError } = useField("date");
            const { value: time, errorMessage: timeError } = useField("time");
            const { value: description, errorMessage: descriptionError } = useField("description");
            const { value: campaign_id, errorMessage: campaign_idError } = useField("campaign_id");
            const { value: user_id, errorMessage: user_idError } = useField("user_id");

            const { campaignsTable } = useCachedDataStoreCampaigns();
            useCachedDataStoreCampaigns().fetchData();
            let campaigns = ref([]);
            watch(campaignsTable, () => {
                fillCampaignsArray();
            });

            const { beneficiariesTable } = useCachedDataStoreBeneficiaries();
            useCachedDataStoreBeneficiaries().fetchData();
            let beneficiaries = ref([]);
            watch(beneficiariesTable, () => {
                fillBeneficiariesArray();
            });

            function fillBeneficiariesArray(){
                beneficiaries.value = beneficiariesTable.map(beneficiaries => ({
                    value: beneficiaries.id,
                    label: beneficiaries.name
                }));
                console.log("Beneficiarios WATCH");
                console.log(beneficiaries.value);
            }
            function fillCampaignsArray(){
                campaigns.value = campaignsTable.map(campaign => ({
                    value: campaign.id,
                    label: campaign.id
                }));
                console.log(campaigns.value);
            }
            function createCampaignsWithBeneficiaryNames() {
                const campaignsWithBeneficiaryNames = campaignsTable.map(campaign => {
                    const beneficiary = beneficiariesTable.find(beneficiary => beneficiary.id === campaign.beneficiary_id);
                    return {
                        value: campaign.id,
                        label: beneficiary ? beneficiary.name : "Unknown" // If beneficiary not found, set label to "Unknown"
                    };
                });
                console.log(campaignsWithBeneficiaryNames);
                return campaignsWithBeneficiaryNames;
            }
            let selectOptionForCampaignsInput = ref([]);
            watchEffect(() => {
                if (campaignsTable && beneficiariesTable) {
                    selectOptionForCampaignsInput.value = createCampaignsWithBeneficiaryNames();
                }
            });

            let users = ref([]);

            function fillParticipantsArray() {
                users.value = usersTable.map(user => ({
                    value: user.id,
                    label: user.name
                }));
                console.log("users WATCH");
                console.log(users.value);
            }

            const { usersTable } = useCachedDataStoreUsers();
            useCachedDataStoreUsers().fetchData();

            watchEffect(() => {
                if (usersTable) {
                    fillParticipantsArray();
                }
            });

            return {
                users,
                selectOptionForCampaignsInput,
                campaigns,
                date,
                dateError,
                description,
                descriptionError,
                campaign_id,
                campaign_idError,
                time,
                timeError,
                user_id,
                user_idError,
                createAppointment,
                displayConfirmMessage,
                confirmMessageFlag,
                onSubmit,
                errors,
                errorMessage
            };
        }
    }
</script>