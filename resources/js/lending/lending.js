import Axios from 'axios'
import Store from "./store";

import Hammer from "hammerjs";

import modules from './modules';

const axiosInstance = Axios.create();

axiosInstance.interceptors.response.use(function (response) {

    if (response.data.redirect) {

        location.href = response.data.redirect;
    }
    else if (response.data.message) {

        alert(response.data.message);
    }

    return response;
});

axiosInstance.interceptors.request.use(function (config) {

    const token = document.querySelector('[name="csrf-token"]').content;

    if (config.data instanceof FormData) {

        config.data.append('_token', token);
    }
    else if (config.data instanceof Object && !config.data._token) {

        config.data._token = token;
    }

    return config;
});

!(function() {

    document.body.addEventListener('mousedown', (event) => {

        const target = event.target;

        if (target.closest) {

            const currentShow = target.closest('.esp');

            const shows = document.querySelectorAll('.show.esp');

            for (let i = 0; i < shows.length; ++i) {

                if (currentShow !== shows[i]) {

                    shows[i].classList.remove('show');
                }
            }
        }

    });

    document.addEventListener('keydown', (event) => {

        if (event.key === 'Escape') {

            const shows = document.getElementsByClassName('show');

            for (let i = 0; i < shows.length; ++i) {

                shows[i].classList.remove('show');
            }
        }

    });

    const app = {
        $http: axiosInstance,
        $store: Store,
        modules: {},
        get: function(id) {

            if (!this.modules.hasOwnProperty(id)) {

                console.error('module ' + id + ' not found');
            }

            return this.modules[id];
        }
    };

    for (let i = 0; i < modules.length; ++i) {

        const module = modules[i].default;

        if (module.hasOwnProperty('$http')) {

            module.$http = app.$http;
        }

        if (module.hasOwnProperty('$store')) {

            module.$store = app.$store;
        }

        module.init(app);

        if (module.hasOwnProperty('id')) {

            app.modules[module.id] = module;
        }
    }

})();

let headerNav = document.querySelector('._header_nav');

function setActiveSideBarItem(sectionId) {

    let activeSidebarItem = document.querySelector('.scroll-bar__item.active');

    if (activeSidebarItem) {

        activeSidebarItem.classList.remove('active');
    }

    document.querySelector(`.scroll-bar__item[data-section="${sectionId}"]`)
        .classList.add('active');
}

function changeSection(id, allowHistory = true) {

    let activeSection = document.querySelector('.section.active');

    if (activeSection) {

        if (activeSection.getAttribute('id') === id) {

            return;
        }

        activeSection.classList.remove('active');

        setTimeout(() => {

            activeSection.style.display = 'none';

        }, 450);
    }

    let newActiveSection = document.querySelector('#' + id);

    if (newActiveSection) {

        setTimeout(() => {

            newActiveSection.style.display = 'flex';

            setTimeout(() => {
                newActiveSection.classList.add('active');
            }, 10)

            //activeSection.style.display = 'none';

        }, 500);

    }

    let activeHeaderNavLink = document.querySelector('.header__nav-link.active');

    if (activeHeaderNavLink) {

        activeHeaderNavLink.classList.remove('active');
    }

    document.querySelector(`.header__nav-link[href="#${id}"]`)
        .classList.add('active');

    setActiveSideBarItem(id);

    if (allowHistory) {

        let url = '#' + id;

        history.pushState(id, document.title, url);
    }

    if (id === 'kontakty') {

        document.querySelector('.footer-down').classList.add('show');
    }
    else {

        document.querySelector('.footer-down').classList.remove('show');
    }

    let xd = document.querySelector('.menu.show');

    if (xd) {

        xd.classList.remove('show');
    }
}

window.onpopstate = (event) => {

    if (event.state) {

        changeSection(event.state, false);
    }
    else {

        changeSection('o-nas', false);
    }
}

headerNav.addEventListener('click', (event) => {

    if (event.target.classList.contains('header__nav-link')) {

        let target = event.target;

        event.preventDefault();

        let id = target.getAttribute('href');

        id = id.replace('#', '');

        changeSection(id);

    }

});

let scrollBar = document.querySelector('.scroll-bar');

scrollBar.addEventListener('click', (event) => {

    let target = event.target;

    if (target.classList.contains('scroll-bar__item')
        && !target.classList.contains('active')) {

        changeSection(target.getAttribute('data-section'));
    }

});

if (location.hash) {

    let id = location.hash.replace('#', '');

    changeSection(id, false);
}
else {

    changeSection('o-nas', false);
}

function prevSection() {

    let active = document.querySelector('.scroll-bar__item.active');

    if (active.previousElementSibling) {

        changeSection(active.previousElementSibling.getAttribute('data-section'));
    }
}

function nextSection() {

    let active = document.querySelector('.scroll-bar__item.active');

    if (active.nextElementSibling) {

        changeSection(active.nextElementSibling.getAttribute('data-section'));
    }
}

let isLockedScroll = false;

document.body.addEventListener('mousewheel', (event) => {

    if (isLockedScroll) return;

    let delta = event.deltaY || event.detail;

    if (delta > 0) {

        nextSection();
    }
    else {

        prevSection();
    }

    isLockedScroll = true;

    setTimeout(() => {

        isLockedScroll = false;

    }, 2000);

});

if (window.outerWidth < 500) {

    let hammerElement = document.querySelector('.main-wrapper'); // todo

    let hammertime = new Hammer(hammerElement);

    hammertime.get('swipe').set({
        direction: Hammer.DIRECTION_ALL
    });

    hammertime.on('swipe', (event) => {

        if (isLockedScroll) return;

        switch(event.direction) {
            case Hammer.DIRECTION_LEFT:
                nextSection();
                break;
            case Hammer.DIRECTION_RIGHT:
                prevSection();
                break;
            case Hammer.DIRECTION_UP:
                nextSection();
                break;
            case Hammer.DIRECTION_DOWN:
                prevSection();
                break;
        }

        isLockedScroll = true;

        setTimeout(() => {

            isLockedScroll = false;

        }, 1000);
    });
}

window.addEventListener('keydown', (event) => {

    if (isLockedScroll) return;

    let code;

    if (event.key !== undefined) {
        code = event.key;
    } else if (event.keyIdentifier !== undefined) {
        code = event.keyIdentifier;
    } else if (event.keyCode !== undefined) {
        code = event.keyCode;
    }

    switch(code) {
        case 'ArrowLeft':
            prevSection();
            break;
        case 'ArrowRight':
            nextSection();
            break;
        case 'ArrowUp':
            prevSection();
            break;
        case 'ArrowDown':
            nextSection();
            break;
    }

    isLockedScroll = true;

    setTimeout(() => {

        isLockedScroll = false;

    }, 1000);

})