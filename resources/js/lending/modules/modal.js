let modalModule = {

    $http: null,

    async init() {

        const modal = document.getElementById('modal');

        if (!modal) return;

        function openModal() {

            /*
            if (window.innerWidth > 500) {
                document.body.style.overflowY = 'hidden';
                document.body.style.paddingRight = '16px';
            }

             */

            const firstInput = modal.querySelector('#_modal_name');

            if (firstInput && window.innerWidth > 500) {

                setTimeout(() => {

                    firstInput.focus();

                }, 250);
            }
        }

        function closeModal() {

            if (window.innerWidth > 500) {

                setTimeout(() => {

                    document.body.style.overflowY = 'auto';
                    document.body.style.paddingRight = '0';
                }, 250);
            }
        }

        modal.addEventListener("click", function (event) {

            event.stopPropagation();

            if (event.target === modal) {

                this.classList.remove('show');

                closeModal();
            }

        });

        const submitBtn = document.querySelector('._modal_submit');

        modal.addEventListener("keypress", function (event) {

            let code;

            if (event.key !== undefined) {
                code = event.key;
            } else if (event.keyIdentifier !== undefined) {
                code = event.keyIdentifier;
            } else if (event.keyCode !== undefined) {
                code = event.keyCode;
            }

            if (code === "Enter") {

                submitBtn.click();
            }
        });

        const modalCloseBtn = document.getElementsByClassName('modal__close');

        for (let i = 0; i < modalCloseBtn.length; ++i) {

            modalCloseBtn[i].addEventListener('click', function () {

                const modal = this.closest('.modal');

                modal.classList.remove('show');

                closeModal();

            });
        }

        const modalOpeners = document.getElementsByClassName('_modal_open');

        if (modalOpeners.length) {

            for (let i = 0; i < modalOpeners.length; ++i) {

                modalOpeners[i].addEventListener('click', function (event) {

                    event.stopPropagation();

                    modal.classList.add('show');

                    const elemModalTitle = modal.querySelector('.modal__title');

                    elemModalTitle.innerText = this.getAttribute('data-modal-title');

                    submitBtn.setAttribute('data-action', this.getAttribute('data-action'));

                    if (this.hasAttribute('data-product-id')) {

                        submitBtn.setAttribute('data-product-id', this.getAttribute('data-product-id'));
                    }
                    else {

                        submitBtn.removeAttribute('data-product-id');
                    }

                    openModal();

                });
            }
        }

        const nameInput = document.getElementById('_modal_name');
        const phoneInput = document.getElementById('_modal_phone');
        const cityInput = document.getElementById('_modal_city');


        const preloader = document.getElementById('preloader');

        const fields = ['name', 'phone', 'city'];

        submitBtn.addEventListener('click', async (event) => {

            const target = event.target;

            const action = target.getAttribute('data-action');

            if (!nameInput.value) {

                nameInput.classList.add('is-invalid');
                return;
            }
            else {

                nameInput.classList.remove('is-invalid');
            }

            if (!phoneInput.value) {

                phoneInput.classList.add('is-invalid');
                return;
            }
            else {

                phoneInput.classList.remove('is-invalid');
            }

            if (!cityInput.value) {

                cityInput.classList.add('is-invalid');
                return;
            }
            else {

                cityInput.classList.remove('is-invalid');
            }

            target.setAttribute('disabled', 'disabled');

            const form = {
                name: nameInput.value,
                phone: phoneInput.value,
                city: cityInput.value,
            };

            if (target.hasAttribute('data-product-id')) {

                form.productId = parseInt(target.getAttribute('data-product-id'));
            }

            preloader.classList.add('show');

            const response = await this.$http.post(action, form);

            preloader.classList.remove('show');

            if (response.data.success) {

                document.querySelector('.__form').classList.add('form_hide');

                document.getElementById('_modal_success').classList.remove('form-success_hide');

                setTimeout(() => {

                    modal.classList.remove('show');

                    closeModal();

                    if (target.classList.contains('_modal_submit')) {

                        setTimeout(() => {

                            document.querySelector('.__form').classList.remove('form_hide');

                            document.getElementById('_modal_success').classList.add('form-success_hide');

                            nameInput.value = null;
                            phoneInput.value = null;
                            cityInput.value = null;

                            target.removeAttribute('disabled');

                        }, 500);

                    }

                }, 3000);

                /*if (target.classList.contains('_modal_submit')) {

                    setTimeout(() => {

                        document.querySelector('.__form').classList.remove('form_hide');

                        document.getElementById('_modal_success').classList.add('form-success_hide');

                        nameInput.value = null;
                        phoneInput.value = null;

                        target.removeAttribute('disabled');

                    }, 5000);

                }*/
            }
            else if (response.data.errors) {

                const errors = response.data.errors;

                for (let i = 0, elem = null; i < fields.length; ++i) {

                    elem = document.getElementById('_modal_' + fields[i] + '_err');

                    elem.title = elem.innerText = errors.hasOwnProperty(fields[i]) ? errors[fields[i]] : null;
                }

                target.removeAttribute('disabled');
            }

        });
    }

};

export default modalModule;


