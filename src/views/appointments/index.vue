<template>
    <div class="flex flex-col gap-4">
        <tableAdvanced :tableInformation=appointmentsTableParams :tableData=appointmentsTable />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/appointments/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'appointments' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full" @click="refreshToast()">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreAppointments } from '../../stores/appointmentsStore';
    import { useToast } from "vue-toastification";

    export default{
        components: {
            tableAdvanced,
            Button
        },
        setup() {
            const toast = useToast();
            const appointmentsTableParams = {
                title: "Citas",
                rows: 5,
                headUrl: "appointments",
                columns: [
                    {
                        label: "ID",
                        field: "id",
                    },
                    {
                        label: "Descripcion",
                        field: "description",
                    },
                    {
                        label: "Accion",
                        field: "action",
                    },
                ]
            }
            const { appointmentsTable} = useCachedDataStoreAppointments();
            useCachedDataStoreAppointments().fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                refreshToast,
                appointmentsTableParams,
                appointmentsTable,
            }
        },
    }
</script>