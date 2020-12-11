<div class="lk__header">
    <div class="container">
        <div class="row">

            @mobile
                <div class="lk__open-menu"></div> {{-- бургер --}}
            @endmobile

            {{-- Мобильное меню (возможно в нем нет необходимости) --}}

                @include('includes.mobile_menu')

            {{-- Конец мобильного меню --}}


            <a href="#" class="lk__header-logo" title="NetSpace">
                <img src="/images/logo/logo.png" alt="NetSpace" class="lk__header-logo-img">
            </a>

            <div class="row lk__contacts">

                <div class="lk__contacts-item">
                    <div>
                        <div class="lk__contacts-label">Подключение</div>
                        <a href="tel:+71234567890" class="lk__contacts-link">+7(123) 456-78-90</a>
                    </div>
                </div>

                <div class="lk__contacts-item lk-hide">
                    <div>
                        <div class="lk__contacts-label">Тех. поддержка</div>
                        <a href="tel:+71234567891" class="lk__contacts-link">+7(123) 456-78-91</a>
                    </div>
                </div>

                <div class="lk__header-btn">
                    <button class="lk__btn lk__user-btn">Оплатить</button>
                </div>

            </div>

        </div>
    </div>
</div>
