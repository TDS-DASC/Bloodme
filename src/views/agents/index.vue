<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=agentsTableParams :tableData=agentsTable urlMainHeader="agents" />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreAgents } from '../../stores/agentsStore';
    export default{
        components: {
            tableAdvanced
        },
        setup() {
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


            return {
                agentsTableParams,
                agentsTable,
            }
        },
    }
</script>