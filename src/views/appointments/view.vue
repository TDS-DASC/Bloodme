<template>
    <div class="">
        <div class="space-y-5 profile-page">
            <div class="w-full">
                <div class="">
                    <Card title="Información de la cita">
                        <div class="flex gap-8">
                            <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="clarity:date-line" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Fecha de la cita
                                        </div>
                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50" v-if="appointmentData">
                                            {{ appointmentData.date }}
                                        </a>
                                        <p v-else>...</p>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="material-symbols:description-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Descripcion
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="appointmentData">
                                        {{ appointmentData.description}}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        <!-- Separacion -->
                        <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="clarity:administrator-line" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Donante 
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="appointmentData">
                                            {{ appointmentData.name }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="material-symbols:campaign-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Campaña: Beneficiario
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="appointmentData">
                                            {{ appointmentData.beneficiary }}
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        </div>
                    </Card>
                    <br>
                    <div class="gap-3 w-1/2 flex">
                        <router-link 
                            :to="`/appointments`" class="w-1/4">
                            <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full">Regresar</Button>
                        </router-link>
                        <router-link 
                            :to="`/appointments/${ id }/edit`" class="w-1/4">
                            <Button type="button" text="Crear" btnClass="btn-warning" class="w-full">Editar</Button>
                        </router-link>
                        <Button type="button" text="Crear" btnClass="btn-danger" class="w-1/4" @click="displayConfirmMessage()">Eliminar</Button>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
          <Card title="Se requiere confirmación" class="text-center" noborder>
            <span class="dark:text-white">
                    Estas a punto de eliminar una entidad de la base de datos.<br>
                    ¿Estás seguro que quieres continuar?
                </span>
              <div class="mt-9 flex justify-evenly">
                  <Button btnClass="btn-primary" text="Confirmar" @click="deleteElement()" />
                  <Button btnClass="btn-dark" text="Cancelar" @click="displayConfirmMessage()" />
              </div>
          </Card>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import profile from "@/components/profile"
    import Card from "@/components/Card";
    import Icon from "@/components/Icon";

    import { useCachedDataStoreAppointments } from '@/stores/appointmentsStore';
    import { useCachedDataStoreParticipants } from '../../stores/participantsStore';
    import { useCachedDataStoreCampaigns } from '../../stores/campaignsStore';
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';

    import { useRouter } from 'vue-router';
    import { ref, watch } from 'vue';
    import { useToast } from "vue-toastification";
    import axios from "@/plugins/axios";

    export default({
        components:{
            profile,
            Card,
            Icon,
            Button
        },
        setup() {
            const router = useRouter();
            const id = router.currentRoute.value.params.id;
            
            let confirmMessageFlag = ref(false);
            const toast = useToast();
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function userRedirect(){
                router.push({ path: '/refresh', query: { urlHeader: 'appointments' } });
            }
            function deleteElement(){
                confirmMessageFlag.value = false;
                axios.delete(`/api/appointments/${ id }`)
                .then(response => {
                    useCachedDataStoreAppointments().refreshData();
                    toast.success("¡Cita eliminado correctamente!", { timeout: 1000 });
                    setTimeout(userRedirect, 1000);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    toast.error("Ha ocurrido un error inesperado.", { timeout: 1000 });
                });
            }
            
            const { appointmentsTable} = useCachedDataStoreAppointments();
            const { participantsTable} = useCachedDataStoreParticipants();
            const { campaignsTable } = useCachedDataStoreCampaigns();
            const { beneficiariesTable} = useCachedDataStoreBeneficiaries();

            let appointmentData = ref(null);
            async function fetchData() {
                await useCachedDataStoreAppointments().fetchData();
                await useCachedDataStoreParticipants().fetchData();
                await useCachedDataStoreCampaigns().fetchData();
                await useCachedDataStoreBeneficiaries().fetchData();
                

                const participantData = participantsTable.map(participant => ({ id: participant.id, name: participant.name }));
                const campaignData = campaignsTable.map(campaign => ({ id: campaign.id, beneficiary: campaign.beneficiary_id }));
                const beneficiaryData = beneficiariesTable.map(beneficiary => ({ id: beneficiary.id, name: beneficiary.name }));

                appointmentsTable.forEach(appointment => {
                    appointment.name = participantData.find(participant => participant.id == appointment.user_id)?.name;
                    const campaign = campaignData.find(campaign => campaign.id == appointment.campaign_id);
                    if (campaign) {
                        appointment.beneficiary = beneficiaryData.find(beneficiary => beneficiary.id == campaign.beneficiary).name;
                    }
                });

                appointmentData.value = appointmentsTable.find(appointment => appointment.id == id);
            }
            fetchData();

            return {
                confirmMessageFlag,
                displayConfirmMessage,
                deleteElement,
                appointmentsTable,
                id,
                appointmentData,
            };
        }
    })
</script>