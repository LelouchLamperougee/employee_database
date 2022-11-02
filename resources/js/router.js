import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/companies',
            name: 'companies.index',
            component: () => import('../components/company/IndexCompany.vue')
        },

        {
            path: '/employees',
            name: 'employees.index',
            component: () => import('../components/employee/IndexEmployee.vue')
        },

        {
            path: '/companies/create',
            name: 'companies.create',
            component: () => import('../components/company/CreateCompany.vue')
        },

        {
            path: '/employees/create',
            name: 'employees.create',
            component: () => import('../components/employee/CreateEmployee.vue')
        },

        {
            path: '/companies/:id/edit',
            name: 'companies.edit',
            component: () => import('../components/company/EditCompany.vue')
        },

    ]
})

export default router
