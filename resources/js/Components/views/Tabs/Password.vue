<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3">Смена пароля</h1>

        <div class="lk__password-reset">
            <div class="lk__input-wrap lk__form-group p_rel">
                <label for="pd_password" class="lk__label">Ваш старый пароль</label>
                <input v-model="old" v-bind:type="show_old ? 'text' : 'password'" id="old_password" name="password" class="lk__input">

                <div v-on:mouseover="show_old = true" v-on:mouseleave="show_old = false" class="eyes">
                    <div v-bind:class="{'eye_closed' : !show_old}" class="eye"></div>
                </div>

                <div class="lk__errors" v-bind:class="{'show' : passError}">
                    {{ errMess }}
                </div>
            </div>
            <div class="lk__input-wrap lk__form-group p_rel">
                <label for="pd_password" class="lk__label">Новый пароль</label>
                <input v-model="pass" v-bind:type="show_new ? 'text' : 'password'" id="pd_password" name="new" class="lk__input">

                <div v-on:mouseover="show_new = true" v-on:mouseleave="show_new = false" class="eyes">
                    <div v-bind:class="{'eye_closed' : !show_new}" class="eye"></div>
                    <!--                                        .eye_closed - закрытый глаз-->
                </div>

                <div class="lk__errors" v-bind:class="{'show' : confError}">
                    {{ confMess }}
                </div>
            </div>

            <div class="lk__input-wrap lk__form-group p_rel">
                <label for="pd_confirm_password" class="lk__label">Подтверждение</label>
                <input v-model="confirm" v-bind:type="show_confirm ? 'text' : 'password'" id="pd_confirm_password" name="confirm_password" class="lk__input">

                <div v-on:mouseover="show_confirm = true" v-on:mouseleave="show_confirm = false" class="eyes">
                    <div v-bind:class="{'eye_closed' : !show_confirm}" class="eye"></div>
                </div>

                <div class="lk__errors" v-bind:class="{'show' : confError}">
                    {{ confMess }}
                </div>
            </div>
            <div style="margin-bottom: 25px;color: green;" v-if="mess !== null">{{ mess }}</div>
            <button @click="changePass()" class="lk__btn lk__btn-controls pi_btn">Сохранить</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: ()=> {
            return {
                show_old: false,
                show_new: false,
                show_confirm: false,
                old: null,
                pass: null,
                confirm: null,
                passError:false,
                errMess:null,
                confError:false,
                confMess:null,
                mess:null,
            }
        },
        mounted() {
        },
        methods: {
            changePass(){
                window.axios({
                    method: 'post',
                    url: '/api/change_pass',
                    data: {
                        login: this.getFromLocalStorage('login'),
                        old: this.old,
                        pass: this.pass,
                        confirm: this.confirm,
                    },
                }).then((resp) =>  {
                    this.passError = false;
                    this.confError = false;
                    this.mess = null;
                    this.confMess = null;
                    this.errMess = null;
                    if(resp.data.status === 'error'){
                        this.passError = true;
                        this.errMess = resp.data.message
                    } else {
                        if(resp.data.status === 'error2'){
                            this.confError = true;
                            this.confMess = resp.data.message
                        } else {
                            this.mess = resp.data.message;
                            this.old = null;
                            this.pass = null;
                            this.confirm = null;
                            this.saveToLocalStorage('pass', pass)
                        }
                    }
                });
            }
        }
    }
</script>
