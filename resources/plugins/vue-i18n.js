import Vue from 'vue'
import VueI18n from 'vue-i18n'

Vue.use(VueI18n);

let lang_init = localStorage.getItem('ecomerce-locale')
if (!lang_init) {
    lang_init = 'es'
    localStorage.setItem('ecomerce-locale', lang_init)
}

const i18n = new VueI18n({
    messages : {
     'es': require('./es'),
     'en': require('./en')
    }, 
    locale: lang_init

})
i18n.locale = lang_init
export {i18n}

