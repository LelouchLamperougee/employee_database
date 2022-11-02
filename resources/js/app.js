import './bootstrap';

import '../sass/app.scss'


import {createApp} from "vue/dist/vue.esm-bundler";
import App from "/resources/components/App.vue"
import router from './router'

const app = createApp(App)

app.use(router)

app.mount('#app')
