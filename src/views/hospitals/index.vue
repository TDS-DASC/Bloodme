<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=hospitalsTableParams :tableData=hospitalsTable urlMainHeader="hospitals" />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';
    import { useToast } from "vue-toastification";

    export default{
        components: {
            tableAdvanced,
        },
        setup() {
            const toast = useToast();
            const hospitalsTableParams = {
                title: "Hospitals",
                rows: 5,
                headUrl: "hospitals",
                columns: [
                    {
                        label: "ID",
                        field: "id",
                    },
                    {
                        label: "Nombre",
                        field: "name",
                    },
                    {
                        label: "Address",
                        field: "address",
                    },
                    {
                        label: "Accion",
                        field: "action",
                    },
                ]
            }
            
            let { hospitalsTable } = useCachedDataStoreHospitals();
            useCachedDataStoreHospitals().fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                refreshToast,
                hospitalsTableParams,
                hospitalsTable,
            }
        },
    }
</script>