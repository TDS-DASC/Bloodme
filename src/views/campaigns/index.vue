<template>
    <p>ep</p>
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
                title: "Campaigns",
                columns: {
                    first: "ID",
                    second: "",
                }
            }

            return {
                tableParams
            }
        },
    }
</script>
