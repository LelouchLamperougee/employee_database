<template>
    <div class="wrapper">
        <div class="form-group row">

            <label for="inputEmail3" class="col-sm-2 col-form-label">First name</label>
            <div class="col-sm-10">
                <input v-model="first_name" type="text" class="form-control" id="inputEmail3" placeholder="First name">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Last name</label>
            <div class="col-sm-10">
                <input v-model="last_name" type="email" class="form-control" id="inputEmail3" placeholder="Last name">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Date of birth</label>
            <div class="col-sm-10">
                <input v-model="date_of_birth" type="date" class="form-control" id="inputEmail3"
                       placeholder="Date of birth">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">passport</label>
            <div class="col-sm-10">
                <input v-model="passport" type="email" class="form-control" id="inputEmail3" placeholder="Passport">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Post</label>
            <div class="col-sm-10">
                <input v-model="post" type="email" class="form-control" id="inputEmail3" placeholder="Post">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Work experience</label>
            <div class="col-sm-10">
                <input v-model="work_experience" type="email" class="form-control" id="inputEmail3"
                       placeholder="Work experience">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Salary</label>
            <div class="col-sm-10">
                <input v-model="salary" type="email" class="form-control" id="inputEmail3" placeholder="Salary">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input v-model="description" type="text" class="form-control" id="inputEmail3" placeholder="Description">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Company</label>
            <div class="col-sm-10">

                <select v-model="company_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option v-for="company in companies" :value="company.id">
                        {{ company.name }}
                    </option>
                </select>

            </div>

            <div>
                <button @click.prevent="createEmployee" class="btn btn-primary" type="submit">create</button>
            </div>
        </div>
    </div>

</template>

<script>
import axios from "axios";
import router from "../../js/router";

export default {
    name: "EmployeeComponent",

    mounted() {
        this.getCompany()
    },

    data() {
        return {
            first_name: "",
            last_name: "",
            date_of_birth: null,
            passport: null,
            post: "",
            work_experience: null,
            salary: null,
            description: "",
            company_id: null,

            companies: [],
        }
    },

    methods: {
        createEmployee() {
            axios.post('/api/employee', {
                first_name: this.first_name,
                last_name: this.last_name,
                date_of_birth: this.date_of_birth,
                passport: this.passport,
                post: this.post,
                work_experience: this.work_experience,
                salary: this.salary,
                description: this.description,
                company_id: this.company_id
            })
                .then(response => {
                    this.first_name = ""
                    this.last_name = ""
                    this.date_of_birth = null
                    this.passport = null
                    this.post = ""
                    this.work_experience = null
                    this.salary = null
                    this.description = ""
                    this.company_id = null
                    router.push({name: 'employees.index'})
                })

        },

        getCompany() {
            axios.get('/api/helper')
                .then(response => {
                    this.companies = response.data
                    console.log(response.data);
                })
        }
    }

}
</script>

<style scoped>

</style>
