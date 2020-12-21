<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3">Смена пароля</h1>

        <div class="lk__password-reset">
            <div class="lk__input-wrap lk__form-group p_rel">
                <label for="pd_password" class="lk__label">Новый пароль</label>
                <input type="password" id="pd_password" name="password" class="lk__input">

                <div class="eyes">
                    <div class="eye eye_closed"></div>
                    <!--                                        .eye_closed - закрытый глаз-->
                </div>

                <div class="lk__errors">
                    Ошибка
                </div>
            </div>

            <div class="lk__input-wrap p_rel">
                <label for="pd_confirm_password" class="lk__label">Подтвердить пароль</label>
                <input type="password" id="pd_confirm_password" name="confirm_password" class="lk__input">

                <div class="eyes">
                    <div class="eye eye_closed"></div>
                    <!--                                        .eye_closed - закрытый глаз-->
                </div>

                <div class="lk__errors">
                    Ошибка
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
        }
    }
</script>
