<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=hospitalsTableParams :tableData=hospitalsTable urlMainHeader="hospitals" />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/hospitals/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'hospitals' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full" @click="refreshToast()">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';
    import { useToast } from "vue-toastification";

    export default{
        components: {
            tableAdvanced,
            Button
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