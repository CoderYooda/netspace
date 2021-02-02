<template>
    <div>
        <div v-if="isHeader" class="lk__header">
            <div class="container">
                <div class="row">
                    <a href="/" class="lk__header-logo" title="NetSpace">
                        <img src="/images/logo/logo.png" alt="NetSpace" class="lk__header-logo-img">
                    </a>
                    <div class="row lk__contacts">
                        <div class="lk__contacts-item">
                            <div class="lk__contacts-label">Круглосуточно</div>
                            <a href="tel:+74722250911" class="lk__contacts-link link_phone">+7 4722 250 911</a>
                        </div>
                        <div class="lk__contacts-item">
                            <div class="lk__contacts-label">Напишите нам</div>
                            <a href="mailto:" class="lk__contacts-link">net_space@mail.ru</a>
                        </div>
                        <button @click="logout()" class="lk__logout" title="Выйти из личного кабинета"><span class="btn_text_hide">Выйти</span></button>
                    </div>
                </div>
            </div>
        </div>
        <component :is="layout" />
        <div v-if="isFooter" class="login-container login-footer">
            <div class="row">
                <div class="login-footer__copyright">2021 NetSpace</div>

                <div class="login-footer__webstyle">
                    <a href="https://webstyle.top/prodvizhenie-sajtov"
                       class="login-footer__webstyle-link"
                       title="Продвижение сайтов Белгород"
                       target="_blank"
                       rel="noopener"
                    >
                        Продвижение сайтов
                    </a>
                    <a href="https://webstyle.top/"
                       class="login-footer__webstyle-link"
                       title="Создание сайтов Белгород"
                       target="_blank"
                       rel="noopener"
                    >
                        <img src="/images/logo/webstyle_black.png" alt="Создание сайтов Webstyle" class="login-footer__webstyle-img">
                    </a>
                </div>
            </div>
        </div>
        <div class="holder" v-if="loading">
            <div class="preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
    </div>

</template>

<script>
    import MainLayout from './layouts/MainLayout'
    import ErrorLayout from './layouts/ErrorLayout'
    import LoginLayout from './layouts/LoginLayout'
    export default {
        data: ()=> {
            return {
                loading:false,
                rn:null,
            }
        },
        mounted() {
        },
        created(){
            this.getShowLoginState();
        },
        methods: {
            getShowLoginState(route_name = null){
                // let suid = localStorage['suid'];
                // if(!suid || this.$route.name === 'PD')
                //     this.$router.push({ name: 'login' })
            },
            logout(){
                this.removeFromLocalStorage('suid');
                this.getShowLoginState();
                this.$router.push({ name: 'login' })
            },
        },
        computed: {
            isFooter(){
              return this.$route.meta.footer ?? true
            },
            isHeader(){
              return this.$route.meta.header ?? true
            },
            layout() {
                return (this.$route.meta.layout || 'main') + '-layout'
            },
        },
        components: {
            MainLayout,
            LoginLayout,
            ErrorLayout
        }
    }
</script>
