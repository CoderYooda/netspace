<template>

        <div class="container">
            <div class="row lk__row">

                <div class="lk__sidebar-wrap">

                    <button class="btn lk__payment-btn lk__sidebar-btn-sber sber_icon">
                        Оплатить<span class="btn_text_hide">&nbsp;через СБЕР</span>
                    </button>

                    <UserCard/>

                    <div class="lk__sidebar-footer">
                        <button class="btn lk__payment-btn lk__sidebar-btn">Помощь</button>
                        <button class="btn lk__payment-btn lk__sidebar-btn lk__sidebar-btn-offset">Вызов мастера</button>
                    </div>
                </div>

                <div class="lk__content">

                    <div class="lk__tabs-wrap">
                        <!--                        Эта обертка для адаптива-->

                        <!--                        Если это компьютер .active добавлять к .lk__tab при размере экрана меньше 655px .active добавлять .tab-->
                        <Menu/>
                    </div>
                    <div class="lk__tab-content-wrap">
                        <router-view />
                    </div>
                </div>

            </div>
        </div>
</template>

<script>
    import Menu from '../views/Menu';
    import UserCard from '../layouts/UserCard';
    export default {
        data: ()=> {
            return {
                isDark: false,
            }
        },
        created(){
        },

        methods: {

        },
        components: {
            Menu, UserCard
        }
    }
</script>
