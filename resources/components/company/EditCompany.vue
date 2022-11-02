<template>
    <tr :class="this.$parent.isEdit(company.id) ? '' : 'd-none'">
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

<script>
import axios from "axios";

export default {
    name: "EditCompany",

    data(){
        return{
            name: "",
            budget: null,
            ceo: ""
        }
    },

    props:[
        'company'
    ],

    methods:{
        updateCompany(id) {
            axios.patch(`/api/company/${id}`, {name: this.name, budget: this.budget, ceo: this.ceo})
                .then(response => {
                    this.$parent.getCompanies()
                    console.log(response.data);
                })
            this.$parent.editCompanyId = null
        },

        cancel(){
            this.$parent.editCompanyId = null
        }
    }
}
</script>

<style scoped>

</style>
