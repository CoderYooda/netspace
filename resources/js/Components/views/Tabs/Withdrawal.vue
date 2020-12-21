<template>
    <div class="lk__tab-content tab-content">
        <h1 class="lk__h3 lk__underline">История списаний</h1>
        <div class="row lk__form">
            <div class="lk__form-l3">
                <div class="lk__input-wrap">
                    <label for="hs_start" class="lk__label">Начало</label>
                    <input type="text" id="hs_start" name="start" class="lk__input">

                    <div class="lk__errors">
                        Ошибка
                    </div>
                </div>
            </div>
            <div class="lk__form-l3">
                <div class="lk__input-wrap">
                    <label for="hs_end" class="lk__label">Конец</label>
                    <input type="text" id="hs_end" name="end" class="lk__input">

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
                    <td>Услуга</td>
                    <td>Месяц</td>
                    <td>Год</td>
                    <td>Цена</td>
                    <td class="td-nowrap">
                        Ед<span class="mobile_show">.</span><span class="mobile_hide">иница</span> измерения
                    </td>
                    <td>Сумма</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="lk__lable-name">
                        <div class="lk__lable-name-mobile">Услуга</div>
                        Услуга из свой: Трафик (1000,00 руб. вх. 0,000 руб. исх. 0,000 руб.)
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Месяц</div>
                        август
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Год</div>
                        2020
                    </td>
                    <td class="td-nowrap">
                        <div class="lk__lable-name-mobile">Цена</div>
                        180 р.
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Единица измерения</div>
                        300,000 Мбит
                    </td>
                    <td class="td-nowrap">
                        <div class="lk__lable-name-mobile">Сумма</div>
                        10000 р.
                    </td>
                </tr>
                <tr>
                    <td class="lk__lable-name">
                        <div class="lk__lable-name-mobile">Услуга</div>
                        Услуга из свой: Трафик (1000,00 руб. вх. 0,000 руб. исх. 0,000 руб.)
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Месяц</div>
                        август
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Год</div>
                        2020
                    </td>
                    <td class="td-nowrap">
                        <div class="lk__lable-name-mobile">Цена</div>
                        180 р.
                    </td>
                    <td>
                        <div class="lk__lable-name-mobile">Единица измерения</div>
                        300,000 Мбит
                    </td>
                    <td class="td-nowrap">
                        <div class="lk__lable-name-mobile">Сумма</div>
                        10000 р.
                    </td>
                </tr>
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
