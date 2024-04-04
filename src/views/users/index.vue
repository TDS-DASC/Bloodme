<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=usersTableParams :tableData=usersTable />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreUsers } from '../../stores/usersStore';
    export default{
        components: {
            tableAdvanced
        },
        setup() {
            const usersTableParams = {
                title: "Usuarios",
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
            const { usersTable} = useCachedDataStoreUsers();
            useCachedDataStoreUsers().fetchData();


            return {
                usersTableParams,
                usersTable,
            }
        },
    }
</script>