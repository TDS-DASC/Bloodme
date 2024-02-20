<template>
    <div class="flex flex-col gap-4 p-2">
        <tableAdvanced :tableInformation=tableParams />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/table/advanced/Advanced.vue"

    export default{
        components: {
            tableAdvanced
        },
        setup() {
            const tableParams = {
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
                        label: "Nombre",
                        field: "customer",
                    },
                    {
                        label: "Direccion",
                        field: "quantity",
                    },
                    {
                        label: "Hora de atención",
                        field: "text",
                    },
                    {
                        label: "action",
                        field: "action",
                    },
                ]
            }

            return {
                tableParams,
            }
        },
    }
</script>
