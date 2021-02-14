@extends('lending/base')

@section('head.title', 'Интернет в частный дом Белгород и Белгородская область')

@section('head.description', 'Подключение домашнего интернета в частный дом или квартиру Белгорода, района и области. Оптоволокно, высокоскоростной интернет и телевидение, так же доступен корпоративный интернет для юридических лиц')

@section('content')

    <section id="o-nas" class="section">
        <div class="container page-content company">

            <div>
                <h1 class="title">
                    Интернет в частный дом <br> Белгородской области
                </h1>

                <div class="company__text">
                    Подключим высокоскоростной интернет в частный дом, квартиру и предприятие. Скорость 300 мбит/сек,
                    оптоволокно по технологии

                    <div class="concept">
                        <div class="concept__name">xPON</div>

                        <div class="concept__info-mask">
                            <div class="concept__info">
                                <div class="concept__close">&times;</div>

                                <p class="text-style14 text_black">
                                <p class="text-style14 text_black">
                                    <b>Gigabit PON</b> — это современная технология доступа к интернету по оптоволокну, в которой
                                    возможна прокладка кабеля непосредственно в частный дом и квартиру Клиента, а так
                                    же позволяет получить множество услуг связи одновременно по одному кабелю.
                                </p>
                                <p class="text-style14 text_black">
                                    Интернет-провайдер NETSPACE переводит абонентов на скоростные и надежные каналы с
                                    устаревших медных телефонных линий 20-го века.
                                </p>
                            </div>
                        </div>
                    </div>.

                    Принимаем коллективные заявки на подключение интернета к жилым массивам. <br>
                    Интернет + телевидение более чем 100 каналов с функциями паузы, прокрутки и просмотра предыдущих трансляций.
                </div>

                @component('lending/includes/button_section', ['title' => 'Проверить'])

                    @slot('text')
                        <p class="button-section__text">
                            Проверьте техническую <br> возможность подключения
                        </p>
                    @endslot

                @endcomponent

            </div>
        </div>

    </section>

    <section id="kak-podklyuchitsya" class="section">
        <div class="container page-content connect">
            <div>
                <h2 class="subtitle">
                    Как провести интернет в свой дом
                </h2>

                <div class="row connect_row">
                    <div class="connect__item">
                        <div class="connect__title title_outline connect__line70">Звонок</div>

                        <p class="text-style text_white">
                            Позвоните нам или оставьте заявку на проверку технической возможности подключения.
                            Мы запишем ваши контакты, адрес или район
                        </p>
                    </div>

                    <div class="connect__item">
                        <div class="connect__title title_outline connect__line101">Проверка</div>

                        <p class="text-style text_white">
                            Наши инженеры проведут осмотр и выяснят все нюансы выполнения работ.
                            В 99% случаев нет никаких преград
                        </p>
                    </div>

                    <div class="connect__item">
                        <div class="connect__title title_outline connect__line166">Обратная связь</div>

                        <p class="text-style text_white">
                            В кратчайшие сроки мы с вами свяжемся, чтобы согласовать дату и время выполнения работ
                        </p>
                    </div>

                    <div class="connect__item">
                        <div class="connect__title title_outline connect__line148">Подключение</div>

                        <p class="text-style text_white">
                            В оговоренные сроки проведем монтажные работы, тестирование и подключение
                            вашего дома к интернету за 3 дня
                        </p>
                    </div>
                </div>

                @component('lending/includes/button_section', ['title' => 'Проверить'])

                    @slot('text')
                        <p class="button-section__text">
                            Проверьте техническую <br> возможность подключения
                        </p>
                    @endslot

                @endcomponent

            </div>
        </div>
    </section>

    <section id="tarify" class="section">
        <div class="container page-content tariffs">
            <div>
                <h2 class="subtitle">
                    Тарифы и возможности
                </h2>

                <div class="tariffs__content">
                    <p class="text-style text_white">
                        <b>300 мбит/сек</b> <span class="desktop-text">— хватит одновременно для работы, онлайн-игр, фильмов, видеонаблюдения и ещё останется…</span>
                    </p>
                    <p class="text-style text_white">
                        <b>Телевидение</b> — более 100 каналов <span class="desktop-text">с перемоткой видео, паузами и просмотром предыдущих программ…</span>
                    </p>
                    <p class="text-style text_white">
                        <b>Выделенный белый IP адрес</b> — вы сможете получить удалённый доступ к своим устройствам через интернет…
                    </p>
                    <p class="text-style text_white">
                        <b>Добровольная блокировка</b> — удобная функция, которая экономит деньги, можете приостановить
                        действие услуг на время вашего отъезда…
                    </p>

                    <ul class="list-style">
                        <li class="list-style__dot">
                            Для частного сектора — <b>1000 рублей в месяц</b>
                        </li>
                        <li class="list-style__dot">
                            Для многоквартирных домов — <b>850 рублей в месяц</b>
                        </li>
                    </ul>

                </div>

                @component('lending/includes/button_section', ['title' => 'Подключиться'])

                    @slot('text')
                        <p class="button-section__text">
                            Принимаем <br> коллективные заявки
                        </p>
                    @endslot

                @endcomponent

            </div>
        </div>
    </section>

    <section id="yuridicheskim-licam" class="section">
        <div class="container page-content legal">
            <div>
                <h2 class="subtitle">
                    Юридическим лицам
                </h2>

                <div class="tariffs__content">
                    <p class="text-style text_white">
                        Индивидуальный подход и тарифы на подключение к интернету предприятий, а так же оказываем
                        комплексное обслуживание оптоволоконных сетей и узлов связи.
                    </p>
                    <p class="text-style text_white">
                        Проведём сеть к вашей компании при любых геологических условиях. Для подробной информации звоните
                        по телефону: <a href="tel:+74722250911" class="link link_white link_no-weight">+7 4722 250 911</a>,
                        напишите нам на почту: <a href="mailto:net_space@mail.ru" class="link link_white link_no-weight">net_space@mail.ru</a>
                        или оставляйте заявку на сайте.
                    </p>
                </div>

                @component('lending/includes/button_section', ['title' => 'Оставить заявку'])

                    @slot('text')

                    @endslot

                @endcomponent

            </div>
        </div>
    </section>

    <section id="oplata" class="section">
        <div class="container page-content cabinet">
            <div>
                <h2 class="subtitle">
                    Удобный личный кабинет <br> с оплатой
                </h2>

                <div class="tariffs__content">
                    <p class="text-style text_white">
                        Для наших Абонентов доступен удобный личный кабинет, где вы сможете проверить состояние лицевого
                        счета, оплатить услуги банковской картой, узнать номер договора и другую юридическую информацию,
                        а так же произвести приостановление действия услуг на время вашего отъезда.
                    </p>
                </div>

                @component('lending/includes/button_section', ['title' => 'Подключиться'])

                    @slot('text')
                        <p class="button-section__text">
                            Принимаем <br> коллективные заявки
                        </p>
                    @endslot

                @endcomponent

            </div>
        </div>
    </section>

    <section id="kontakty" class="section">
        <div class="container page-content contacts">
            <div>
                <h2 class="subtitle">
                    Контакты
                </h2>

                <div class="row contacts__content">
                    <div class="contacts__content-list">
                        <ul class="list-style">
                            <li class="list-style__dot phone_icon">
                                <a href="tel:84722250911" class="contacts__link">
                                    8 4722 250 911
                                </a>
                                – С 8 до 20
                            </li>
                            <li class="list-style__dot email_icon">
                                <a href="mailto:net_space@mail.ru" class="contacts__link">
                                    net_space@mail.ru
                                </a>
                            </li>
                            {{--
                            <li class="list-style__dot map_icon">
                                <span class="contacts__link contacts__link_email">
                                    Белгород Кирпичный тупик 2А оф. 42
                                </span>
                            </li>
                            --}}
                        </ul>
                    </div>


                    @include('lending/includes/requisites')

                </div>

            </div>

        </div>
    </section>

@endsection
