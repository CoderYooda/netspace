<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3">Обещанный платеж</h1>

        <p class="lk__text-style">
            <b>Действие вашего тарифа приостановлено</b>
        </p>
        <p class="lk__text-style">
            Активирована услуга “Доверительный платеж”
        </p>

        <div class="lk__promised-offset">
            <p class="lk__text-style"><b>Внимание!</b></p>
            <p class="lk__text-style">
                <b>Услуга “Доверительный платеж” будет отключена через</b>
                <span class="lk__text-violet">3 дня</span>
            </p>
            <p class="lk__text-style">Пожалуйста пополните баланс</p>
        </div>

        <button class="btn lk__payment-btn sber_icon lk__promised-btn">Оплатить через СБЕР</button>
    </div>
</template>

<script>
    export default {
        mounted() {
        },
        methods: {
        }
    }
</script>
