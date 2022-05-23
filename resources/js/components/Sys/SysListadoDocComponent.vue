<template>
    <div class="container">
        <!-- Alerta -->
        <v-snackbar v-model="snackbar" top right :timeout="5000" :color="color">
            {{ text }}
            <v-btn :color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>
        <!-- Fin Alerta -->

        <!-- Formulario de Pedido -->
        <v-dialog v-model="pedidoModal" max-width="85%" persistent>
            <v-card>
                <v-card-text class="pt-5 pb-0 d-flex mt-3 justify-center align-end">
                    <h2 v-if="documento.doc_tipo == 'PED'" >Pedido Nº {{documento.doc_numero}}</h2>
                    <h2 v-else-if ="documento.doc_tipo == 'FCA'" >Factura A Nº {{documento.doc_numero_tempo}}</h2>
                    <h2 v-else-if="documento.doc_tipo == 'FCB'" >Factura B Nº {{documento.doc_numero_tempo}}</h2>
                    <h2 v-else-if="documento.doc_tipo == 'NCA'" >Nota de Credito A Nº {{documento.doc_numero_tempo}}</h2>
                    <h2 v-else-if="documento.doc_tipo == 'NCB'" >Nota de Credito B Nº {{documento.doc_numero_tempo}}</h2>
                </v-card-text>
                <v-divider></v-divider>
                <!-- Datos Personales -->
                <v-col cols="12" class="">
                    <v-card elevation="0" class="" >
                        <v-row>
                            
                            <v-col cols="12" md="3" sm="12">
                                <v-text-field v-model="datosC.cuit"
                                        dense
                                        outlined
                                        :label="this.$t('m.cuit')"
                                        disabled
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="12" md="6">
                                <v-text-field v-model="datosC.razon"
                                        dense
                                        outlined
                                        :label="this.$t('m.full_name')"
                                        disabled
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="12" md="3">
                                <v-text-field v-model="datosC.telefono"
                                        dense
                                        outlined
                                        :label="this.$t('m.celphone')"
                                        disabled
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="12" md="3">
                                <v-text-field v-model="datosC.correo"
                                        dense
                                        outlined
                                        :label="this.$t('m.email')"
                                        disabled
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="12" md="3">
                                <v-text-field v-model="datosC.address"
                                        dense
                                        outlined
                                        :label="this.$t('m.street')"
                                        disabled
                                ></v-text-field>
                            </v-col>
                            
                            <v-col cols="12" sm="6" md="3">
                                <v-dialog ref="dialog" v-model="menu"
                                            :return-value.sync="date"
                                            persistent
                                            width="290px">
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field v-model="date"
                                                    :label="$t('m.date_delivery')"
                                                    prepend-icon="mdi-calendar"
                                                    outlined
                                                    v-bind="attrs"
                                                    v-on="on"
                                                    readonly
                                                    disabled
                                        ></v-text-field>
                                    </template>
                                    <v-date-picker v-model="date" 
                                                scrollable
                                                :max="enddate"
                                                :min="mindate">
                                        <v-spacer></v-spacer>
                                        <v-btn text color="primary" @click="menu = false">{{$t('m.cancel')}}</v-btn>
                                        <v-btn text color="primary" @click="addS(date)">Ok</v-btn>
                                    </v-date-picker>
                                    
                                </v-dialog>
                            </v-col>

                            <v-col v-if="documento.doc_tipo=='PED'" cols="12" sm="6" md="3">
                                <v-chip  style="width: 150px;" :color="colores[documento.doc_estado]">{{Estados[documento.doc_estado]}}</v-chip>
                                
                            </v-col>
                            <v-col v-else cols="12" sm="6" md="3">
                                <v-chip style="width: 150px;" :color="coloresF[documento.doc_estado]">{{EstadosF[documento.doc_estado]}}</v-chip>
                            </v-col>
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field v-model="documento.doc_observacion"
                                        dense
                                        outlined
                                        :label="this.$t('m.obsv')"
                                        :disabled="!editando"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-col>
                <!-- Detalle del Pedido -->
                <v-card class="">
                    <v-card-text>
                        <v-data-table v-if="$i18n.locale == 'es'" class="elevation-1"
                                        :headers="headers_es"
                                        :items="detalle"
                                        :items-per-page="500"
                                        hide-default-footer
                                        
                                        >
                                <template v-slot:item.precio="{item}">
                                    {{ item.precio | round 2 | dollar}}
                                </template>
                                
                                <template v-slot:item.ftotal="{item}">
                                    {{ (item.total + (item.total * item.tax / 100 ) ) | round 2 | dollar}}
                                </template>

                                <template v-slot:item.total="{item}">
                                    {{ item.total  | round 2 | dollar}}
                                </template>

                                <template v-slot:item.es_name="{item}">
                                    {{ item.es_name }} X {{ item.attr_es_name}}
                                </template>

                                <template v-slot:item.image="{item}">
                                    <span v-if="item.image!=null">
                                        <v-img width="50px" :src="item.image"></v-img>
                                    </span>
                                </template>
                        </v-data-table>
                        <v-data-table v-else class="elevation-1"
                                        :headers="headers_es"
                                        :items="detalle"
                                        >
                                <template v-slot:item.precio="{item}">
                                    {{ item.precio | round 2 | dollar}}
                                </template>
                                
                                <template v-slot:item.ftotal="{item}">
                                    {{ (item.total + (item.total * item.tax / 100 ) ) | round 2 | dollar}}
                                </template>

                                <template v-slot:item.total="{item}">
                                    {{ item.total  | round 2 | dollar}}
                                </template>

                                <template v-slot:item.en_name="{item}">
                                    {{ item.en_name }} X {{ item.attr_en_name}}
                                </template>

                                <template v-slot:item.image="{item}">
                                    <span v-if="item.image!=null">
                                        <v-img width="50px" :src="item.image"></v-img>
                                    </span>
                                </template>
                        </v-data-table>
                    </v-card-text>
                </v-card>
                <!-- resumen -->
                <div class="px-4 pt-2 py-0">
                    <v-card class="d-flex justify-end mb-2 align-self-center"
                                    color="grey lighten-4"
                                    flat
                                    tile>
                        <v-card class="pa-3 text-h6 align-self-center text-right" width="180" outlined tile>{{$t('m.subtotal')}}</v-card>
                        <v-card class="pa-3 text-overline align-self-center text-right" width="150" outlined tile>{{documento.doc_subtotal | dollar | round 2}}</v-card>
                    </v-card>
                </div>

                <div class="px-4 py-0">
                    <v-card class="d-flex justify-end mb-2 align-self-center"
                                    color="grey lighten-4"
                                    flat
                                    tile>
                        <v-card class="pa-3 text-h6 align-self-center text-right" width="180" outlined tile>{{'IVA ('}} {{documento.doc_tax}} {{' % )'}}</v-card>
                        <v-card class="pa-3 text-overline align-self-center text-right" width="150" outlined tile>{{documento.doc_iva | dollar | round 2}}</v-card>
                    </v-card>
                </div>

                <div class="px-4 py-0">
                    <v-card class="d-flex justify-end mb-2 align-self-center"
                                    color="grey lighten-4"
                                    flat
                                    tile>
                        <v-card class="pa-3 text-h6 align-self-center text-right" width="180" outlined tile>{{$t('m.total')}}</v-card>
                        <v-card class="pa-3 text-overline align-self-center text-right" width="150" outlined tile>{{documento.doc_total | dollar | round 2}}</v-card>
                    </v-card>
                </div>
                <v-divider></v-divider>
                
                <v-card class="mt-3 my-3 pb-5">
                    <v-card-text class="pa 5">
                        <v-btn class="my-3 mx-10" color="cyan" @click="pedidoModal = false" small>{{$t('m.cancel')}}</v-btn>
                        <v-btn  v-if="documento.doc_estado < 4 && documento.doc_tipo == 'PED'" class="my-3 mx-10" color="cyan" @click="editar(documento)" small>{{$t('m.modify')}}</v-btn>
                        <v-btn  v-if="documento.doc_estado < 4 && documento.doc_tipo == 'PED'" class="my-3 mx-10 white--text" color="pink darken-4" @click="anular(documento)" small>{{$t('m.anular_p')}}</v-btn>
                    </v-card-text>
                </v-card>
            </v-card>
        </v-dialog>

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2">
            <v-card-title class="headline d-flex start text-truncate">Administración de Documentos</v-card-title>
            <v-breadcrumbs :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
        </v-card>

        <!-- Lstado de Documentos -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Listado de Documentos
                <v-spacer></v-spacer>
                <v-text-field v-model="search"
                            append-icon="mdi-magnify"
                            label="Buscar"
                            single-line
                            hide-details
                ></v-text-field>
                <v-spacer></v-spacer>
            </v-card-title>
            <v-divider></v-divider>

            <v-data-table :headers="headers" :items="documentos" :search="search" class="elevation-1 mr-5 ml-5">
                <template v-slot:item.doc_fecha="{ item }">
                    {{item.doc_fecha | moment("DD/MM/YYYY")}}
                </template>

                <template v-slot:item.doc_total="{item}">
                    {{ parseFloat( item.doc_total ).toFixed(2)  }}
                </template>

                <template v-slot:item.doc_total_pago="{item}">
                    {{ parseFloat((item.doc_total - item.doc_total_pago )).toFixed(2)  }}
                </template>

                <template v-slot:item.doc_estado="{item}">
                    <v-chip v-if="item.doc_tipo == 'PED'" :color="colores[item.doc_estado]" style="text-align: center; width: 150px;" >{{Estados[item.doc_estado]}}</v-chip>
                    <v-chip v-else :color="coloresF[item.doc_estado]" style="text-align: center; width: 150px;" >{{EstadosF[item.doc_estado]}}</v-chip>
                </template>

                <template v-slot:item.edit="{item}">
                    <v-btn color="purple" x-small fab outlined dark @click="verDocumento(item)">
                        <v-icon small>mdi-magnify</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>

        <sys-cart :verDrawer="this.drawer" @closeDrawer="changeDrawer" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            eliminarModal: false,
            text: '',
            snackbar: '',
            color: '',
            search: '',
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Mis Documentos', disabled: true, href: '/cliente/documento'}],
            headers: [ { text: 'Id', value: 'id' },
                       { text: 'Fecha', value: 'doc_fecha' },
                       { text: 'Tipo', value: 'doc_tipo' },
                       { text: 'Numero', value: 'doc_numero' },
                       { text: 'Num. Tempo', value: 'doc_numero_tempo' },
                       { text: 'Total', value: 'doc_total' },
                       { text: 'Saldo', value: 'doc_total_pago' },
                       { text: 'Estado', value: 'doc_estado' },
                       { text: 'ver', value: 'edit', sortable: false }, ],
            documentos: [],
            documento: {},
            id_user: '',
            resumen: {id: '', subtotal: '', iva: '', tax: '', descuento_p: '', descuento_v:'', envio: '', 
                      total: '', obsv: '', tempo:''},
            items: [],
            txtForm: '',
            pedidoModal: false,
            idioma: '',
            headers_es: [ { text: 'Artículo', value: 'image' },
                         { text: 'Descripción', value: 'es_name' },
                         { text: 'Cantidad', value: 'cantidad' },
                         { text: 'Unitario', value: 'precio', align: 'end' },
                         { text: 'Importe', value: 'total', align: 'end' },
                         { text: 'Iva (%)', value: 'tax', align: 'center' },
                         { text: 'Final Price', value: 'ftotal', align: 'end', sortable: false }],
            headers_en: [ { text: 'Article', value: 'image' },
                         { text: 'Description', value: 'en_name' },
                         { text: 'quantilies', value: 'cantidad' },
                         { text: 'Unitary', value: 'precio' },
                         { text: 'Amount', value: 'total' },
                         { text: 'Iva (%)', value: 'tax' },
                         { text: 'Final Price', value: 'ftotal', sortable: false }],
            detalle: [],
            datosC: [],
            date: '',
            menu: false,
            old: '',
            doc_fecha_entrega: '',
            editando: false,
            drawer: false,
            colores: ['amber lighten-3', 'orange lighten-3', 'amber', 'orange', 
                      'lime darken-3', 'green lighten-1', 'light-green accent-3', 'pink accent-3',],
            Estados: ['Pedido Solicitado', 'Pedido en Proceso', 'Mod. Solicitada', 'Mod. en Proceso',
                      'Procesado', 'Finalizado Parcial', 'Finalizado', 'Anulado' ],
            EstadosF: ['Pendiente', 'Pagada', 'Anulada'],
            coloresF: ['deep-purple accent-2', 'teal', 'pink accent-3'],
        }
    },

    created() {
        this.id_user = this.$session.get('u-id')
        this.datosC = JSON.parse(localStorage.getItem('formdata'))
        this.txtForm = `newform_${this.id_user}`
        axios.get(`/cliente/documentos/${this.id_user}`)
            .then( res => {
                this.documentos = res.data
            })
    },

    methods: {
        grabarProducto() {
            const valor = JSON.stringify(this.resumen)
            this.text = valor
            
            localStorage.setItem('resumen', valor)
            const parsed = JSON.stringify(this.items)
            localStorage.setItem(this.txtForm, parsed)

            setTimeout( this.cambiarDrawer, 1000)
        },

        verDocumento(item) {
            this.documento = item
            axios.get(`/cliente/documentos/${item.id}/edit`)
                .then ( res => {
                    this.detalle = res.data
                    this.detalle.forEach(e => {
                        e.st = 0
                        e.dd = 0
                        e.total = e.cantidad * e.precio
                    })
                    this.datosC.fecEntrega = item.doc_fecha_entrega
                    this.date = item.doc_fecha_entrega
                    if ( item.doc_estado < 4 )
                        this.editando = true
                    else
                    this.editando = false
                })
            this.pedidoModal = true
        },

        anular(item) {
            this.text = item
            const params = { tipo: 'PED', numero: item.id, fecha: item.doc_fecha, entrega: item.doc_fecha_entrega,
                              estado: 7, cliente: this.datosC.id, subtotal: item.doc_subtotal, descuento_p: item.doc_descuento_p,
                              descuento_v: item.doc_descuento_v, tax: item.doc_tax, iva: item.doc_iva, total: item.doc_total,
                              envio: item.doc_costo_envio, pago: item.doc_total_pago, obsv: this.obsv, items: this.detalle, idioma: this.$i18n.locale, 
                              destinatario: this.datosC.correo, id: item.id, sw: 1 }
            axios.post(`/cliente/documentos`, params)
                .then( res => {
                    if ( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                        this.pedidoOk = true

                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        
                        this.documentos = res.data[3]
                        this.pedidoModal = false
                    }
                })
                .catch( error => {
                    this.console.log(error.response)
                    this.text = 'Hubo un error General al Finalizar el Pedido'
                    this.color = 'error'
                    this.snackbar = true 
                })
        },

        addS(fecha) {
            this.old = fecha
            this.$refs.dialog.save(fecha)
            this.fechaEntrega = fecha
        },

        cambiarDrawer() {
            this.drawer = !this.drawer
        },

        editar(i) {
            let res = null
            //res = JSON.parse(localStorage.getItem('resumen'))
            //this.items = JSON.parse(localStorage.getItem(this.txtForm))
        
        
        this.resumen.id = i.id
        this.items = this.detalle
        this.resumen.obsv = this.documento.doc_observacion
        this.resumen.tempo = this.documento.doc_numero_tempo
        this.text = this.resumen
        this.grabarProducto()
        this.pedidoModal = false
        
        
        },
    },
}
</script>