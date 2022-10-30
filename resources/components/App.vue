<template>
    <create-company></create-company>
    <create-employee></create-employee>
</template>

<script>
import CreateCompany from "./company/CreateCompany.vue";
import CreateEmployee from "./employee/CreateEmployee.vue";
export default {
    name: "App",

    components:{
        CreateCompany,
        CreateEmployee
    }
}
</script>

<style scoped>

</style>
