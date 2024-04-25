<template>
    <div class="flex flex-col gap-4 p-2">
        <tableAdvanced :tableInformation=campaignsTableParams :tableData=campaignsTable urlMainHeader="campaigns" />
        <div v-if="loadingFlag" class="fixed w-3/4 h-screen flex flex-col justify-center items-center bg-white bg-opacity-0 z-10">
            <div class="bg-white flex flex-col justify-center align-middle items-center p-10 rounded-md border-2 border-gray-300">
                <p class="font-bold text-4xl mb-4">Cargando</p>
                <div class="w-24 h-24">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-dasharray="15" stroke-dashoffset="15" stroke-linecap="round" stroke-width="2" d="M12 3C16.9706 3 21 7.02944 21 12">
                        <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/>
                        <animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/>
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreCampaigns } from '../../stores/campaignsStore';
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useToast } from "vue-toastification";
    import { ref } from "vue";

    export default{
        components: {
            tableAdvanced,
        },
        setup() {
            const toast = useToast();
            const campaignsTableParams = {
                title: "Campañas",
                rows: 10,
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

            let loadingFlag = ref(true);
            async function fetchData() {
                await useCachedDataStoreCampaigns().fetchData();
                await useCachedDataStoreBeneficiaries().fetchData();
                
                const campaignData = campaignsTable.map(campaign => ({ id: campaign.id, beneficiary: campaign.beneficiary_id }));
                const beneficiaryData = beneficiariesTable.map(beneficiary => ({ id: beneficiary.id, name: beneficiary.name }));

                campaignsTable.forEach(campaign => {
                    const beneficiary = beneficiaryData.find(beneficiary => beneficiary.id == campaign.beneficiary_id);
                    if (beneficiary) {
                        campaign.beneficiary_name = beneficiary.name;
                    } else {
                        campaign.beneficiary_name = "No se encontró el beneficiario";
                    }
                });
                loadingFlag.value = false;
            }
            fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                refreshToast,
                campaignsTableParams,
                campaignsTable,
                loadingFlag
            }
        },
    }
</script>
