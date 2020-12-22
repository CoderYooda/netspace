<template>
    <div>
        <div class="lk__header">
            <div class="container">
                <div class="row">
                    <a href="/" class="lk__header-logo" title="NetSpace">
                        <img src="/images/logo/logo.png" alt="NetSpace" class="lk__header-logo-img">
                    </a>
                    <div class="row lk__contacts">
                        <div class="lk__contacts-item">
                            <div class="lk__contacts-label">Круглосуточно</div>
                            <a href="tel:+71234567891" class="lk__contacts-link link_phone">+7 47244 250 911</a>
                        </div>
                        <div class="lk__contacts-item">
                            <div class="lk__contacts-label">Напишите нам</div>
                            <a href="mailto:" class="lk__contacts-link">net_space@mail.ru</a>
                        </div>
                        <button class="lk__logout" title="Выйти из личного кабинета"><span class="btn_text_hide">Выйти</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="lk__offset">
            <component :is="layout" />
            <!--        <login/>-->
        </div>
    </div>

</template>

<script>
    import MainLayout from './layouts/MainLayout'
    import ErrorLayout from './layouts/ErrorLayout'
    import Login from './auth/Login'
    export default {
        data: ()=> {
            return {
            }
        },
        mounted() {
        },
        created(){
        },
        methods: {

        },
        computed: {
            layout() {
                return (this.$route.meta.layout || 'main') + '-layout'
            },
        },
        components: {
            Login,
            MainLayout,
            ErrorLayout
        }
    }
</script>
