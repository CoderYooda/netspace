let menu = {

    $http: null,

    async init() {

        let menu = document.querySelector('.menu');
        let open = document.querySelector('.open_menu');
        let close = document.querySelector('.close_menu');

        let closeConceptEl = document.querySelector('.concept__close');
        let openConceptNameEl = document.querySelector('.concept__name');

        function closeMenu() {
            menu.classList.remove('show');
        }

        function openMenu() {
            menu.classList.add('show');
        }

        function closeConcept() {
            document.querySelector('.concept__info-mask').classList.remove('show');
        }
        function openConcept() {
            document.querySelector('.concept__info-mask').classList.add('show');
        }

        //let headerNav = document.querySelector('.menu__nav');

        open.addEventListener('click', (event) => {

            openMenu();

        });

        close.addEventListener('click', (event) => {

            closeMenu();

        });

        closeConceptEl.addEventListener('click', (event) => {

            closeConcept();

        });

        openConceptNameEl.addEventListener('click', (event) => {

            openConcept();

        });
        /*
        headerNav.addEventListener('click', (event) => {

            event.preventDefault();

            menu.classList.remove('show');

        });

         */

    }
}

export default menu;