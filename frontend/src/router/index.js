import {createRouter, createWebHistory} from "vue-router";
import useAuthStore from "@/stores/authStore.js";


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
        meta: {requiresAuth: true},
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

router.beforeEach( async (to, from, next) => {
    const auth = useAuthStore();

    if (!auth.user && to.meta.requiresAuth) {
        next({name: 'Login'});
    } else if (auth.user && to.name === 'Login') {
        next({name: 'Home'});
    } else {
        next();
    }
})

export default router