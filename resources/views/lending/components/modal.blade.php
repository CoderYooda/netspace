<div id="modal" class="modal">

    <div class="modal__container">
        <div class="modal__close">&times;</div>

        <div class="modal__body">

            <div class="form __form">
                <div class="modal__title modal__title_style"></div>

                <p class="text-style18 text_black">
                    Вы всегда можете получить бесплатную консультацию от нашего специалиста
                </p>

                <div class="form__content">
                    <div class="form__group">
                        <label class="label">Имя</label>
                        <input type="text" id="_modal_name" name="name" class="input">
                        <div id="_modal_name_err" class="input_err"></div>
                    </div>

                    <div class="form__group">
                        <label class="label">Телефон</label>
                        <input type="tel" id="_modal_phone" name="phone" class="input">
                        <div id="_modal_phone_err" class="input_err"></div>
                    </div>

                    <div class="form__group">
                        <label class="label">Населенный пункт</label>
                        <input type="text" id="_modal_city" name="city" class="input">
                        <div id="_modal_city_err" class="input_err"></div>
                    </div>

                    <div class="personal-data">
                        Согласен с обработкой
                        <a href="{{ route('policy') }}" class="personal-data__link" target="_blank" rel="noopener">персональных данных</a>
                    </div>

                    <div class="form__group form__group_last">
                        <button class="btn btn_blue form__btn w100 _modal_submit">Отправить</button>
                    </div>
                </div>
            </div>

            <div id="_modal_success" class="form-success form-success_hide">
                <div class="modal__title_style">Заявка принята</div>

                <p class="text-style18 text_black">
                    Мы вам скоро позвоним
                </p>
            </div>

        </div>

    </div>
</div>