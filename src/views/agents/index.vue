<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=agentsTableParams :tableData=agentsTable />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useAgentsStore } from '../../stores/agentsStore';
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
                        label: "Alias",
                        field: "alias",
                    },
                    {
                        label: "Email",
                        field: "email",
                    },
                    {
                        label: "Phone",
                        field: "phone_number",
                    },
                    {
                        label: "Accion",
                        field: "action",
                    },
                ]
            }
            const { agentsTable} = useAgentsStore();
            useAgentsStore().fetchData();


            return {
                agentsTableParams,
                agentsTable,
            }
        },
    }
</script>