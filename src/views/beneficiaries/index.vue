<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=beneficiariesTableParams :tableData=beneficiariesTable urlMainHeader="beneficiaries" />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/beneficiaries/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'beneficiaries' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full" @click="refreshToast()">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useToast } from "vue-toastification";
    export default{
        components: {
            tableAdvanced,
            Button
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