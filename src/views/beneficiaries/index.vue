<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=beneficiariesTableParams :tableData=beneficiariesTable />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    export default{
        components: {
            tableAdvanced
        },
        setup() {
            const beneficiariesTableParams = {
                title: "Agentes",
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


            return {
                beneficiariesTableParams,
                beneficiariesTable,
            }
        },
    }
</script>