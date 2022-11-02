<template>

    <div>

        <router-link :to="{name: 'companies.create'}"><button class="btn btn-dark mb-4">add company</button></router-link>

        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>name</th>
                <th>budget</th>
                <th>ceo</th>
                <th colspan="2" class="text-center">operations</th>
            </tr>

            </thead>
            <tbody>
            <template v-for="company in companies">
                <show-company :company="company"></show-company>
                <edit-company :company="company" :ref="`editCompany_${company.id}`"></edit-company>
            </template>
            </tbody>
        </table>
    </div>


</template>

<script>
import axios from "axios";
import EditCompany from "./EditCompany.vue";
import ShowCompany from "./ShowCompany.vue";

export default {
    name: "IndexCompany",

    components: {EditCompany, ShowCompany,},

    data() {
        return {
            companies: [],
            editCompanyId: null,

        }
    },

    mounted() {
        this.getCompanies()
    },

    methods: {
        getCompanies() {
            axios.get('/api/company')
                .then(response => {
                    this.companies = response.data
                })
        },


        isEdit(id) {
            return this.editCompanyId === id
        },


    }
}
</script>

<style scoped>

</style>
