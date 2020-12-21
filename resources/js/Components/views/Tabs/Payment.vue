<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3 lk__underline">Оплата услуг</h1>
        <div class="lk__payment-form">
            <div class="lk__input-wrap form-group input_error">
                <!--                                    классу lk__input-wrap добавляем .input_error при ошибке-->
                <label for="ps_name" class="lk__label">Плательщик</label>
                <input type="text"
                       id="ps_name"
                       name="name"
                       class="lk__input"
                       value="Гончаренко Евгений Сергеевич"
                >
                <div class="lk__errors">
                    Ошибка
                </div>
            </div>
            <div class="lk__input-wrap form-group">
                <label for="ps_phone" class="lk__label">Телефон</label>
                <input type="tel" id="ps_phone" name="phone" class="lk__input">
                <div class="lk__errors">
                    Ошибка
                </div>
            </div>
            <div class="form-group">
                <button class="btn lk__payment-btn sber_icon">Оплатить через СБЕР</button>
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
