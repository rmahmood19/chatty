import {createRouter, createWebHistory} from "vue-router";


const routes = [
    {
        path: '/login',
        name: 'Login',
        component: () => import('@/views/Login.vue')
    },
    {
        path: '/',
        name: 'Home',
        component: () => import('@/views/Home.vue'),
        children: [
            {
                path: '',
                name: 'Dashboard',
                component: () => import('@/views/Dashboard.vue')
            },
            {
                path: '/users',
                name: 'Users',
                component: () => import('@/views/UserList.vue')
            }
        ]

    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router