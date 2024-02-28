<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=appointmentsTableParams :tableData=appointmentsTable />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStore } from '../../stores/usersStore';
    export default{
        components: {
            tableAdvanced
        },
        setup() {
            const appointmentsTableParams = {
                title: "Participantes",
                rows: 5,
                headUrl: "appointments",
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
            const { appointmentsTable} = useCachedDataStore();
            useCachedDataStore().fetchData();


            return {
                appointmentsTableParams,
                appointmentsTable,
            }
        },
    }
</script>