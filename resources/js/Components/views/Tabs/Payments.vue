<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3 lk__underline">История платежей</h1>
        <div class="row lk__form">
            <div class="lk__form-l3">
                <div class="lk__input-wrap">
                    <label class="lk__label">Начало</label>
                    <input type="text" class="lk__input">

                    <div class="lk__errors">
                        Ошибка
                    </div>
                </div>
            </div>
            <div class="lk__form-l3">
                <div class="lk__input-wrap">
                    <label class="lk__label">Конец</label>
                    <input type="text" class="lk__input">

                    <div class="lk__errors">
                        Ошибка
                    </div>
                </div>
            </div>
            <div class="lk__form-l3">
                <button class="lk__btn lk__block-btn">Отфильтровать</button>
            </div>
        </div>
        <div class="lk__form-result">
            <table class="lk__table">
                <thead>
                <tr>
                    <td>Номер операции</td>
                    <td>Дата операции</td>
                    <td>Сумма</td>
                    <td>Описание</td>
                </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < 10; ++$i)
                <tr>
                    <td>
                        <div class="lk__lable-name-mobile">Номер операции</div>
                        16267950
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Дата операции</div>
                        2020-10-30 00:00:00
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Сумма</div>
                        10 000,00
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Описание</div>
                        Текст
                    </td>
                </tr>
                @endfor
                </tbody>
            </table>
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
