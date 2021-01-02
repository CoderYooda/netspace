<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3 lk__underline">Оплата услуг</h1>
        <div class="lk__payment-form">
            <div class="lk__input-wrap form-group">
                <!--                                    классу lk__input-wrap добавляем .input_error при ошибке-->
                <label for="ps_name" class="lk__label">Плательщик</label>
                <input v-model="name" type="text"
                       id="ps_name"
                       name="name"
                       class="lk__input"
                       disabled
                >
<!--                <div class="lk__errors">-->
<!--                    Ошибка-->
<!--                </div>-->
            </div>
            <div class="lk__input-wrap form-group">
                <label for="ps_phone" class="lk__label">Телефон</label>
                <input v-model="sms" type="tel" id="ps_phone" name="phone" class="lk__input">
<!--                <div class="lk__errors">-->
<!--                    Ошибка-->
<!--                </div>-->
            </div>
            <div class="lk__input-wrap form-group">
                <label for="ps_phone" class="lk__label">Сумма для пополнения</label>
                <input v-model="summ" type="number" id="summ" name="summ" class="lk__input" required>
<!--                <div class="lk__errors">-->
<!--                    Ошибка-->
<!--                </div>-->
            </div>
            <div class="form-group">
                <button @click="pay()" class="btn lk__payment-btn sber_icon">Оплатить через СБЕР</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data: ()=> {
            return {
                name:null,
                sms:null,
                summ:null,
            }
        },
        mounted(){
            this.name = this.getFromLocalStorage('name');
            this.sms = this.getFromLocalStorage('sms');
            this.summ = this.getFromLocalStorage('minimal_pay_sum');
        },
        methods: {
            pay(){
                this.$root.$children[0].loading = true;
                if(this.summ > 0) {
                    window.axios({
                        method: 'post',
                        url: '/api/pay',
                        data: {
                            amount: this.summ,
                            abonent_id: this.getFromLocalStorage('abonent_id'),
                            returnUrl: 'http://178.216.79.26:8787/payment_check',
                            failUrl: 'http://178.216.79.26:8787/payment',
                        },
                    }).then((resp) => {
                        this.saveToLocalStorage('last_order_id', resp.data.orderId);
                        this.saveToLocalStorage('last_order_link', resp.data.formUrl);
                        window.location.href = resp.data.formUrl;
                        this.$root.$children[0].loading = false;
                    }).catch((error) => {
                        this.$root.$children[0].loading = false;
                    });
                } else {
                    this.$root.$children[0].loading = false;
                }
            },
        }
    }
</script>
