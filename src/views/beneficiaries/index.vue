<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=beneficiariesTableParams :tableData=beneficiariesTable urlMainHeader="beneficiaries" />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useToast } from "vue-toastification";
    export default{
        components: {
            tableAdvanced,
        },
        setup() {
            const toast = useToast();
            const beneficiariesTableParams = {
                title: "Beneficiarios",
                rows: 5,
                headUrl: "beneficiaries",
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
            const { beneficiariesTable } = useCachedDataStoreBeneficiaries();
            useCachedDataStoreBeneficiaries().fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                refreshToast,
                beneficiariesTableParams,
                beneficiariesTable,
            }
        },
    }
</script>