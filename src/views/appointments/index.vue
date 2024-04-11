<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=appointmentsTableParams :tableData=appointmentsTable urlMainHeader="appointments"  />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/appointments/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'appointments' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full" @click="refreshToast()">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreAppointments } from '../../stores/appointmentsStore';
    import { useCachedDataStoreParticipants } from '../../stores/participantsStore';
    import { useCachedDataStoreCampaigns } from '../../stores/campaignsStore';
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useToast } from "vue-toastification";

    export default{
        components: {
            tableAdvanced,
            Button
        },
        setup() {
            const toast = useToast();
            const appointmentsTableParams = {
                title: "Citas",
                rows: 5,
                headUrl: "appointments",
                columns: [
                    {
                        label: "ID",
                        field: "id",
                    },
                    {
                        label: "Donador",
                        field: "name",
                    },
                    {
                        label: "Beneficiario",
                        field: "beneficiary",
                    },
                    {
                        label: "Status",
                        field: "status",
                    },
                    {
                        label: "Date",
                        field: "date",
                    },
                    {
                        label: "Accion",
                        field: "action",
                    },
                ]
            }
            
            const { appointmentsTable} = useCachedDataStoreAppointments();
            const { participantsTable} = useCachedDataStoreParticipants();
            const { campaignsTable } = useCachedDataStoreCampaigns();
            const { beneficiariesTable} = useCachedDataStoreBeneficiaries();

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
                    console.log(campaign)
                    if (campaign) {
                        appointment.beneficiary = beneficiaryData.find(beneficiary => beneficiary.id == campaign.beneficiary).name;
                    }
                });
            }
            fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                refreshToast,
                appointmentsTableParams,
                appointmentsTable,
            }
        },
    }
</script>