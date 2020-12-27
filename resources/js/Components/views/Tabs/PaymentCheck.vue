<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3 lk__underline">Обработка платежа {{ orderId }}</h1>
        <div class="lk__payment-form">
            <div v-if="ready">
                На ваш счет зачислено {{ amount / 100 }} рублей.
            </div>
            <div v-if="errorMess"> {{ errorMess }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data: ()=> {
            return {
                orderId:null,
                amount:0,
                ready:false,
                errorMess:null,
            }
        },
        mounted(){
            // /?orderId=3001710d-c309-73ac-a51b-1fa35e44f4bd&lang=ru
            this.orderId = this.$route.query.orderId;
            this.check();
        },
        methods: {
            check(){
                this.errorMess = null;
                window.axios({
                    method: 'post',
                    url: '/api/pay_check',
                    data: {
                        order_id: this.orderId,
                    },
                }).then((resp) =>  {

                    if(resp.data.ErrorCode > 0){
                        this.errorMess = resp.data.ErrorMessage;
                    } else {
                        this.saveToLocalStorage('balance', resp.data.balance);
                        this.ready = true;
                        this.amount = resp.data.Amount;
                        this.$eventBus.$emit('fresh');
                    }
                }).catch((error)=>{

                });
            }
        }
    }
</script>
