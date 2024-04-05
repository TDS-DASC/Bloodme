<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=participantsTableParams :tableData=participantsTable urlMainHeader="participants" />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/participants/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'participants' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full" @click="refreshToast()">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreParticipants } from '../../stores/participantsStore';
    import Button from "@/components/Button";
    import { useToast } from "vue-toastification";
    export default{
        components: {
            tableAdvanced,
            Button
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