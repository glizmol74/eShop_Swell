<template>
    <v-navigation-drawer v-model="drawer" right app clipped class="cart" temporary hide-overlay>
        <template v-slot:prepend>
            <v-list-item-content>
                <div class="d-flex justify-end">
                    <v-btn aria-label="Close" icon @click="drawer = false"><v-icon>mdi-close</v-icon></v-btn>
                </div>
                <div class="d-flex justify-center">
                    <h4 v-if="resumen.id === 'new'">{{$t('m.cartipo_n')}}</h4>
                    <h4 v-else>{{$t('m.cartipo_e')}} {{resumen.id}} - {{resumen.tempo}}</h4>
                </div>
                
                <div class="d-flex justify-around text-center cabecera">
                    <v-list-item-title class="text-uppercase">{{$t('m.item')}} </v-list-item-title>
                    <v-list-item-title class="text-uppercase">{{$t('m.amount')}} </v-list-item-title>
                </div>
            </v-list-item-content>
        </template>
        <v-divider></v-divider>
        <v-list>
            <v-list-item v-for="item in items" :key="item.atributo">
                <v-list-item-content class="">
                    <v-row>
                        <v-col cols="2" md="2" class="d-flex justify-space-around">
                            <div>
                                <v-img :src="item.image" aspect-ratio="1" contain width="100px"></v-img>
                            </div>
                        </v-col>

                        <v-col cols="6" md="6">
                            <v-list-item-content class="p-0 m-0 font-weigth-bold"><h6>
                                <a v-if="$i18n.locale ==='es'" :href="`/products/${item.id}`" style="text-decoration:none; color:black">{{item.es_name}} : {{item.attr_es_name }} </a>
                                <a v-else :href="`/products/${item.id}`" style="text-decoration:none; color:black">{{item.en_name}} : {{item.attr_nom }} </a>
                                </h6>
                            </v-list-item-content>

                            <v-list-item-content class="p-0 m-0 body-2">
                               {{$t('m.unitary')}} : {{ item.precio | dollar }}
                            </v-list-item-content>
                            

                            <v-text-field v-model="item.cantidad"
                                        class="p-0 campo_cantidad"
                                        dense
                                        outlined
                                        prepend-icon="mdi-minus-circle-outline"
                                        append-outer-icon="mdi-plus-circle-outline"
                                        @click:append-outer="sumCant(item)"
                                        @click:prepend="minCant(item)"
                                        @keyup.enter="addCant(item)"
                                        @keyup="addCant(item)"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="4">
                            <div class="d-flex flex-row justify-end align-center">
                                <div class="font-weight-black">{{ item.total | dollar }} </div>
                                <div class="ml-4">
                                    <v-btn small icon color="red" @click="eliminar(item)">
                                        <v-icon>mdi-trash-can-outline</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                    <v-divider />
                </v-list-item-content>
            </v-list-item>

            <div class="px-4 py-2">
                <div v-if="total_general>0" class="d-flex justify-space-between title font-weight-black pink lighten-3 my-2 py-4">
                    <div class="ml-4">{{ $t('m.subtotal') | uppercase}}</div>
                    <div class="mr-4">{{ subtotal_general | dollar}} </div>
                </div>

                <div v-if="descuento_valor>0" class="d-flex justify-space-between title font-weight-black green lighten-4 my-2 py-4">
                    <div class="ml-4"> {{$t('m.discount') | uppercase }} ({{descuento_porcentual}}%) </div>
                    <div class="mr-4"> {{descuento_valor | dollar}} </div>
                </div>

                <div class="d-flex justify-space-between title font-weight-black pink lighten-4 my-5 py-4" >
                    <!-- <div class="ml-4"> 
                        <v-checkbox v-model="opciva" color="pink" :label="`IVA ( ${iva_porcentual} % )`" class="pa-0"></v-checkbox> 
                    </div> -->
                    <div class="ml-4">{{'IVA'}} ( {{iva_porcentual | round 2 }} % ) </div>
                    <div class="mr-4"> {{iva_valor | dollar}} </div>
                </div>

                <div class="d-flex justify-space-between title font-weight-black py-4 border-black">
                    <div class="ml-4"> {{$t('m.total') | uppercase}} </div>
                    <div class="mr-4"> {{ total_general | dollar }} </div>
                </div>

                <v-btn v-if="total_general>0" color="pink" dark large relative block href="/checkout" style="text-decoration:none" class="mt-4"> {{$t('m.go_checkout')}} </v-btn>
                <v-btn color="pink" outlined large relative block @click="seguir()" class="mt-4"> {{$t('m.keep_buying')}} </v-btn>
                <v-btn v-if="total_general>0" color="pink lighten-1"  outlined large relative block class="mt-4" @click="vaciarCarro()" > {{$t('m.empty_cart')}} </v-btn>
                <v-btn v-if="resumen.id != 'new'" color="pink lighten-1" style="margin-bottom:100px" outlined large relative block class="mt-4" @click="cancelarCarro()" > {{$t('m.cartipo_x')}} </v-btn>
            </div>
        </v-list>
    </v-navigation-drawer>    
</template>

<script>
import { mapState } from 'vuex'

export default {
    name: 'Cart',
    props: {
        verDrawer: {type: Boolean, required: true},
    },
    data() {
        return {
            items: [],
            newForm: [],
            descuento: [],
            drawer: this.verDrawer,
            id_user: 0,
            txtForm: '',
            total_general: 0,
            subtotal_general: 0,
            iva_valor:0,
            iva_porcentual: 21,
            opciva: true,
            resumen: {id: 'new', subtotal: '', iva: '', tax: '', descuento_p: '', descuento_v:'', envio: '', 
                      total: '', obsv: '', tempo: ''},
            text: '',
        }
    },

    computed: mapState(['descuento_porcentual', 'descuento_valor', 'subtotal', 'costo_envio', 'cantidad', 'total', 'precio']),

    created() {
        let res = null
        this.id_user = this.$session.get('u-id')
        this.txtForm = 'newform_'+this.id_user
        this.items = JSON.parse(localStorage.getItem(this.txtForm))
        
        //this.CalcSubtotal()
    },

    watch: {
        verDrawer() {
            let res = null
            this.drawer = this.verDrawer
            this.items = JSON.parse(localStorage.getItem(this.txtForm))
            if ( this.items != null ) {
                res = JSON.parse(localStorage.getItem('resumen'))
                if ( res == null)
                    this.resumen.id = 'new'
                else {
                    this.resumen.id = res.id
                    this.resumen.tempo = res.tempo
                    this.resumen.obsv = res.obsv
                 }
                this.CalcSubtotal()
            }
        
        },

        drawer() {
            this.$emit('closeDrawer', this.drawer)
        },

        'opciva': function ( ){
            
                this.CalcSubtotal()
            
        },
    },

    methods: {
        CalcSubtotal() {
            this.total_general = 0
            this.subtotal_general = 0
            this.iva_valor = 0
            this.resumen.descuento_v = 0
            this.resumen.descuento_p = 0
            this.$store.commit('calcularCarro', this.descuento, this.txtForm)
            this.items.forEach(element => {
                this.total_general+= element.total
                this.subtotal_general+= element.total
                if ( this.opciva) {
                    element.tax = this.iva_porcentual
                } else {
                    element.tax = 0
                }
            });
            if ( this.opciva) {
                this.iva_valor = this.subtotal_general * this.iva_porcentual / 100
                this.total_general+= this.iva_valor
            } else {
                this.iva_valor = 0
            }

            this.resumen.subtotal = this.subtotal_general
            this.resumen.iva = this.iva_valor
            this.resumen.tax = this.iva_porcentual
            this.resumen.total = this.total_general

            this.saveProducto()
            
        },

        saveProducto() {
            const parsed = JSON.stringify(this.items)
            const param = JSON.stringify(this.resumen)
            localStorage.setItem(this.txtForm, parsed)
            localStorage.setItem('resumen', param)
        },

        sumCant( item ) {
            if ( item.cantidad < 0 )
                item.cantidad = 1
            else {
                item.cantidad++
                item.total = item.cantidad * item.precio
            }
            this.saveProducto()
            this.CalcSubtotal()
        },

        minCant(item) {
            item.cantidad--
            if ( item.cantidad < 0)
                item.cantidad = 0
            item.total = item.cantidad * item.precio
            this.saveProducto()
            this.CalcSubtotal()
        },

        addCant(item) {
            item.total = item.cantidad * item.precio
            this.saveProducto()
            this.CalcSubtotal()
        },

        cancelarCarro() {
            this.resumen.id = 'new'
            this.resumen.obsv = ''
            this.resumen.tempo = ''
            this.vaciarCarro()
        },

        vaciarCarro() {
            //localStorage.clear()
            //localStorage.setItem('ecomerce-locale', this.$i18n.locale)
            localStorage.removeItem(this.txtForm)
            //localStorage.removeItem('resumen')
            const tama = this.items.length
            this.items.splice(0,tama)
            
            this.resumen.descuento_p = 0
            this.resumen.descuento_v = 0
            this.resumen.envio = 0
            this.resumen.iva = 0
            this.resumen.subtotal = 0
            this.resumen.tax = 0
            this.resumen.total = 0
            this.saveProducto()
            this.CalcSubtotal()
            this.$store.state.descuento_porcentual = 0
            this.$store.state.descuento_valor = 0
            this.$store.state.subtotal = 0
            this.$store.state.total = 0
            this.$store.state.cantidad = 0
            this.$store.state.tipo_envio = 0
            this.total_general = 0
            this.subtotal_general = 0
            this.iva_valor = 0         
        },

        eliminar(item) {
            const index = this.items.findIndex((i) => i.id === item.id)
            this.items.splice(index,1)
            this.saveProducto()
            this.CalcSubtotal()
        },

        seguir() {
            let ruta = window.location.pathname
            ruta = ruta.split('/')
            let tama = ruta.length -1
            this.drawer = !this.drawer
            if ( ruta[tama] == 'documentos')
                window.location.href = '/'
           
        },
    },
}
</script>

<style scoped>
    .cart {
        z-index: 3000;
        width: 45%!important;
    }

    .border-black{
        border: 1px solid black;
    }

    @media only screen and (max-width: 960px) {
        .cart {
            width: 100%!important;
        }

        .cabecera {
            visibility: hidden;
        }

        .campo_cantidad {
            width: 100%;
        }
    }
</style>
