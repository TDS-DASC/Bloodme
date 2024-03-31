<template>
    <div class="flex flex-col gap-4 p-2">
        <tableAdvanced :tableInformation=campaignsTableParams :tableData=campaignsTable urlMainHeader="hospitals" />
        <div class="flex gap-3 w-1/4">
            <router-link 
                to="/campaigns/create" class="w-full">
                <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full">Crear</Button>
            </router-link>
            <router-link :to="{ path: '/refresh', query: { urlHeader: 'campaigns' } }" class="w-full">
                <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full" @click="refreshToast()">Refrescar</Button>
            </router-link>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";   
    import tableAdvanced from "../../components/Table/advanced"
    import { useCachedDataStoreCampaigns } from '../../stores/campaignsStore';
    import { useToast } from "vue-toastification";

    export default{
        components: {
            tableAdvanced,
            Button
        },
        setup() {
            const toast = useToast();
            const campaignsTableParams = {
                title: "Campañas",
                rows: 5,
                urls: [
                    "campaigns/edit",
                ],
                columns: [
                    {
                        label: "ID",
                        field: "id",
                    },
                    {
                        label: "Bolsas recolectadas",
                        field: "recollected_bags",
                    },
                    {
                        label: "Blosas requeridas",
                        field: "required_bags",
                    },
                    {
                        label: "Plaquetas requeridas",
                        field: "required_platelets",
                    },
                    {
                        label: "action",
                        field: "action",
                    },
                ]
            }

            let { campaignsTable } = useCachedDataStoreCampaigns();
            useCachedDataStoreCampaigns().fetchData();

            function refreshToast(){
                toast.warning("Refrescando la tabla.", { timeout: 1000 });
            }

            return {
                refreshToast,
                campaignsTableParams,
                campaignsTable,
            }

            return {
                campaignsTableParams,
            }
        },
    }
</script>
