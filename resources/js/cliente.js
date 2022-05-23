
require('./bootstrap');


import Vue from 'vue'
import Vuetify from '../plugins/vuetify';
import 'vuetify/dist/vuetify.min.css'
import VueI18n from 'vue-i18n'
import  {i18n} from  '../plugins/vue-i18n';
window.Vue = require('vue').default;

import 'vuetify/dist/vuetify.min.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import '@mdi/font/css/materialdesignicons.css';
import ZoomOnHover from "vue-zoom-on-hover";
import { dollarFilter } from "../plugins/filters";
import eventBus from '../plugins/events-bus';
import store from '../plugins/store';
import Vuelidate from 'vuelidate';
import VueSession from 'vue-session';
import VueResource from 'vue-resource';


Vue.use(ZoomOnHover);
Vue.use(eventBus);
Vue.use(VueI18n);
Vue.use(Vuetify);

Vue.use(Vuelidate);
Vue.use(require('vue-moment'));
Vue.use(VueSession);
Vue.use(VueResource);

Vue.filter('dollar',dollarFilter);

// General
Vue.component('menu-top-asside', require('./components/MenuTopAssideComponent.vue').default);



// Pagina Web
Vue.component('perfil', require('./components/Auth/PerfilComponent.vue').default);


// Usuarios
Vue.component('cliente', require('./components/Usuarios/ClienteComponent.vue').default);
Vue.component('sys-cart',  require('./components/Sys/SysCartComponent.vue').default);
Vue.component('sys-checkout',  require('./components/Sys/SysCheckoutComponent.vue').default);
Vue.component('sys-formulario-pedido',  require('./components/Sys/SysFormularioPedidoComponent.vue').default);
Vue.component('sys-formulario-envio',  require('./components/Sys/SysFormularioEnvioComponent.vue').default);
Vue.component('sys-resumen-compra',  require('./components/Sys/SysResumenCompraComponent.vue').default);
Vue.component('sys-listado-documento',  require('./components/Sys/SysListadoDocComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    i18n,
    store,
    vuetify: Vuetify,
    session: VueSession,
    icons: {
        iconfont: 'mdiSvg' || 'fa' || 'mdi',
    },
});
