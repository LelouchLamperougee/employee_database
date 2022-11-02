<template>


    <nav class="navbar navbar-dark bg-dark mb-4 p-3">
            <h1 class="text-white">website</h1>
        <form class="form-switch">
            <router-link :to="{name: 'companies.index'}"><button class="btn btn-outline-info" type="button">Companies</button></router-link>
            <router-link :to="{name: 'employees.index'}"><button class="btn btn-outline-info" type="button">Employees</button></router-link>
        </form>
    </nav>

    <router-view></router-view>


</template>

<script>

export default {
    name: "App",

    components: {
    },

    data() {
        return {
            isSwitch: true

        }
    },
}
</script>

<style scoped>

</style>
