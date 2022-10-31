<template>


    <index-company></index-company>
    <index-employee></index-employee>
    <create-company></create-company>
    <create-employee></create-employee>

</template>

<script>
import CreateCompany from "./company/CreateCompany.vue";
import CreateEmployee from "./employee/CreateEmployee.vue";
import IndexEmployee from "./employee/IndexEmployee.vue";
import IndexCompany from "./company/IndexCompany.vue";


export default {
    name: "App",

    components: {
        CreateCompany,
        CreateEmployee,
        IndexEmployee,
        IndexCompany,

    }
}
</script>

<style scoped>

</style>
