<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3 lk__underline">История списаний</h1>
        <div class="row lk__form">
            <div class="lk__form-l3">
                <div class="lk__input-wrap">
                    <label for="hs_start" class="lk__label">Начало</label>
                    <input v-model="start" type="date" id="hs_start" name="start" class="lk__input">

                    <div class="lk__errors">
                        Ошибка
                    </div>
                </div>
            </div>
            <div class="lk__form-l3">
                <div class="lk__input-wrap">
                    <label for="hs_end" class="lk__label">Конец</label>
                    <input v-model="end" type="date" id="hs_end" name="end" class="lk__input">

                    <div class="lk__errors">
                        Ошибка
                    </div>
                </div>
            </div>
            <div class="lk__form-l3">
                <button @click="getArches()" class="lk__btn lk__block-btn">Отфильтровать</button>
            </div>
        </div>
        <div class="lk__form-result" style="overflow: auto;height: 40vh;">
            <table class="lk__table">
                <thead>
                <tr>
<!--                    <td>Услуга</td>-->
<!--                    <td>Месяц</td>-->
<!--                    <td>Год</td>-->
                    <td>Кредит</td>
                    <td>Дебет</td>
                    <td>Остаток</td>
                    <td>Дата</td>
                    <td>Описание</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items">
<!--                    <td class="lk__lable-name">-->
<!--                        <div class="lk__lable-name-mobile">Услуга</div>-->
<!--                        Услуга из свой: Трафик (1000,00 руб. вх. 0,000 руб. исх. 0,000 руб.)-->
<!--                    </td>-->
<!--                    <td>-->
<!--                        <div class="lk__lable-name-mobile">Месяц</div>-->
<!--                        август-->
<!--                    </td>-->
<!--                    <td>-->
<!--                        <div class="lk__lable-name-mobile">Год</div>-->
<!--                        2020-->
<!--                    </td>-->
                    <td>
                        <div class="lk__lable-name-mobile">Кредит</div>
                        {{ parseFloat(item.fields.credit).toFixed(2) }}
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Дебет</div>
                        {{ parseFloat(item.fields.debit).toFixed(2) }}
                    </td>
                    <td class="td-nowrap">
                        <div class="lk__lable-name-mobile">Остаток</div>
                        {{ parseFloat(item.fields.ostatok).toFixed(2) }}
                    </td>
                    <td class="td-nowrap">
                        <div class="lk__lable-name-mobile">Дата</div>
                        {{ date(item.fields.change_balance_time)}}
                    </td>
                    <td class="td-nowrap">
                        <div class="lk__lable-name-mobile">Дата</div>
                        {{ item.fields.descr}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data: ()=> {
            return {
                end:null,
                start:null,
                abonent_id: null,
                items: [],
            }
        },
        mounted() {
            this.abonent_id = this.getFromLocalStorage('abonent_id');
            this.getArches();

        },
        computed:{

        },
        beforeMount(){
            this.st();
            this.en();
        },
        methods: {
            st(){
                let d = new Date();
                this.start = this.dateToInput(d.setMonth(d.getMonth() - 1));

            },
            en(){
                let d = new Date();
                this.end = this.dateToInput(d);

            },
            getArches(){
                window.axios({
                    method: 'post',
                    url: '/api/get_arches',
                    data: {
                        start: this.start,
                        end: this.end,
                        abonent_id: this.abonent_id
                    },
                }).then((resp) =>  {
                    this.items = resp.data;
                }).catch((error)=>{

                });
            },
            date(date){
                let d = new Date(date);
                let ye = new Intl.DateTimeFormat('ru', { year: 'numeric' }).format(d);
                let mo = new Intl.DateTimeFormat('ru', { month: '2-digit' }).format(d);
                let da = new Intl.DateTimeFormat('ru', { day: '2-digit' }).format(d);

                return da + '-' + mo + '-' + ye;
            },
            dateToInput(date){
                let d = new Date(date);
                let ye = new Intl.DateTimeFormat('ru', { year: 'numeric' }).format(d);
                let mo = new Intl.DateTimeFormat('ru', { month: '2-digit' }).format(d);
                let da = new Intl.DateTimeFormat('ru', { day: '2-digit' }).format(d);

                return ye + '-' + mo + '-' + da;
            }

        }
    }
</script>
