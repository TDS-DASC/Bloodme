<template>
    <div>
        <p>URL Header: {{ urlHeader }}</p>
    </div>
</template>
  
<script>
    import { useRouter } from 'vue-router';
    import { useRoute } from 'vue-router';
    import { useCachedDataStoreHospitals } from '../stores/hospitalsStore';

    export default {
        setup() {
        const router = useRouter();
        const route = useRoute();

        // Access the urlHeader prop using route.query.urlHeader
        const urlHeader = route.query.urlHeader;

        console.log("URL Header:", urlHeader);

        async function userRedirect() {
            await useCachedDataStoreHospitals().refreshData();
            
            router.push(`/${urlHeader}`, { shallow: false });
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