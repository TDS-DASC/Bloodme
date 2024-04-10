<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Editar Cita</h3><br>
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
                        :options="participants"
                        v-model="user_id"
                        :error="user_idError"
                    />
                    <p v-if="errors.user_id" class="mt-2 text-danger-500 block text-sm">{{ errors.user_id[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Select
                        label="Status *"
                        placeholder="Seleccione una participante"
                        name="participant"
                        :options="statusSelection"
                        v-model="status"
                        :error="statusError"
                    />
                    <p v-if="errors.status" class="mt-2 text-danger-500 block text-sm">{{ errors.status[0] }}</p>
                </div>
                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Editar" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/appointments/' }"
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
                        <span class="dark:text-gray-300">{{ participants.find(b => b.value == user_id)?.label }}</span>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Status:</p>
                        <span class="dark:text-gray-300">{{ status }}</span>
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="editAppointment()" />
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
    import * as yup from 'yup';
    import axios from "@/plugins/axios";
    import { useCachedDataStoreAppointments } from '../../stores/appointmentsStore';
    import { useCachedDataStoreCampaigns } from '../../stores/campaignsStore';
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useCachedDataStoreParticipants } from '../../stores/participantsStore';
    import { useToast } from "vue-toastification";
    import router from '../../router';
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
                date: yup.string()
                    .required("La fecha de la cita es requerida"),
                time: yup.string()
                    .required("Es necesario seleccionar la hora de la cita"),
                description: yup.string().nullable(),
                status: yup.string(),
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
            let savedDate = ref(null);
            const onSubmit = handleSubmit((values) => {
                savedDate = date.value;
                const datetimeWithoutSeconds = `${date.value} ${time.value.substring(0, 5)}`;
                date.value = datetimeWithoutSeconds;
                const newAppointmentForm = [
                    { name: 'date', value: datetimeWithoutSeconds },
                    { name: 'description', value: description.value },
                    { name: 'status', value: status.value },
                    { name: 'campaign_id', value: campaign_id.value },
                    { name: 'user_id', value: user_id.value },
                ];

                trySubmit(newAppointmentForm);
            });

            
            let confirmMessageFlag = ref(false);
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
                if(confirmMessageFlag.value == false){
                    date.value = savedDate.value;
                }
            }
            
            let errorMessage = ref("");
            let errors = ref([]);
            const toast = useToast();
            function userRedirect(){
                router.push('/appointments', {shallow: false});
            }
            function editAppointment(){
                confirmMessageFlag.value = false;
                axios.put(`/api/appointments/${participantId}`, formValues)
                .then(res => {
                    console.log(res);
                    useCachedDataStoreAppointments().refreshData();
                    toast.success("¡Cita editada correctamente!", { timeout: 1000 });
                    console.log(formValues);
                    setTimeout(userRedirect, 1000);
                })
                .catch(error => {
                    console.log(formValues);
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

            const { value: date, errorMessage: dateError } = useField("date");
            const { value: time, errorMessage: timeError } = useField("time");
            const { value: description, errorMessage: descriptionError } = useField("description");
            const { value: status, errorMessage: statusError } = useField("status");
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
            }
            function fillCampaignsArray(){
                campaigns.value = campaignsTable.map(campaign => ({
                    value: campaign.id,
                    label: campaign.id
                }));
            }
            function createCampaignsWithBeneficiaryNames() {
                const campaignsWithBeneficiaryNames = campaignsTable.map(campaign => {
                    const beneficiary = beneficiariesTable.find(beneficiary => beneficiary.id === campaign.beneficiary_id);
                    return {
                        value: campaign.id,
                        label: beneficiary ? beneficiary.name : "Unknown"
                    };
                });
                return campaignsWithBeneficiaryNames;
            }
            let selectOptionForCampaignsInput = ref([]);
            watchEffect(() => {
                if (campaignsTable && beneficiariesTable) {
                    selectOptionForCampaignsInput.value = createCampaignsWithBeneficiaryNames();
                }
            });

            let participants = ref([]);

            function fillParticipantsArray() {
                participants.value = participantsTable.map(participant => ({
                    value: participant.id,
                    label: participant.name
                }));
            }

            const { participantsTable } = useCachedDataStoreParticipants();
            useCachedDataStoreParticipants().fetchData();

            watchEffect(() => {
                if (participantsTable) {
                    fillParticipantsArray();
                }
            });

            const { appointmentsTable } = useCachedDataStoreAppointments();
            useCachedDataStoreAppointments().fetchData();
            const router = useRouter();
            const participantId = router.currentRoute.value.params.id;

            function passParticipantValuesToSingleVariables() {
                let dateFromApi = participantData.value.date;
                let formattedDate = dateFromApi.split(" ")[0];
                date.value = formattedDate;
                time.value = dateFromApi.split(" ")[1];
                description.value = participantData.value.description;
                campaign_id.value = participantData.value.campaign_id;
                user_id.value = participantData.value.user_id;
                status.value = participantData.value.status;
            }
            let participantData = ref(null); 
            watch(appointmentsTable, () => {
                participantData.value = appointmentsTable.find(objeto => objeto.id == participantId);
                if(participantData.value != null){
                    passParticipantValuesToSingleVariables();
                }
            });
            if(appointmentsTable){
                participantData.value = appointmentsTable.find(objeto => objeto.id == participantId);
                if(participantData.value != null){
                    passParticipantValuesToSingleVariables();
                }
            }

            const statusSelection = [
                { value: 'cancelled', label: 'Cancelled' },
                { value: 'pending', label: 'Pending' },
                { value: 'completed', label: 'Completed' },
            ];

            return {
                statusSelection,
                participants,
                selectOptionForCampaignsInput,
                campaigns,
                date,
                status,
                statusError,
                dateError,
                description,
                descriptionError,
                time,
                timeError,
                campaign_id,
                campaign_idError,
                user_id,
                user_idError,
                editAppointment,
                displayConfirmMessage,
                confirmMessageFlag,
                onSubmit,
                errors,
                errorMessage
            };
        }
    }
</script>