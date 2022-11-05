<template>
    <div class="wrapper">
        <div class="form-group row">

            <span class="fields-warning-text">All fields must be filled!</span>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input v-model="name" type="email" class="form-control" id="inputEmail3" placeholder="Name must contain between 3 and 25 letters">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">Budget</label>
            <div class="col-sm-10">
                <input v-model="budget" type="email" class="form-control" id="inputEmail3" placeholder="Budget must be over $1000">
            </div>

            <label for="inputEmail3" class="col-sm-2 col-form-label">CEO</label>
            <div class="col-sm-10">
                <input v-model="ceo" type="email" class="form-control" id="inputEmail3" placeholder="ceo must contain between 3 and 35 letters">
            </div>

            <div>
                <button :disabled="!isDisabled" @click.prevent="createCompany" class="btn btn-primary" type="submit">
                    create
                </button>
            </div>
        </div>
    </div>


</template>

<script>

import axios from "axios";
import router from "../../js/router";

export default {
    name: "CreateCompany",

    data() {
        return {
            name: '',
            budget: null,
            ceo: '',
        }
    },

    methods: {
        createCompany() {
            axios.post('/api/company', {name: this.name, budget: this.budget, ceo: this.ceo})
                .then(response => {
                    this.name = ""
                    this.budget = null
                    this.ceo = ""
                    router.push({name: 'companies.index'})
                })
        },
    },

    computed: {
        isDisabled() {
            return this.name && this.budget && this.ceo;
        }
    }
}
</script>

<style scoped>

</style>
