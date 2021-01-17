<template>
    <div class="lk__tabs tabs">
        <router-link tag="div" class="lk__tab tab" active-class="active" to="/payment">Оплата услуг</router-link>
        <router-link tag="div" class="lk__tab tab" active-class="active" to="/withdrawal">История списаний</router-link>
<!--        <div class="lk__tab p_rel" v-bind:class="{'active':isHistoryActive}">-->
<!--            <div class="lk__tab-mobile">Финансы</div>-->
<!--            <div class="lk__tab_icon"></div>-->
<!--            <div class="tab-dropdown_mask">-->
<!--                <div class="tab-dropdown">-->
<!--                    <router-link tag="div" class="tab tab-dropdown__item" to="/withdrawal">История списаний</router-link>-->
<!--                    <router-link tag="div" class="tab tab-dropdown__item" to="/payments">История платежей</router-link>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <router-link tag="div" class="lk__tab tab" active-class="active" to="/pay">Оплата и возврат</router-link>
        <router-link tag="div" class="lk__tab tab" active-class="active" to="/promised">Обещанный платеж</router-link>
        <div class="lk__tab lk__tab_last p_rel">
            <div class="lk__tab-mobile">Настройки</div>

            <div class="lk__tab_icon"></div>

            <div class="tab-dropdown_mask">
                <div class="tab-dropdown">
                    <router-link tag="div" class="tab tab-dropdown__item" to="/personal">Личные данные</router-link>
                    <router-link tag="div" class="tab tab-dropdown__item" to="/password">Смена пароля</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
        },
        methods: {
        },
        computed: {
            isHistoryActive(){

                return this.$route.path === "/payments" || this.$route.path === "/withdrawal";
            }
        },
    }
</script>
