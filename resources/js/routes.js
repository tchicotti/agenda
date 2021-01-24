import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '@/js/components/Home'
import Login from '@/js/components/Login'

Vue.use(VueRouter)

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                auth: true
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        }
    ]
})

export default router
