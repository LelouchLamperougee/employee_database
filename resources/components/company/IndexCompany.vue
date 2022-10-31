<template>
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
            <tr>
                <td>{{ company.id }}</td>
                <td>{{ company.name }}</td>
                <td>{{ company.budget }}$</td>
                <td>{{ company.ceo }}</td>
                <td class="text-center"><a href="#">
                    <button @click.prevent="changeEditCompanyId(company.id, company.name, company.budget, company.ceo)"
                            class="btn btn-success">edit
                    </button>
                </a></td>
                <td class="text-center"><a href="#">
                    <button @click.prevent="destroy(company.id)" class="btn btn-danger">delete</button>
                </a></td>
            </tr>

            <tr :class="isEdit(company.id) ? '' : 'd-none'">
                <td>{{ company.id }}</td>
                <td><input v-model="name" type="text"></td>
                <td><input v-model="budget" type="text"></td>
                <td><input v-model="ceo" type="text"></td>

                <td><a href="#">
                    <button @click.prevent="updateCompany(company.id)" class="btn btn-success">update</button>
                </a></td>

                <td><a href="#">
                    <button @click.prevent="cancel" class="btn btn-danger">cancel</button>
                </a></td>
            </tr>
        </template>


        </tbody>
    </table>

</template>

<script>
import axios from "axios";

export default {
    name: "IndexCompany",

    components: {},

    data() {
        return {
            companies: [],
            editCompanyId: null,
            name: "",
            budget: null,
            ceo: ""
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

        updateCompany(id) {
            axios.patch(`/api/company/${id}`, {name: this.name, budget: this.budget, ceo: this.ceo})
                .then(response => {
                    this.getCompanies()
                    console.log(response.data);
                })
            this.editCompanyId = null
        },

        changeEditCompanyId(id, name, budget, ceo) {
            this.editCompanyId = id
            this.name = name
            this.budget = budget
            this.ceo = ceo
        },

        isEdit(id) {
            return this.editCompanyId === id
        },

        destroy(id){
            console.log('info');
            console.log(this.name, this.budget, this.ceo);
            axios.delete(`/api/company/${id}`)
                .then(response =>{
                    console.log(response.data);
                    this.getCompanies()
                })
        },

        cancel(){
            this.editCompanyId = null
        }
    }
}
</script>

<style scoped>

</style>
