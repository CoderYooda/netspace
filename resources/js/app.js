require('./bootstrap');
import Vue from 'vue';
import App from './components/App'
import router from './router';

window.app_version = 1;
Vue.prototype.$eventBus = new Vue();

Vue.prototype.saveToLocalStorage = (key, value, json = true)=>{
    if(json)
        value = JSON.stringify(value);
    localStorage.setItem(key, value);
};

Vue.prototype.getFromLocalStorage = (key)=>{
    let val = localStorage[key];
    return val ? JSON.parse(val) : null;
};

Vue.prototype.removeFromLocalStorage = (key)=>{
    return localStorage.removeItem(key);
};

let app = new Vue({
    router,
    render: h => h(App)
}).$mount('#app');


// window.axios.interceptors.request.use(function (request){
//     console.log(request);
//     let token = localStorage['api_token'];
//     if (token) {
//         request.headers.common['Authorization'] = 'Bearer ' + token;
//     } else {
//         console.warn('API токен не выдан, возможно Вы не авторизованы в системе');
//     }
//     return request;
// });



window.axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if (error.response && error.response.status === 401 || error.response && error.response.status === 419) {
        app.$eventBus.$emit('NoAuthEvent', true);
    }
    if (error.response && error.response.status === 429 ) {
        app.$eventBus.$emit('TooManyAttempts', true);
    }
    return Promise.reject(error);
}, function(e){

});
