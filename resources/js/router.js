import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

export default new Router({
    mode: 'history',
    base: '/',
    routes: [
        {
            path: '/payment',
            name: 'payment',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Home" */ './components/views/Tabs/Payment.vue'),
        },
        {
            path: '/payments',
            name: 'payments',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Home" */ './components/views/Tabs/Payments.vue'),
        },
        {
            path: '/withdrawal',
            name: 'withdrawal',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Home" */ './components/views/Tabs/Withdrawal.vue'),
        },
        {
            path: '/promised',
            name: 'promised',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Home" */ './components/views/Tabs/Promised.vue'),
        },
        {
            path: '/personal',
            name: 'personal',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Home" */ './components/views/Tabs/Personal.vue'),
        },
        {
            path: '/password',
            name: 'password',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Home" */ './components/views/Tabs/Password.vue'),
        },
        {
            path: '/404',
            name: '404',
            meta: {layout: 'error', header:false, footer:false},
            component: () => import(/* webpackChunkName: "NotFound" */ './components/views/NotFound'),
        }, {
            path: '*',
            redirect: '/404'
        }
    ]
})
