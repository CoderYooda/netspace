<div class="modal-mask"> {{-- сюда show --}}
    <div class="modal">

        <div class="modal-body">

            <div class="modal__form"> {{-- Если письмо отправлено успешно сюда .form_hide --}}

                <div class="modal-close">&times;</div>

                <div class="modal-title">Вызов мастера</div>

                <p class="lk__text-style">
                    Для вызова специалиста оставьте заявку в форме обратной связи
                </p>

                <div class="modal__offset">
                    <div class="lk__input-wrap">
                        <label for="help_name" class="lk__label">
                            ФИО<span class="star">*</span>
                        </label>
                        <input type="text" id="help_name" name="name" class="lk__input">

                        <div class="lk__errors">
                            Ошибка
                        </div>
                    </div>

                    <div class="lk__input-wrap">
                        <label for="help_phone" class="lk__label">
                            Телефон<span class="star">*</span>
                        </label>
                        <input type="tel" id="help_phone" name="phone" class="lk__input">

                        <div class="lk__errors">
                            Ошибка
                        </div>
                    </div>
                </div>

                <button class="lk__btn btn_disabled" disabled>Отправить сообщение</button>

            </div>

            <div class="form-success"> {{-- Если письмо отправлено успешно сюда .show --}}
                <div class="form-success__title">Спасибо за обращение</div>

                <p class="lk__text-style">
                    В ближайшее время с вами свяжится <br> специалист для уточнения подробностей.
                </p>

            </div>

        </div>

    </div>
</div>
