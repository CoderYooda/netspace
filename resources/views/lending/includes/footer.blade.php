<div class="container footer">
    <div class="row footer_row">
        <a href="/lc/login" class="footer__cabinet footer__link" target="_blank" rel="noopener">
            <span class="footer__cabinet-text">Личный кабинет</span>
        </a>

        <div class="footer__contacts">
            @include('lending/includes/contacts')
        </div>
    </div>
</div>

<div class="footer-down">
    <div class="container w100">
        <div class="row footer_row">
            <div class="footer-down__copyright">
                © 2013 - {{ now()->year }} НЕТСПЕЙС — интернет провайдер
            </div>

            @include('lending/includes/webstyle')
        </div>
    </div>
</div>
