<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=administratorsTableParams :tableData=administratorsTable urlMainHeader="administrators" />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/administrators/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'administrators' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full" @click="refreshToast()">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreAdministrators } from '../../stores/administratorsStore';
    import Button from "@/components/Button";
    import { useToast } from "vue-toastification";
    export default{
        components: {
            tableAdvanced,
            Button
        },
        setup() {
            const administratorsTableParams = {
                title: "Administradores",
                rows: 5,
                headUrl: "administrators",
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
                        label: "Email",
                        field: "email",
                    },
                    {
                        label: "Accion",
                        field: "action",
                    },
                ]
            }
            const { administratorsTable} = useCachedDataStoreAdministrators();
            useCachedDataStoreAdministrators().fetchData();

            const toast = useToast();
            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                refreshToast,
                administratorsTableParams,
                administratorsTable,
            }
        },
    }
</script>