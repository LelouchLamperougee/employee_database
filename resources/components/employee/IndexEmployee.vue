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
        <template v-for="employee in employees">
            <tr>
                <td>{{ employee.id }}</td>
                <td>{{ employee.first_name }}</td>
                <td>{{ employee.last_name }}</td>
                <td>{{ employee.date_of_birth }}</td>
                <td>{{ employee.passport }}</td>
                <td>{{ employee.post }}</td>
                <td>{{ employee.work_experience }} year</td>
                <td>{{ employee.salary }}</td>
                <td>{{ employee.company_id }}</td>
                <td class="text-center"><a href="#">
                    <button @click.prevent="changeEditEmployeeId(employee.id, employee.first_name, employee.last_name, employee.date_of_birth, employee.passport, employee.post, employee.work_experience, employee.salary, employee.company_id)" class="btn btn-success">edit</button>
                </a></td>
                <td class="text-center"><a href="#">
                    <button @click.prevent="destroy(employee.id)" class="btn btn-danger">delete</button>
                </a></td>
            </tr>

            <tr :class="isEdit(employee.id) ? '' : 'd-none'">
                <td></td>
                <td><input v-model="first_name" type="text"></td>
                <td><input v-model="last_name" type="text"></td>
                <td><input v-model="date_of_birth" type="date"></td>
                <td><input v-model="passport" type="text"></td>
                <td><input v-model="post" type="text"></td>
                <td><input v-model="work_experience" type="text"></td>
                <td><input v-model="salary" type="text"></td>
                <td>
                    <select v-model="company_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option v-for="company in companies" :value="company_id">
                           {{company.name}}
                        </option>
                    </select>
                </td>

                <td><a href="#">
                    <button @click.prevent="updateEmployee(employee.id)" class="btn btn-success">update</button>
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
    name: "IndexEmployee",

    data() {
        return {
            employees: [],
            companies: [],
            editEmployeeId: null,

            first_name: "",
            last_name: "",
            date_of_birth: null,
            passport: null,
            post: "",
            work_experience: null,
            salary: null,
            description: "",
            company_id: null,
        }
    },

    mounted() {
        this.getEmployees()
        this.getCompany()
    },

    methods: {
        getEmployees() {
            axios.get('/api/employee')
                .then(response => {
                    this.employees = response.data
                })
        },

        changeEditEmployeeId(id, first_name, last_name, date_of_birth, passport, post, work_experience, salary, company_id){
            this.first_name = first_name
            this.last_name = last_name
            this.date_of_birth = date_of_birth
            this.passport = passport
            this.post = post
            this.work_experience = work_experience
            this.salary = salary
            this.company_id = company_id
            this.editEmployeeId = id
            console.log(company_id);
        },

        isEdit(id) {
            return this.editEmployeeId === id
        },

        updateEmployee(id){
            this.editEmployeeId = null
            axios.patch(`/api/employee/${id}`, {
                first_name: this.first_name,
                last_name: this.last_name,
                date_of_birth: this.date_of_birth,
                passport: this.passport,
                post: this.post,
                work_experience: this.work_experience,
                salary: this.salary,
                company_id: this.company_id
            }).then(response => {
                this.getEmployees()
            })
        },

        cancel(){
            this.editEmployeeId = null
        },


        getCompany() {

            axios.get('/api/helper')
                .then(response => {
                    this.companies = response.data
                })
        },

        destroy(id){
            axios.delete(`/api/employee/${id}`)
                .then(response=>{
                    this.getEmployees()
                })
        }

    }
}
</script>

<style scoped>
    input{
        max-width: 5em;
    }

    select{
        max-height: 2em;
        max-width: 8em;
        text-align: center;
    }
</style>
