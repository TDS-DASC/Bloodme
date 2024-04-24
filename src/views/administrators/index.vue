<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=administratorsTableParams :tableData=administratorsTable urlMainHeader="administrators" />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreAdministrators } from '../../stores/administratorsStore';
    import { useToast } from "vue-toastification";
    export default{
        components: {
            tableAdvanced,
        },
        setup() {
            const administratorsTableParams = {
                title: "Administradores",
                rows: 10,
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