<template>
    <div class="lk__offset">
        <div class="container">
            <div class="row lk__row">

                <div class="lk__sidebar-wrap">

                    <router-link tag="button" class="btn lk__payment-btn lk__sidebar-btn-sber sber_icon" to="/payment">Олатить<span class="btn_text_hide">&nbsp;через СБЕР</span></router-link>

                    <UserCard/>

                    <div class="lk__sidebar-footer">
<!--                        <button class="btn lk__payment-btn lk__sidebar-btn">Помощь</button>-->
                        <button @click="call_master = !call_master" class="btn lk__payment-btn lk__sidebar-btn lk__sidebar-btn-offset">Вызов мастера</button>
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
        <div class="modal-mask" v-bind:class="{'show' : call_master}">
            <div class="modal">

                <div class="modal-body">

                    <div class="modal__form">
<!--                        Если письмо отправлено успешно сюда .form_hide-->

                        <div @click="call_master = !call_master" class="modal-close">&times;</div>

                        <div class="modal-title">Вызов мастера</div>

                        <p class="lk__text-style">
                            Для вызова специалиста оставьте заявку в форме обратной связи
                        </p>

                        <div class="modal__offset">
                            <div class="lk__input-wrap">
                                <label for="help_name" class="lk__label">
                                    ФИО<span class="star">*</span>
                                </label>
                                <input v-model="name" type="text" id="help_name" name="name" class="lk__input">

                                <div class="lk__errors">
                                    Ошибка
                                </div>
                            </div>

                            <div class="lk__input-wrap">
                                <label for="help_phone" class="lk__label">
                                    Телефон<span class="star">*</span>
                                </label>
                                <input v-model="sms" type="tel" id="help_phone" name="phone" class="lk__input">

                                <div class="lk__errors">
                                    Ошибка
                                </div>
                            </div>
                        </div>

                        <button class="lk__btn btn_disabled" disabled>Отправить сообщение</button>

                    </div>

                    <div class="form-success">
<!--                        Если письмо отправлено успешно сюда .show-->
                        <div class="form-success__title">Спасибо за обращение</div>

                        <p class="lk__text-style">
                            В ближайшее время с вами свяжится <br> специалист для уточнения подробностей.
                        </p>

                    </div>

                </div>

            </div>
        </div>

    </div>
</template>

<script>
    import Menu from '../views/Menu'
    import UserCard from '../layouts/UserCard';
    export default {
        data: ()=> {
            return {
                call_master: false,
                name: null,
                sms: null,
            }
        },
        created(){
        },
        mounted(){
            this.name = this.getFromLocalStorage('name');
            this.sms = this.getFromLocalStorage('sms');
        },
        methods: {

        },
        components: {
            Menu, UserCard
        }
    }
</script>
