<template>
    <div class="flex flex-col gap-4">
        <router-link :to="{ path: '/users/create' }">

        </router-link>
        <RouterView></RouterView>
        <tableAdvanced :tableInformation=participantsTableParams :tableData=participantsTable />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { ref } from "vue"
    import axios from "@/plugins/axios"
    import { useCachedDataStore } from '../../stores/usersStore';
    export default{
        components: {
            tableAdvanced
        },
        setup() {
            const participantsTableParams = {
                title: "Participantes",
                rows: 5,
                headUrl: "users",
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
            const { participantsTable} = useCachedDataStore();
            useCachedDataStore().fetchData();


            return {
                participantsTableParams,
                participantsTable,
            }
        },
    }
</script>
../../stores/usersStore