<template>
    <tr :class="this.$parent.isEdit(employee.id) ? 'd-none' : ''">
        <td>{{ employee.id }}</td>
        <td>{{ employee.first_name }}</td>
        <td>{{ employee.last_name }}</td>
        <td>{{ employee.date_of_birth }}</td>
        <td>{{ employee.passport }}</td>
        <td>{{ employee.post }}</td>
        <td>{{ employee.work_experience }} year</td>
        <td>{{ employee.salary }}$</td>
        <td>{{employee.company.name}}</td>
        <td class="text-center"><a href="#">
            <button @click.prevent="changeEditEmployeeId(employee.id, employee.first_name, employee.last_name, employee.date_of_birth, employee.passport, employee.post, employee.work_experience, employee.salary, employee.company_id)" class="btn btn-success">edit</button>
        </a></td>
        <td class="text-center"><a href="#">
            <button @click.prevent="destroy(employee.id)" class="btn btn-danger">delete</button>
        </a></td>
    </tr>
</template>

<script>
import axios from "axios";

export default {
    name: "ShowEmployee",

    props:['employee', 'companies'],

    methods:{
        changeEditEmployeeId(id, first_name, last_name, date_of_birth, passport, post, work_experience, salary, company_id) {
            this.$parent.editEmployeeId = id
            let editEmployeeName = `editEmployee_${id}`
            let editFullEmployeeName = this.$parent.$refs[editEmployeeName][0]
            editFullEmployeeName.first_name = first_name
            editFullEmployeeName.last_name = last_name
            editFullEmployeeName.date_of_birth = date_of_birth
            editFullEmployeeName.passport = passport
            editFullEmployeeName.post = post
            editFullEmployeeName.work_experience = work_experience
            editFullEmployeeName.salary = salary
            editFullEmployeeName.company_id = company_id
            console.log(editFullEmployeeName);
        },

        destroy(id) {
            axios.delete(`/api/employee/${id}`)
                .then(response => {
                    this.$parent.getEmployees()
                })
        }
    }
}
</script>

<style scoped>

</style>
