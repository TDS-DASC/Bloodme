<template>
    <div>
        <p>Cargando...</p>
    </div>
</template>
  
<script>
    import { useRouter } from 'vue-router';
    import { useRoute } from 'vue-router';
    import { useCachedDataStoreHospitals } from '../stores/hospitalsStore';
    import { useCachedDataStoreBeneficiaries } from '../stores/beneficiariesStore';
    import { useCachedDataStoreCampaigns } from '../stores/campaignsStore';
    import { useCachedDataStoreAgents } from '../stores/agentsStore';
    import { useCachedDataStoreAppointments } from '../stores/appointmentsStore';
    import { useCachedDataStoreParticipants } from '../stores/participantsStore';
    import { useCachedDataStoreAdministrators } from '../stores/administratorsStore';

    export default {
        setup() {
            const router = useRouter();
            const route = useRoute();

            const urlHeader = route.query.urlHeader;

            function routerPush(){
                router.push(`/${urlHeader}`, { shallow: false });
            }

            async function userRedirect() {
                if(urlHeader == "hospitals"){
                    /* console.log("Hospitals"); */
                    await useCachedDataStoreHospitals().refreshData();
                }
                
                if(urlHeader == "beneficiaries"){
                    /* console.log("Beneficiaries"); */
                    await useCachedDataStoreBeneficiaries().refreshData();
                }

                if(urlHeader == "campaigns"){
                    /* console.log("Campaigns"); */
                    await useCachedDataStoreCampaigns().refreshData();
                }

                if(urlHeader == "agents"){
                    /* console.log("Agents"); */
                    await useCachedDataStoreAgents().refreshData();
                }

                if(urlHeader == "appointments"){
                    /* console.log("appointments"); */
                    await useCachedDataStoreAppointments().refreshData();
                }

                if(urlHeader == "participants"){
                    /* console.log("participants"); */
                    await useCachedDataStoreParticipants().refreshData();
                }
                
                if(urlHeader == "administrators"){
                    /* console.log("administrators"); */
                    await useCachedDataStoreAdministrators().refreshData();
                }
                
                routerPush();
            }

            if (urlHeader) {
                userRedirect();
            }
            else{
                router.push(`/home`, { shallow: false });
            }

            return {
                userRedirect
            };
        }
    };
</script>