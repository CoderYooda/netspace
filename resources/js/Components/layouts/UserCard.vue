<template>
    <div class="lk__sidebar">
        <div class="lk__username">
            <div class="lk__surname">{{ getName.split(' ')[0] }}</div>
            {{ getName.substr(getName.indexOf(" ") + 1) }}
        </div>

        <div class="lk__info">
            <div class="lk__info-item">
                <div class="lk__info-name">Номер счета</div>
                <div class="lk__info-value">1000{{ abonent_id }}</div>
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Договор</div>
                <div class="lk__info-value">{{ login }}</div>
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Сумма к оплате</div>
                <div class="lk__info-value ">{{ minimal_pay_sum | format }} руб.</div>
<!--                lk__info-status active-->
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Доступ в интернет</div>
                <div class="lk__info-value lk__info-status" v-bind:class="{'active' : allow_internet, 'no_active' : !allow_internet}" >{{ allow_internet ? 'Активен' : 'Заблокирован' }}</div>
<!--                lk__info-status active-->
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">До отключения</div>
                <div class="lk__info-value">{{ days_until }} дн.</div>
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Тариф</div>
                <div class="lk__info-value">{{ tarif_name }}</div>
            </div>

<!--            <div class="lk__info-item">-->
<!--                <div class="lk__info-name">Мой IP</div>-->
<!--                <div class="lk__info-value">{{ ip }}</div>-->
<!--            </div>-->

            <div class="lk__info-item lk__sidebar-balance">
                <div class="lk__info-name">Баланс</div>
                <div class="lk__info-value"><b>{{ balance | format }} руб.</b></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserCard",
        data: ()=> {
            return {
                name:null,
                login:null,
                abonent_id :null,
                balance :null,
                debit :null,
                ip :null,
                minimal_pay_sum :null,
                allow_internet :null,
                tarif_name :null,
                days_until :null,
            }
        },
        filters: {
            format: val => `${val}`.replace(/(\d)(?=(\d{3})+([^\d]|$))/g, '$1 '),
        },
        computed:{
            getName(){
                return this.name ? this.name : "Не указано"
            },
            ostatokk(){
                console.log( this.ostatok);
                return this.ostatok ? this.ostatok : 0;
            }
        },
        methods:{
            add(){
                this.$root.$children[0].loading = true;
                window.axios({
                    method: 'post',
                    url: '/api/addBalance',
                    params:{abonent_id:this.abonent_id}
                }).then((resp) =>  {
                    console.log(resp);
                    this.$root.$children[0].loading = false;
                }).catch((error)=>{
                    this.$root.$children[0].loading = false;
                });
            }
        },
        mounted(){
            this.$eventBus.$on('fresh', ()=>{
                this.$root.$children[0].loading = true;
                window.axios({
                    method: 'post',
                    url: '/api/login',
                    data: {login: this.getFromLocalStorage('login'),password:this.getFromLocalStorage('pass')},
                }).then((resp) =>  {
                    this.saveToLocalStorage('ostatok', resp.data.ostatok);
                    this.saveToLocalStorage('sms', resp.data.sms);
                    this.saveToLocalStorage('suid', resp.data.suid);
                    this.saveToLocalStorage('name', resp.data.name);
                    this.saveToLocalStorage('debit', resp.data.debit);
                    this.saveToLocalStorage('allow_internet', resp.data.allow_internet);
                    this.saveToLocalStorage('tarif_name', resp.data.tarif_name);
                    this.saveToLocalStorage('enough_to_date', resp.data.enough_to_date);
                    this.saveToLocalStorage('days_until', resp.data.days_until);
                    this.saveToLocalStorage('pass', resp.data.gen_pwd);
                    this.saveToLocalStorage('recomend_pay_sum', parseFloat(resp.data.recomend_pay_sum).toFixed(2));
                    this.saveToLocalStorage('minimal_pay_sum', parseFloat(resp.data.minimal_pay_sum).toFixed(2));
                    this.saveToLocalStorage('balance', parseFloat(resp.data.balance).toFixed(2));
                    this.saveToLocalStorage('promise_pay', parseFloat(resp.data.promise_pay).toFixed(2));
                    this.saveToLocalStorage('promise_date_end', parseFloat(resp.data.promise_date_end).toFixed(2));

                    this.name = this.getFromLocalStorage('name');
                    this.login = this.getFromLocalStorage('login');
                    this.abonent_id  = this.getFromLocalStorage('abonent_id');
                    this.balance  = this.getFromLocalStorage('balance');
                    this.debit  = this.getFromLocalStorage('debit');
                    this.ip  = this.getFromLocalStorage('ip');
                    this.minimal_pay_sum  = this.getFromLocalStorage('minimal_pay_sum');
                    this.allow_internet  = this.getFromLocalStorage('allow_internet');
                    this.tarif_name  = this.getFromLocalStorage('tarif_name');
                    this.days_until  = this.getFromLocalStorage('days_until');

                    this.$root.$children[0].loading = false;
                }).catch((error)=>{
                    this.$root.$children[0].loading = false;
                });
            });

            this.name = this.getFromLocalStorage('name');
            this.login = this.getFromLocalStorage('login');
            this.abonent_id  = this.getFromLocalStorage('abonent_id');
            this.balance  = this.getFromLocalStorage('balance');
            this.debit  = this.getFromLocalStorage('debit');
            this.ip  = this.getFromLocalStorage('ip');
            this.minimal_pay_sum  = this.getFromLocalStorage('minimal_pay_sum');
            this.allow_internet  = this.getFromLocalStorage('allow_internet');
            this.tarif_name  = this.getFromLocalStorage('tarif_name');
            this.days_until  = this.getFromLocalStorage('days_until');
        },
    }
</script>

<style scoped>

</style>
