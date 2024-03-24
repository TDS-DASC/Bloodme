<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=hospitalsTableParams :tableData=hospitalsTable />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';
    export default{
        components: {
            tableAdvanced
        },
        setup() {
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
            const { hospitalsTable } = useCachedDataStoreHospitals();
            useCachedDataStoreHospitals().fetchData();


            return {
                hospitalsTableParams,
                hospitalsTable,
            }
        },
    }
</script>