<template>
    <div class="flex flex-col gap-4 p-2">
        <!-- <tableAdvanced :tableInformation=tableParams /> -->
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
                columns: {
                    first: "ID",
                    second: "name",
                    third: "alias",
                    fourth: "blood_type",
                    fifth: "sex",
                    sixth: "curp",
                    seventh: "email",
                    eighth: "phone"
                }
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
                        label: "name",
                        field: "customer",
                    },
                    {
                        label: "alias",
                        field: "quantity",
                    },
                    {
                        label: "email",
                        field: "amount",
                    },
                    {
                        label: "action",
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
