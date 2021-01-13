<div class="container header_container p_rel">
    <div class="row header _header_nav">

        <a href="{{ route('lending') }}" class="header__logo" title="NetSpace - Оператор связи">
            <img src="/images/logo/logo.png" alt="" class="header__logo-img">
        </a>

        <nav class="header__nav">
            @include('lending/includes/header_nav')
        </nav>

        <div class="header__menu open_menu">
            <div class="header__menu-text">Меню</div>

            <div class="burger">
                <span class="burger__line1"></span>
                <span class="burger__line2"></span>
                <span class="burger__line3"></span>
            </div>
        </div>

        <div class="menu">

            <div class="header__menu close_menu">
                <div class="header__menu-text">Меню</div>

                <div class="burger burger_active">
                    <span class="burger__line1"></span>
                    <span class="burger__line2"></span>
                    <span class="burger__line3"></span>
                </div>
            </div>

            <div class="container menu__header">
                <div class="row menu__header_row">

                    <a href="{{ route('lending') }}" class="menu__logo" title="NetSpace">
                        <img src="/images/logo/logo.png" alt="NetSpace" class="header__logo-img">
                    </a>

                    <div class="menu__contacts">
                        @include('lending/includes/contacts')
                    </div>

                </div>
            </div>

            <div class="menu__nav">
                @include('lending/includes/header_nav')
            </div>

            <div class="container menu__footer">
                <div class="row">
                    @include('lending/includes/webstyle')
                </div>
            </div>
        </div>
    </div>
</div>