<template>
    
</template>

<script>
    import Icon from "@/components/Icon";
    import Campaigns from "./Campaigns";
    import Beneficiaries from "./Beneficiaries";
    export default{

        components: {
            Icon,
            Beneficiaries,
            Campaigns
        },
        setup() {
            console.log("This is my modal component");
        }
    }
</script>