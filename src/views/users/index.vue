<template>
    <div class="flex flex-col gap-4">
        <router-link :to="{ path: '/users/create' }">

        </router-link>
        <RouterView></RouterView>
        <tableAdvanced :tableInformation=participantsTableParams :tableData=participantsTable />
        <tableAdvanced :tableInformation=agentsTableParams :tableData=agentsTable />
        <tableAdvanced :tableInformation=administratorsTableParams :tableData=administratorsTable />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { ref } from "vue"
    import axios from "@/plugins/axios"
    import { useCachedDataStore } from '../../stores/store';
    export default{
        components: {
            tableAdvanced
        },
        setup() {
            const participantsTableParams = {
                title: "Participantes",
                rows: 5,
                urls: [
                    "users/create",
                ],
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
                        label: "Fecha de nacimiento",
                        field: "birth_date",
                    },
                    {
                        label: "Tipo de sangre",
                        field: "blood_type",
                    },
                    {
                        label: "Accion",
                        field: "action",
                    },
                ]
            }
            const agentsTableParams = {
                title: "Agentes",
                rows: 5,
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
                        label: "Accion",
                        field: "action",
                    },
                ]
            }
            const administratorsTableParams = {
                title: "Administradores",
                rows: 5,
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
                        label: "Accion",
                        field: "action",
                    },
                ]
            }
            const { participantsTable, agentsTable, administratorsTable } = useCachedDataStore();
            useCachedDataStore().fetchData();


            return {
                participantsTableParams,
                participantsTable,
                agentsTable,
                agentsTableParams,
                administratorsTable,
                administratorsTableParams,
            }
        },
    }
</script>
