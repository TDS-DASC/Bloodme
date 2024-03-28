<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=hospitalsTableParams :tableData=hospitalsTable />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/hospitals/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'hospitals' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-dark" class="w-full">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';
    import router from '../../router';

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
            
            let { hospitalsTable } = useCachedDataStoreHospitals();
            useCachedDataStoreHospitals().fetchData();

            return {
                hospitalsTableParams,
                hospitalsTable,
            }
        },
    }
</script>