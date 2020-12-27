import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

export default new Router({
    mode: 'history',
    base: '/',
    routes: [
        {
            path: '/',
            name: 'root',
            redirect: '/payment'
        },
        {
            path: '/login',
            name: 'login',
            meta: {layout: 'login', header:false},
            component: () => import(/* webpackChunkName: "Login" */ './Components/auth/Login'),
        },
        {
            path: '/payment',
            name: 'payment',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Payment" */ './Components/views/Tabs/Payment.vue'),
        },
        {
            path: '/payment_check',
            name: 'payment_check',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "PaymentCheck" */ './Components/views/Tabs/PaymentCheck.vue'),
        },
        {
            path: '/payments',
            name: 'payments',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Payments" */ './Components/views/Tabs/Payments.vue'),
        },
        {
            path: '/withdrawal',
            name: 'withdrawal',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Withdrawal" */ './Components/views/Tabs/Withdrawal.vue'),
        },
        {
            path: '/promised',
            name: 'promised',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Promised" */ './Components/views/Tabs/Promised.vue'),
        },
        {
            path: '/personal',
            name: 'personal',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Personal" */ './Components/views/Tabs/Personal.vue'),
        },

        {
            path: '/password',
            name: 'password',
            meta: {layout: 'main'},
            component: () => import(/* webpackChunkName: "Password" */ './Components/views/Tabs/Password.vue'),
        },
        {
            path: '/404',
            name: '404',
            meta: {layout: 'error', header:true, footer:true},
            component: () => import(/* webpackChunkName: "NotFound" */ './Components/views/NotFound'),
        }, {
            path: '*',
            redirect: '/404'
        }
    ]
})
