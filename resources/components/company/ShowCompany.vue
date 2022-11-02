<template>
    <tr :class="this.$parent.isEdit(company.id) ? 'd-none' : ''">
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
</template>

<script>
import axios from "axios";

export default {
    name: "ShowCompany",

    props:['company'],

    methods:{
        changeEditCompanyId(id, name, budget, ceo) {

            this.$parent.editCompanyId = id
            let editCompanyName = `editCompany_${id}`
            let editFullCompanyName = this.$parent.$refs[editCompanyName][0]
            console.log(editCompanyName);
            editFullCompanyName.name = name
            editFullCompanyName.budget = budget
            editFullCompanyName.ceo = ceo
        },

        destroy(id){

            axios.delete(`/api/company/${id}`)
                .then(response =>{
                    this.$parent.getCompanies()
                })
        },
    }
}
</script>

<style scoped>

</style>
