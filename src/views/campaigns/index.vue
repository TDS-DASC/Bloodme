<template>
    <div class="flex flex-col gap-4 p-2">
        <tableAdvanced :tableInformation=campaignsTableParams :tableData=campaignsTable urlMainHeader="campaigns" />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreCampaigns } from '../../stores/campaignsStore';
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useToast } from "vue-toastification";

    export default{
        components: {
            tableAdvanced,
        },
        setup() {
            const toast = useToast();
            const campaignsTableParams = {
                title: "Campañas",
                rows: 5,
                headUrl: "campaigns",
                columns: [
                    {
                        label: "ID",
                        field: "id",
                    },
                    {
                        label: "Beneficiario",
                        field: "beneficiary_name",
                    },
                    {
                        label: "Bolsas recolectadas",
                        field: "recollected_bags",
                    },
                    {
                        label: "Blosas requeridas",
                        field: "required_bags",
                    },
                    {
                        label: "Plaquetas requeridas",
                        field: "required_platelets",
                    },
                    {
                        label: "action",
                        field: "action",
                    },
                ]
            }

            const { campaignsTable} = useCachedDataStoreCampaigns();
            const { beneficiariesTable } = useCachedDataStoreBeneficiaries();

            async function fetchData() {
                await useCachedDataStoreCampaigns().fetchData();
                await useCachedDataStoreBeneficiaries().fetchData();
                
                const campaignData = campaignsTable.map(campaign => ({ id: campaign.id, beneficiary: campaign.beneficiary_id }));
                const beneficiaryData = beneficiariesTable.map(participant => ({ id: participant.id, name: participant.name }));

                campaignsTable.forEach(campaign => {
                    campaign.beneficiary_name = beneficiaryData.find(beneficiary => beneficiary.id == campaign.beneficiary_id).name;
                });
            }
            fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                refreshToast,
                campaignsTableParams,
                campaignsTable,
            }

            return {
                campaignsTableParams,
            }
        },
    }
</script>
