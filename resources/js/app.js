/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
// global.$ = require('bootstrap-datepicker');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('form-component', require('./components/main_form/Form.vue').default);
Vue.component('form-recursive-categories', require('./components/main_form/FormRecursiveCategories.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




const app = new Vue({
    el: '#app',
});


// $.widget.bridge('uibutton', $.ui.button);

$(function(){
    //2. Получить элемент, к которому необходимо добавить маску
    $("#phone").mask("+7 (999) 999-99-99");
});


var ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
// $('#phone').mask('+0 (000) 000 00 00', {placeholder: "+_ (___) ___ __ __"});
ClassicEditor
    .create(document.querySelector('#pr_description'))
    .catch(error => {
        console.error(error);
    });
ClassicEditor.create(document.querySelector('#description'))
    .catch(error => {
        console.error(error);
    });
