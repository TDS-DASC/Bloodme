<template>
    <div class="flex flex-col gap-4 p-2">
        <tableAdvanced :tableInformation=tableParams />
        <tableAdvanced :tableInformation=secondTableParams />
    </div>
</template>

<script>
    import tableAdvanced from "../../components/table/advanced/Advanced.vue"
    import { ref } from "vue"
    export default{
        components: {
            tableAdvanced
        },
        setup() {
            const tableParams = {
                title: "Usuarios",
                rows: 5,
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
                        label: "Alias",
                        field: "quantity",
                    },
                    {
                        label: "Email",
                        field: "amount",
                    },
                    {
                        label: "Fecha de nacimiento",
                        field: "text",
                    },
                    {
                        label: "Tipo de sangre",
                        field: "text",
                    },
                    {
                        label: "Accion",
                        field: "action",
                    },
                ]
            }

            const secondTableParams = {
                title: "Administradores",
                rows: 5,
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
                        label: "Alias",
                        field: "quantity",
                    },
                    {
                        label: "Email",
                        field: "amount",
                    },
                    {
                        label: "Accion",
                        field: "action",
                    },
                ]
            }

            return {
                tableParams,
                secondTableParams
            }
        },
    }
</script>
