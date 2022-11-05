<template>
    <tr :class="this.$parent.isEdit(employee.id) ? '' : 'd-none'">
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
            <button :disabled="!isDisabled" @click.prevent="updateEmployee(employee.id)" class="btn btn-success">update</button>
        </a></td>

        <td><a href="#">
            <button @click.prevent="cancel" class="btn btn-danger">cancel</button>
        </a></td>
    </tr>
</template>

<script>
import axios from "axios";

export default {
    name: "EditEmployee",

    props:[
        'employee',
        'companies'
    ],

    data(){
        return{
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

    methods: {
        updateEmployee(id) {
            this.$parent.editEmployeeId = null
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
                this.$parent.getEmployees()
            })
        },


        cancel() {
            this.$parent.editEmployeeId = null
        },

    },

        computed: {
            isDisabled() {
                return this.first_name && this.last_name && this.date_of_birth && this.passport && this.post && this.work_experience && this.salary && this.company_id;
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
