<template>
    <div class="lk__sidebar">
        <div class="lk__username">
            <div class="lk__surname">{{ getName.split(' ')[0] }}</div>
            {{ getName.substr(getName.indexOf(" ") + 1) }}
        </div>

        <div class="lk__info">
            <div class="lk__info-item">
                <div class="lk__info-name">Номер счета</div>
                <div class="lk__info-value">{{ abonent_id }}</div>
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Договор</div>
                <div class="lk__info-value">{{ login }}</div>
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Сцмма к оплате</div>
                <div class="lk__info-value ">{{ minimal_pay_sum }} руб.</div>
<!--                lk__info-status active-->
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Доступ в интернет</div>
                <div class="lk__info-value lk__info-status" v-bind:class="{'active' : allow_internet, 'no_active' : !allow_internet}" >{{ allow_internet ? 'Активен' : 'Заблокирован' }}</div>
<!--                lk__info-status active-->
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">До отключения</div>
                <div class="lk__info-value">{{ days_until }} дней</div>
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Тариф</div>
                <div class="lk__info-value">{{ tarif_name }}</div>
            </div>

            <div class="lk__info-item">
                <div class="lk__info-name">Мой IP</div>
                <div class="lk__info-value">{{ ip }}</div>
            </div>

            <div class="lk__info-item lk__sidebar-balance">
                <div class="lk__info-name">Баланс</div>
                <div class="lk__info-value"><b>{{ balance }} руб.</b></div>
            </div>
            <button @click="add()">awd</button>
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
                window.axios({
                    method: 'post',
                    url: '/api/addBalance',
                    params:{abonent_id:this.abonent_id}
                }).then((resp) =>  {
                    console.log(resp);
                }).catch((error)=>{

                });
            }
        },
        mounted(){
            this.name = this.getFromLocalStorage('name');
            this.login = this.getFromLocalStorage('login');
            this.abonent_id = this.getFromLocalStorage('abonent_id');
            this.balance = this.getFromLocalStorage('balance');
            this.ip = this.getFromLocalStorage('ip');
            this.debit = this.getFromLocalStorage('debit');
            this.minimal_pay_sum = this.getFromLocalStorage('minimal_pay_sum');
            this.allow_internet = this.getFromLocalStorage('allow_internet');
            this.tarif_name = this.getFromLocalStorage('tarif_name');
            this.days_until = this.getFromLocalStorage('days_until');
        },
    }
</script>

<style scoped>

</style>
