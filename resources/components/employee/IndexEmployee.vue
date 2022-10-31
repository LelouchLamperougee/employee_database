<template>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>first name</th>
            <th>last name</th>
            <th>date of birth</th>
            <th>passport</th>
            <th>post</th>
            <th>work experience</th>
            <th>salary</th>
            <th>company</th>
            <th colspan="2" class="text-center">operations</th>
        </tr>

        </thead>
        <tbody>

        <tr v-for="employee in employees">
            <td>{{employee.id}}</td>
            <td>{{employee.first_name}}</td>
            <td>{{employee.last_name}}</td>
            <td>{{employee.date_of_birth}}</td>
            <td>{{employee.passport}}</td>
            <td>{{employee.post}}</td>
            <td>{{employee.work_experience}} year</td>
            <td>{{employee.salary}}</td>
            <td>{{employee.company_id}}</td>
            <td class="text-center"><a href="#"><button class="btn btn-success">show</button></a></td>
            <td class="text-center"><a href="#"><button class="btn btn-danger">delete</button></a></td>
        </tr>

        </tbody>
    </table>

</template>

<script>
import axios from "axios";
export default {
    name: "IndexEmployee",

    data(){
        return{
            employees: [],

        }
    },

    mounted() {
        this.getEmployees()
    },

    methods:{
        getEmployees(){
            axios.get('/api/employee')
                .then(response =>{
                    this.employees = response.data
                })
        },
    }
}
</script>

<style scoped>

</style>
