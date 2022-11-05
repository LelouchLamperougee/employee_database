<template>
    <div>
        <router-link :to="{name: 'employees.create'}"><button class="btn btn-dark mb-4">add employee</button></router-link>
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

                <show-employee :employee="employee" :companies="companies"></show-employee>
                <edit-employee :employee="employee" :companies="companies"
                               :ref="`editEmployee_${employee.id}`"></edit-employee>
            </template>


            </tbody>
        </table>
    </div>


</template>

<script>
import axios from "axios";
import EditEmployee from "./EditEmployee.vue";
import ShowEmployee from "./ShowEmployee.vue";

export default {
    name: "IndexEmployee",

    components: {
        ShowEmployee,
        EditEmployee
    },

    data() {
        return {
            employees: [],
            companies: [],
            editEmployeeId: null,

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
                    console.log(response);
                })
        },



        isEdit(id) {
            return this.editEmployeeId === id
        },

        getCompany() {

            axios.get('/api/helper')
                .then(response => {
                    this.companies = response.data
                })
        },


    }
}
</script>

<style scoped>
input {
    max-width: 5em;
}

select {
    max-height: 2em;
    max-width: 8em;
    text-align: center;
}
</style>
