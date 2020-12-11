<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token('app') }}" />

    <title>Войти</title>

    {% block stylesheets %}

        {{- encore_entry_link_tags('app') -}}

    {% endblock %}

</head>
<body class="login-wrap">

    <div class="wrapper">

        <div class="login-bg"></div>

        <div class="login-container login-content">
            <div class="row login-header">
                <a href="{{ path('home') }}" class="login-header__link login-header__home" title="На главную">На главную</a>
                <a href="tel:+74722250911" class="login-header__link login-header__phone">+7 4722 250 911</a>
            </div>

            <div class="login">
                <div class="row login_row">
                    <div class="login__left">
                        <a href="{{ path('home') }}" class="login__logo">
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
                                <label class="label">Мобильный телефон</label>
                                <input type="tel" class="input">
                                <div class="input_err">error</div>
                            </div>
                            <div class="form__group p_rel">
                                <label class="label">Пароль</label>
                                <input type="password" class="input is-invalid">
                                <div class="input_err">error</div>

                                <div class="eyes">
                                    <div class="eye eye_closed"></div>
                                </div>
                            </div>

                            <label class="checkbox inline remember-me">
                                Запомнить меня
                                <input type="checkbox"/>
                                <span class="checkmark"></span>
                            </label>

                            <div class="form-group">
                                <button class="btn_blue login__btn">Войти</button>
                                <a href="#" class="login__access">Получить доступ</a>
                            </div>

                            <p class="personal-data">
                                Нажимая кнопку «Войти», Вы принимаете условия
                                <a href="{{ path('policy') }}" class="personal-data__link" target="_blank" rel="noopener">
                                    пользовательского соглашения и политики конфиденциальности
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="login-container login-footer">
            <div class="row">
                <div class="login-footer__copyright">© {{ 'now' | date('Y') }} NetSpace</div>

                <div class="login-footer__webstyle">
                    <a href="https://webstyle.top/prodvizhenie-sajtov"
                       class="login-footer__webstyle-link"
                       title="Продвижение сайтов Белгород"
                       target="_blank"
                       rel="noopener"
                    >
                        Продвижение сайтов
                    </a>
                    <a href="https://webstyle.top/"
                       class="login-footer__webstyle-link"
                       title="Создание сайтов Белгород"
                       target="_blank"
                       rel="noopener"
                    >
                        <img src="/images/logo/webstyle_black.png" alt="Создание сайтов Webstyle" class="login-footer__webstyle-img">
                    </a>
                </div>
            </div>
        </div>
    </div>

{% block javascripts %}

    {{ encore_entry_script_tags('app') }}

{% endblock %}

</body>
</html>