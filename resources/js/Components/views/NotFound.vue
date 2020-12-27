<template>
    <div class="lk__tab-content error">

        <div>
            <h1 class="error__404">404</h1>
            <div class="error__title">
                Страница <br> не найдена
            </div>

            <div class="error__subtitle">
                Возможные причины:
            </div>

            <ul class="lk__list">
                <li class="lk__list-item">
                    Вы неправильно набрали URL;
                </li>
                <li class="lk__list-item">
                    Вы нажали на неверную ссылку, опубликованную на другом сайте;
                </li>
                <li class="lk__list-item">
                    Закладка (ярлык) в Вашем браузере указывает на страницу, которая была
                    перемещена или удалена.
                </li>
            </ul>

            <div class="error__text">
                Приносим Вам извинения за причиненные неудобства.
            </div>

            <ul class="lk__list">
                <li class="lk__list-item">
                    <a href="https://inetspace.ru/"
                       class="error__link"
                       title="NetSpace - Главная страница"
                       target="_blank"
                       rel="nofollow"
                    >
                        Главная страница сайта «NETSPACE»
                    </a>
                </li>
                <li class="lk__list-item">
                    <a href="/" class="error__link" title="Личный кабинет">Личный кабинет</a>
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                companies: []
            }
        },
        mounted() {
            // var app = this;
        },
        methods: {
        }
    }
</script>
