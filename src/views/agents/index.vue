<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=agentsTableParams :tableData=agentsTable urlMainHeader="agents" />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/agents/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'agents' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full" @click="refreshToast()">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import Button from "@/components/Button";
    import { useCachedDataStoreAgents } from '../../stores/agentsStore';
    import { useToast } from "vue-toastification";

    export default{
        components: {
            tableAdvanced,
            Button
        },
        setup() {
            const toast = useToast();
            const agentsTableParams = {
                title: "Agentes",
                rows: 5,
                headUrl: "agents",
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
            const { agentsTable} = useCachedDataStoreAgents();
            useCachedDataStoreAgents().fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                agentsTableParams,
                agentsTable,
                refreshToast
            }
        },
    }
</script>