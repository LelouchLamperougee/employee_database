<template>
    <div class="form-group row wrapper">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input v-model="name" type="email" class="form-control" id="inputEmail3" placeholder="Name">
        </div>

        <label for="inputEmail3" class="col-sm-2 col-form-label">Budget</label>
        <div class="col-sm-10">
            <input v-model="budget" type="email" class="form-control" id="inputEmail3" placeholder="Budget">
        </div>

        <label for="inputEmail3" class="col-sm-2 col-form-label">CEO</label>
        <div class="col-sm-10">
            <input v-model="ceo" type="email" class="form-control" id="inputEmail3" placeholder="ceo">
        </div>

        <div>
            <button @click.prevent="createCompany" class="btn btn-primary" type="submit">create</button>
        </div>
    </div>
</template>

<script>

import axios from "axios";
export default {
    name: "CreateCompany",

    data() {
        return {
            name: '',
            budget: null,
            ceo: '',
        }
    },

    methods:{
        createCompany(){
            axios.post('/api/company', {name: this.name, budget: this.budget, ceo: this.ceo})
                .then(response =>{
                    this.name = ""
                    this.budget = null
                    this.ceo = ""
                    this.$parent.$refs.indexCompany.getCompanies()
                })
        }
    }
}
</script>

<style scoped>

</style>
