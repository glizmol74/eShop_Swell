
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
Vue.component('sys-header', require('./components/Sys/SysHeaderComponent.vue').default);
Vue.component('Menu', require('./components/Sys/Menu.vue').default);
Vue.component('MenuItem', require('./components/Sys/MenuItem.vue').default);
Vue.component('MenuItems', require('./components/Sys/SysMenuItem.vue').default);
Vue.component('sys-footer', require('./components/Sys/SysFooterComponent.vue').default);
Vue.component('sys-index', require('./components/Sys/SysIndexComponent.vue').default);
Vue.component('sys-carrousel-banner', require('./components/Sys/SysCarrouselBannerComponent.vue').default);
Vue.component('sysgridhome', require('./components/Sys/SysGridCategoriasComponent.vue').default);
Vue.component('sys-nosotros', require('./components/Sys/SysNosotrosComponent.vue').default);
Vue.component('syscontacto',  require('./components/Sys/SysContactoController.vue').default);
Vue.component('syscontactof',  require('./components/Sys/SysContactoFormulario.vue').default);
Vue.component('sys-cobranding',  require('./components/Sys/SysCobrandingComponent.vue').default);
Vue.component('sys-comocomprar',  require('./components/Sys/SysComoComprarComponent.vue').default);
Vue.component('sys-envio',  require('./components/Sys/SysEnviosComponent.vue').default);
Vue.component('sys-category',  require('./components/Sys/SysCategoryComponent.vue').default);
Vue.component('sys-banner-superior',  require('./components/Sys/SysBannerSuperiorComponent.vue').default);
Vue.component('sys-items',  require('./components/Sys/SysItemsComponent.vue').default);
Vue.component('sys-items-destacados',  require('./components/Sys/SysItemsDestacadosComponent.vue').default);
Vue.component('sys-products',  require('./components/Sys/SysProductsComponent.vue').default);


Vue.component('sys-cart',  require('./components/Sys/SysCartComponent.vue').default);


//administrador de sistemas

// Administrador de sistemas
Vue.component('clientes', require('./components/Backend/ClientesComponent.vue').default);
Vue.component('banners', require('./components/Backend/BannersComponent.vue').default);
Vue.component('categorias', require('./components/Backend/CategoriasComponent.vue').default);
Vue.component('listadoproductos', require('./components/Backend/ListadoProductosComponent.vue').default);
Vue.component('listadodocumentos', require('./components/Backend/ListadoDocComponent.vue').default);
Vue.component('productoatributo', require('./components/Backend/ProductoAtributosComponent.vue').default);
Vue.component('productocategoria', require('./components/Backend/ProductoCategoriasComponent.vue').default);
Vue.component('productogeneral', require('./components/Backend/ProductoGeneralComponent.vue').default);
Vue.component('productos', require('./components/Backend/ProductosComponent.vue').default);
Vue.component('empresa', require('./components/Backend/EmpresaComponent.vue').default);
Vue.component('atributos', require('./components/Backend/AtributosComponent.vue').default);
Vue.component('perfiles', require('./components/Backend/PerfilesComponent.vue').default);
Vue.component('roles', require('./components/Backend/RolesComponent.vue').default);
Vue.component('menues', require('./components/Backend/MenuesComponent.vue').default);

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
    // icons: {
    //     iconfont: 'mdiSvg' || 'fa' || 'mdi',
    // },
});
