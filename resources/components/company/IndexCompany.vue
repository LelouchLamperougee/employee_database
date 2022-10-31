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

        <tr v-for="company in companies">
            <td>{{company.id}}</td>
            <td>{{company.name}}</td>
            <td>{{company.budget}}$</td>
            <td>{{company.ceo}}</td>
            <td class="text-center"><a href="#"><button class="btn btn-success">show</button></a></td>
            <td class="text-center"><a href="#"><button class="btn btn-danger">delete</button></a></td>
        </tr>

        </tbody>
    </table>

</template>

<script>
import axios from "axios";
export default {
    name: "IndexCompany",

    data(){
        return{
            companies: []
        }
    },

    mounted() {
        this.getCompanies()
    },

    methods:{
        getCompanies(){
            axios.get('/api/company')
                .then(response =>{
                    this.companies = response.data
                })
        },

    }
}
</script>

<style scoped>

</style>
