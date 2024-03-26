<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=hospitalsTableParams :tableData=hospitalsTable />
        <router-link 
            to="/hospitals/create">
            <Button type="submit" text="Crear" btnClass="btn-primary" class="w-1/12">Crear</Button>
        </router-link>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';
    export default{
        components: {
            tableAdvanced,
            Button
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