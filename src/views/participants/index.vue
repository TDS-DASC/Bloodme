<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=participantsTableParams :tableData=participantsTable urlMainHeader="participants" />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreParticipants } from '../../stores/participantsStore';
    import { useToast } from "vue-toastification";
    export default{
        components: {
            tableAdvanced,
        },
        setup() {
            const toast = useToast();
            const participantsTableParams = {
                title: "Participantes",
                rows: 5,
                headUrl: "participants",
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
            const { participantsTable} = useCachedDataStoreParticipants();
            useCachedDataStoreParticipants().fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }


            return {
                participantsTableParams,
                participantsTable,
                refreshToast
            }
        },
    }
</script>