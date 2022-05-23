<template>
    <div>
        <v-snackbar v-model="snackbar" top right :timeout="4000" :color="color">
            {{ text }}
            <v-btn color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>

        
        <v-card class="mt-5">
                <v-row justify="center">
                    <h3 v-if="resumen.id === 'new'" class="display-1 ml-1 my-2"> {{$t('m.checkout') | uppercase}} </h3>
                    <h3 v-else class="display-1 ml-1 my-2"> {{$t('m.checkout2') | uppercase}} {{resumen.id}} - {{resumen.tempo}} </h3>
                </v-row>
                <v-divider></v-divider>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" md="8">
                            <h5>
                                <v-icon class="pr-2">mdi-account</v-icon> {{$t('m.id')}}
                                <v-btn v-if="form_checkout_id" @click="formCheckoutId()" class="float-right" small text elevation=0>
                                    Editar
                                    <v-icon small class="mx-2">mdi-pencil</v-icon>
                                </v-btn>
                            </h5>
                            <sys-formulario-pedido />
                            
                        </v-col>

                        <v-col cols="12" md="4">
                            <h5>
                                <v-icon class="pr-4">mdi-truck-fast</v-icon> {{$t('m.shipping_address')}}
                                <v-btn v-if="form_checkout_id" @click="formCheckoutShipping()" class="float-right" small text elevation=0>
                                    Editar
                                    <v-icon small class="mx-2">mdi-pencil</v-icon>
                                </v-btn>
                            </h5>
                            <sys-formulario-envio />
                            <v-divider />

                            <h5>
                                <v-icon class="pr-4">mdi-credit-card</v-icon>{{$t('m.payment')}}
                            </h5>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-divider />

                <v-col cols="12" sm="12">
                    <v-text-field v-model="obsv"
                            :label="$t('m.obsv')"
                            outlined
                            type="text"
                    ></v-text-field>
                </v-col>
                <v-card-text>
                    <v-row justify="center">
                        <h5><v-icon class="pr-4">mdi-cart</v-icon> {{$t('m.summary')}}</h5>
                    </v-row>
                    <v-row>
                        <v-col cols="12" sm="12">
                            <sys-resumen-compra class="mt-1" />
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-divider></v-divider>
                <div class="px-4 py-0">
                    <v-card class="d-flex justify-end mb-2 align-self-center"
                                    color="grey lighten-4"
                                    flat
                                    tile>
                        <v-card class="pa-3 text-h6 align-self-center text-right" width="180" outlined tile>{{$t('m.subtotal')}}</v-card>
                        <v-card class="pa-3 text-overline align-self-center text-right" width="150" outlined tile>{{resumen.subtotal | dollar | round 2}}</v-card>
                    </v-card>
                </div>

                <div class="px-4 py-0">
                    <v-card class="d-flex justify-end mb-2 align-self-center"
                                    color="grey lighten-4"
                                    flat
                                    tile>
                        <v-card class="pa-3 text-h6 align-self-center text-right" width="180" outlined tile>{{'IVA ('}} {{resumen.tax}} {{' % )'}}</v-card>
                        <v-card class="pa-3 text-overline align-self-center text-right" width="150" outlined tile>{{resumen.iva | dollar | round 2}}</v-card>
                    </v-card>
                </div>

                <div class="px-4 py-0">
                    <v-card class="d-flex justify-end mb-2 align-self-center"
                                    color="grey lighten-4"
                                    flat
                                    tile>
                        <v-card class="pa-3 text-h6 align-self-center text-right" width="180" outlined tile>{{$t('m.total')}}</v-card>
                        <v-card class="pa-3 text-overline align-self-center text-right" width="150" outlined tile>{{resumen.total | dollar | round 2}}</v-card>
                    </v-card>
                </div>
                <v-divider></v-divider>

                <div class="px-4 py-2">
                    <v-card>
                        <v-card-text class="d-flex justify-end">
                            <v-card-actions>
                                <v-btn class="mx-5" color="cyan" small @click="regresar()"><v-icon>mdi-undo</v-icon> Regresar </v-btn>
                                <v-btn class="mx-5" color="cyan" small @click="totalizar()"><v-icon>shopping_cart</v-icon> Finalizar</v-btn>
                            </v-card-actions>
                        </v-card-text>
                    </v-card>
                </div>
        </v-card>
        
            <v-dialog v-model="pedidoOk" max-width="75%" persistent>
                <v-card>
                    <v-card-text class="d-flex justify-center">
                        <v-row justify="center">
                            <v-col cols="12" class="">
                                <h1 class="mt-10"> {{$t('m.order_complete')}}</h1>
                                <h2 class="mt-10"> {{$t('m.thanks_order')}} </h2>
                            </v-col>
                        </v-row>
                    </v-card-text>

                    <v-card-text>
                        <v-col cols="12">
                            <p>{{$t('m.ped1')}}</p>
                            <p>{{$t('m.ped2')}}</p>
                            <p>{{$t('m.ped3')}} <a href="/cliente/documentos">{{$t('m.ped4')}} </a></p>
                            <p>{{$t('m.ped5')}} <v-btn text color="cyan" @click="regresar()">{{$t('m.ped4')}}</v-btn> </p> 
                        </v-col>
                    </v-card-text>
                </v-card>
                    
            </v-dialog>
        
    </div>
    
</template>

<script>
import  { mapState } from 'vuex'

export default {
    data() {
        return {
            text: '',
            color: '',
            snackbar: false,
            valor_envio: '',
            pago: false,
            envio: false,
            costo_envio: 0,
            modal_pago: false,
            modal: { title: '', text: '', typeAlert: ''},
            fechaEntrega: '',
            obsv: '',
            resumen: [],
            datosC: [],
            items: [],
            id_user: 0,
            textForm: '',
            pedidoOk: false,
            preven: '',
            a:0,
        }
    },

    created() {
        this.id_user = this.$session.get('u-id')
        this.txtForm = 'newform_'+this.id_user
        this.$i18n.locale =  this.$session.get('idioma')
        this.items = JSON.parse(localStorage.getItem(this.txtForm))
        this.resumen = JSON.parse(localStorage.getItem('resumen'))
        this.datosC = JSON.parse(localStorage.getItem('formdata'))
        this.obsv = this.resumen.obsv

    },

    computed: mapState(['form_checkout_id', 'form_checkout_shipping', 'form_checkout_payment']),

    methods: {
        formCheckoutId() {
            this.$store.state.form_checkout_id = false
            this.$store.state.form_checkout_shipping = true
            this.$store.state.form_checkout_payment = true
        },

        formCheckoutShipping() {
            this.$store.state.form_checkout_id = true
            this.$store.state.form_checkout_shipping = false
            this.$store.state.form_checkout_payment = true
        },

        formCheckoutPayment() {
            this.$store.state.form_checkout_id = true
            this.$store.state.form_checkout_shipping = true
            this.$store.state.form_checkout_payment = false
        },

        pagoComplete(id) {
            this.modal = id
            this.modal_pago = true
        },

        cerrarPedido() {
            this.modal_pago= false

        },

        regresar() {
            window.history.back()

        },

        totalizar() {
            if (this.resumen.id == 'new')
                this.a = 0
            else    
                this.a = 2

            const params = { tipo: 'PED', numero: this.resumen.id, fecha: this.datosC.fecha, entrega: this.datosC.fecEntrega,
                             estado: this.a, cliente: this.datosC.id, subtotal: this.resumen.subtotal, descuento_p: this.resumen.descuento_p,
                             descuento_v: this.resumen.descuento_v, tax: this.resumen.tax, iva: this.resumen.iva, total: this.resumen.total,
                             envio: this.resumen.envio, pago:0, obsv: this.obsv, items: this.items, idioma: this.$i18n.locale, 
                             destinatario: this.datosC.correo, id: this.resumen.id }
            axios.post(`/cliente/documentos`, params)
                .then( res => {
                    if ( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                        this.pedidoOk = true

                    } else {
                        localStorage.removeItem(this.txtForm)
                        localStorage.removeItem('resumen')
                        
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        
                        //window.history.back()
                        this.pedidoOk = true
                    }
                })
                .catch( error => {
                    this.console.log(error.response)
                    this.text = 'Hubo un error General al Finalizar el Pedido'
                    this.color = 'error'
                    this.snackbar = true 
                })
        },
    },
}
</script>

<style>
    .azul--text {
        color: #003b55;
    }
    .contacto {
        position: absolute;
        right: 5%;
        top: 15px;
        z-index: 1000;
    }
</style>