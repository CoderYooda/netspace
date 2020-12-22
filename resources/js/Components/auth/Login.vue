<template>
    <div class="login-container login-content">
        <div class="row login-header">
            <a href="#" class="login-header__link login-header__home" title="На главную">На главную</a>
            <a href="tel:+74722250911" class="login-header__link login-header__phone">+7 4722 250 911</a>
        </div>

        <div class="login">
            <div class="row login_row">
                <div class="login__left">
                    <a href="#" class="login__logo">
                        <img src="/images/logo/logo-big.jpg" alt="" class="login__logo-img">
                    </a>
                    <h1 class="login__title">
                        Личный кабинет
                    </h1>
                    <p class="login__title-label">
                        Высокоскоростной интернет в частный дом
                    </p>
                </div>
                <div class="login__right">

                    <div class="login-form">
                        <div class="form__group">
                            <label class="label">Логин</label>
                            <input @keypress="loginData.loginHasError = false" v-model="loginData.login" v-bind:class="{'is-invalid' : loginData.loginHasError}" type="tel" class="input">
                            <div v-if="loginData.loginHasError" class="input_err">{{ loginData.errorMess}}</div>
                        </div>
                        <div class="form__group p_rel">
                            <label class="label">Пароль</label>
                            <input @keypress="loginData.passwordHasError = false" v-model="loginData.password" v-bind:class="{'is-invalid' : loginData.passwordHasError}" type="password" class="input">
                            <div v-if="loginData.passwordHasError" class="input_err">{{ loginData.errorMess}}</div>

                            <div class="eyes">
                                <div class="eye eye_closed"></div>
                                <!--                                    .eye_closed - закрытый глаз-->
                            </div>
                        </div>

<!--                        <label class="checkbox inline remember-me">-->
<!--                            Запомнить меня-->
<!--                            <input type="checkbox"/>-->
<!--                            <span class="checkmark"></span>-->
<!--                        </label>-->

                        <div class="form-group">
                            <button @click="login()" class="btn_blue login__btn">Войти</button>
<!--                            <a href="#" class="login__access">Получить доступ</a>-->
                        </div>

                        <p class="personal-data">
                            Нажимая кнопку «Войти», Вы принимаете условия
                            <a href="#" class="personal-data__link" target="_blank" rel="noopener">
                                пользовательского соглашения и политики конфиденциальности
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data: ()=> {
            return {
                showLogin: false,
                loginData: {
                    login:'',
                    loginHasError:false,
                    password:'',
                    passwordHasError:false,
                    errorMess:null
                }
            }
        },
        beforeMount(){
            this.getShowLoginState();
        },
        mounted() {
            this.$eventBus.$on('NoAuthEvent', ()=>{
                this.showLogin = true;
            });
            let suid = localStorage['suid'];
            if(suid)
                this.$router.push({ name: 'payment' })
        },
        methods:{
            show(e){
                console.log(e);
            },
            getShowLoginState(e){
                let token = localStorage['api_token'];
                this.showLogin = !token;
            },
            login(e){
                this.loginData.phoneHasError = false;
                this.loginData.passwordHasError = false;
                window.axios({
                    method: 'post',
                    url: '/api/login',
                    data: this.loginData,
                }).then((resp) =>  {
                    if(resp.data.status === 'error'){
                        this.loginData.loginHasError = true;
                        this.loginData.passwordHasError = true;
                        this.loginData.errorMess = resp.data.message;
                    } else {
                        console.log(resp.data);
                        this.saveToLocalStorage('a_home_number', resp.data.a_home_number);
                        this.saveToLocalStorage('abonent_id', resp.data.abonent_id);
                        this.saveToLocalStorage('ip', resp.data.ip);
                        this.saveToLocalStorage('login', resp.data.login);
                        this.saveToLocalStorage('ostatok', resp.data.ostatok);
                        this.saveToLocalStorage('sms', resp.data.sms);
                        this.saveToLocalStorage('suid', resp.data.suid);
                        this.$router.push({ name: 'payment' })
                    }
                }).catch((error)=>{

                });
            }
        }
    }
</script>

<style scoped>
    #auth_form{
        position: absolute;
        top: 0;
        z-index: 10169;
        width: 100vw;
        height: 100vh;
        left: 0;
        background: #2D76A8;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #auth_form form{
        margin: 0 auto;
    }
    .logo{
        background: url(/images/logo_bb.svg) center no-repeat;
        height: 50px;
    }
    .action{
        text-align: center;
        color: #fff;
        font-size: 18px;
        margin-bottom: 15px;
    }
    .auth_butt{
        background-color: #2d76a8;
        color: #fff;
        border: 1px solid #4993c5;
        border-radius: 3px;
        margin: 0 auto;
        display: block;
    }
</style>
