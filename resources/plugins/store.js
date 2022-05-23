import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)



const store = new Vuex.Store({
    state: {
        count: 0,
        descuento_porcentual: 0,
        descuento_valor: 0,
        id: '',
        es_name: '',
        en_name: '',
        attr_es_name: '',
        attr_en_name: '',
        cantidad: 0,
        precio: 0,
        subtotal: 0,
        total: 0,
        image: '',
        id_attr: '',
        cod_tempo: '',

        costo_envio: 0,
        tipo_envio: 3,
        costo_envio_mensaje: '',
        form_checkout_id: false,
        form_checkout_shipping: true,
        form_checkout_payment: true,
        menu_select: '',
        producto: '',
        
    },

    mutations: {
        calcTotal(state){
            state.total = parseFloat(state.subtotal) - parseFloat(state.descuento_valor) + parseFloat(state.costo_envio) 
       
        },
        changeMenu(state){
            document.getElementById(state.menu_select).classList.add('font-weight-black')
        
        },
        
        envioGratuito(state){
            if (state.total>5000 && state.tipo_envio == 1){
            state.costo_envio_mensaje = "Envío Gratuito" 
        } else {
            state.costo_envio_mensaje = "" 

        }
    },

        calcularCarro(state, payload ={}, form ){
            const items = JSON.parse(localStorage.getItem(form))
            let subtotal = 0
            let cantidad = 0
            let descuento_porcent = 0
            let descuento_valor = 0
            let total = 0
           
            if(items)
                items.forEach(element => {
                    subtotal+= parseFloat(element.total)
                    cantidad+= parseFloat(element.cantidad)
                }); 

            if(payload)
                payload.forEach(element => { if (subtotal > element.base) descuento_porcent = element.descuento})
      
            descuento_valor = (subtotal * descuento_porcent / 100)
            total = parseFloat(subtotal) - parseFloat(descuento_valor)
            
            state.descuento_porcentual = descuento_porcent
            state.descuento_valor = descuento_valor
            state.subtotal = subtotal
            state.total = total
            state.cantidad = cantidad
            state.tipo_envio = 3
        }

    }
})

export default store
