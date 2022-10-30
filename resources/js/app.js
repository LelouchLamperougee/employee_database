import './bootstrap';

import '../sass/app.scss'

import {createApp} from "vue/dist/vue.esm-bundler";
import App from "../components/App.vue";

const app = createApp({
    components: {
        App
    }
})

app.mount('#app')
