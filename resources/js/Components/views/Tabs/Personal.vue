<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3">Личные данные</h1>

        <div class="row lk__personal-info">
            <div class="lk__form-l5">
                <div class="lk__input-wrap lk__form-group">
                    <label for="pd_phone" class="lk__label">Телефон</label>
                    <input type="tel" id="pd_phone" name="phone" class="lk__input">

                    <div class="lk__errors">
                        Ошибка
                    </div>
                </div>
            </div>
            <div class="lk__form-l5">
                <div class="lk__input-wrap lk__form-group input_disabled">
                    <label for="pd_name" class="lk__label">Имя</label>
                    <input type="text" id="pd_name" name="name" class="lk__input" disabled>
                </div>
            </div>
            <div class="lk__form-l5">
                <div class="lk__input-wrap lk__form-group">
                    <label for="pd_email" class="lk__label">E-mail</label>
                    <input type="email" id="pd_email" name="email" class="lk__input">
                </div>
            </div>
            <div class="lk__form-l5">
                <div class="lk__input-wrap lk__form-group input_disabled">
                    <label for="pd_surname" class="lk__label">Фамилия</label>
                    <input type="text" id="pd_surname" class="lk__input" disabled>
                </div>
            </div>
            <div class="lk__form-l5">
                <div class="lk__input-wrap lk__form-group input_disabled">
                    <label for="pd_address" class="lk__label">Адрес</label>
                    <input type="text" id="pd_address" name="address" class="lk__input" disabled>
                </div>
            </div>
            <div class="lk__form-l5">
                <div class="lk__input-wrap input_disabled">
                    <label for="pd_patronymic" class="lk__label">Отчество</label>
                    <input type="text" id="pd_patronymic" class="lk__input" disabled>
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
