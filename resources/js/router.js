import { createRouter, createWebHistory } from "vue-router";
import Login from './views/Login.vue';
import Register from './views/Register.vue';

// 1. Import "Views" HERE

const routes = [

    // 2. We will list the pages
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;