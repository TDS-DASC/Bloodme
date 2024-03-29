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

    export default {
        setup() {
        const router = useRouter();
        const route = useRoute();

        // Access the urlHeader prop using route.query.urlHeader
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
            
            routerPush();
        }

        if (urlHeader) {
            // Call userRedirect immediately if urlHeader is present
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