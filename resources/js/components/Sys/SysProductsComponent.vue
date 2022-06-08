<template>
    <div>
        <v-breadcrumbs v-if="this.$i18n.locale==='en' " class="" style="padding-left:50px" :items="bread_en" large>
            <template v-slot:divider>
                <v-icon>mdi-forward</v-icon>
            </template>
        </v-breadcrumbs>
        <v-breadcrumbs v-else class="" style="padding-left:50px" :items="bread_es" large>
            <template v-slot:divider>
                <v-icon>mdi-forward</v-icon>
            </template>
        </v-breadcrumbs>
        
        <v-row class="mx-4">
            <v-col cols="12" md="4" sm="12" style="">
                <span class="text-left text-uppercase font-weight-black subtitle-1" style=""></span>

                <div style="width:250px; max-height: 350px;" >
                    <zoom-on-hover :img-normal="imagen_actual" class="mr-2" :scale="1"></zoom-on-hover>
                </div>

                <v-sheet class="" elevation="0" max-width="400">
                    <v-slide-group class="" prev-icon="mdi-minus" next-icon="mdi-plus" show-arrows>
                        <v-slide-item v-for="image in atributos" :key="image.id">
                            <v-img :src="image.image" contain height="100px" width="100px"
                                    :alt="image.alt" @click="changeImg(image)" style="cursor:pointer; max-height: 150px;"
                             ></v-img>
                        </v-slide-item>
                    </v-slide-group>
                </v-sheet>
            </v-col>

            <v-col md="8" sm="12">
                <v-container>
                    <v-row class="mx-4">
                        <v-col xs="12" sm="12" md="9">
                            <div v-if="datos != null">
                                <!-- {{ this.limg }} -->
                                <div v-if="this.$i18n.locale === 'es'" class="display-1 font-weight-bold">
                                    {{ datos.es_name }}
                                </div>
                                <div v-else class="display-1 font-weight-bold">
                                    {{ datos.en_name }}
                                </div>

                                <div v-if="pp > 0 && st == 1" class="my-4 display-1 font-weight-black">
                                    
                                    <div v-if="descuento_porcentual == 0" style="width:100%">
                                        {{ this.precio | dollar }} {{'  +  IVA'}}
                                    </div>
                                    <div v-else style="width:100%">
                                        <div style="text-decoration: line-through;"> {{ this.precio | dollar }}</div>
                                        <div class="text-success"> {{ $t('m.now')}} {{ new_price | dollar }} ( {{ descuento_porcentual }}% OFF ) </div>
                                    </div>
                                </div>

                                <div class="pink--text pb-2 mb-2"> {{ datos.label }} </div>
                                <div v-if="this.$i18n.locale === 'es'" v-html="datos.es_desc_larga"></div>
                                <div v-else v-html="datos.en_desc_larga"></div>
                            </div>
                        </v-col>
                    </v-row>

                    <v-row v-if="pp > 0 && st == 1 && fichat != '' " class="mx-3">
                        <v-col cols="12" md="12" style="margin-top:1px; padding:1px 10p">
                            <template>
                                <v-chip color="blue" rounded dark class="m-2" @click="getDownload(fichat)"> {{$t('m.dficha_t')}} </v-chip>
                            
                                <v-chip color="blue" rounded dark class="m-2" @click="verFicha(fichat)"> {{$t('m.ficha_t')}} </v-chip> 
                            </template>
                        </v-col> 
                    </v-row>

                    
                </v-container>
            </v-col>

            <v-col cols="12">
                <v-container>
                    <v-row class="">
                        
                        <v-col xs="12" sm="12" md="12">
                            <h5>{{$t('m.presentations') }}</h5>
                            
                            <div v-if="this.$i18n.locale === 'es'">
                                <div v-if="!(pp > 0 && st == 1)">
                                    <template v-for="attr in atributos">
                                        <v-chip v-if="attr.id == datos.atributo" color="grey darken-3" dark :key="attr.id" class="m-2" @click="seleccionAttr(attr.id)"> {{ attr.text}} </v-chip>
                                        <v-chip v-else :key="attr.id" class="m-2" @click="seleccionAttr(attr)"> {{ attr.text }}</v-chip>
                                    </template>    
                                </div>
                                <div v-else-if="windowWidth >= 960">
                                    <template v-for="attr in atributos">
                                        <v-row :key="attr.id">
                                            <v-col cols="12" xs="12" sm="12" md="2" >
                                                <v-chip v-if="attr.id == datos.atributo" color="grey darken-3" dark  class="m-2" @click="seleccionAttr(attr.id)"> {{ attr.text}} </v-chip>
                                                <v-chip v-else  class="m-2" @click="seleccionAttr(attr)"> {{ attr.text }}</v-chip>
                                            </v-col>
                                            <v-col cols="12" xs="12" sm="12" md="2">
                                                <v-text-field v-model="attr.precio" style="width:90%"
                                                            disabled
                                                            prefix="$"
                                                            solo
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" xs="12" sm="12" md="3">
                                                <v-text-field v-model="attr.cantidad" style="width:70%"
                                                            dense outlined prepend-icon="mdi-minus-circle-outline"
                                                            append-outer-icon="mdi-plus-circle-outline" @click:append-outer="sumaAtrCant(attr.id)"
                                                            @click:prepend="minAtrCant(attr.id)"
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </template>
                                </div>
                                <div v-else>
                                    <template v-for="attr in atributos">
                                        <v-row :key="attr.id">
                                            <v-chip v-if="attr.id == datos.atributo" color="grey darken-3" dark  class="m-2" @click="seleccionAttr(attr.id)"> {{ attr.text}} </v-chip>
                                            <v-chip v-else  class="m-2" @click="seleccionAttr(attr)"> {{ attr.text }}</v-chip>
                                            <v-chip label class="m-2"  > {{attr.precio}} </v-chip>
                                        </v-row>
                                    </template>
                                </div>
                            </div>
                            <div v-else>
                                <template v-for="attr in atributos">
                                    <v-chip v-if="attr.id == datos.atributo" color="grey darken-3" dark :key="attr.id" class="m-2" @click="seleccionAttr(attr.id)"> {{ attr.en_text}} </v-chip>
                                    <v-chip v-else :key="attr.id" class="m-2" @click="seleccionAttr(attr)"> {{ attr.en_text }}</v-chip>
                                </template>

                            </div>
                        </v-col>
                    </v-row>

                    <v-row v-if="pp > 0 && st == 1" class="">
                        <v-col xs="12" sm="12" md="4">
                            <div style="padding-top:10px">
                                <v-text-field v-if="!buy_disabled && windowWidth < 960" v-model="datos.cantidad" style="width:70%"
                                                class="p-0" dense outlined prepend-icon="mdi-minus-circle-outline"
                                                append-outer-icon="mdi-plus-circle-outline" @click:append-outer="sumCant()"
                                                @click:prepend="minCant()" @keyup.enter="addArticulo2()"
                                                :disabled="buy_disabled"
                                ></v-text-field>
                                <v-btn color="grey darken-3" x-large rounded :disabled="buy_disabled" dark @click="addArticulo2()">
                                    {{ $t('m.buy') }}
                                </v-btn>
                                
                            </div>
                        </v-col>
                    </v-row>

                    <v-row v-else class="">
                        <v-col xs="12" sm="12" md="6">
                            <div class="mx-2"  style="padding-top:10px">
                               <h3 > <a href="/login"> {{ $t('m.buy_now')}} </a> </h3>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </v-col>
        </v-row>

        <v-card flat class="d-flex justify-start align-center py-4">
            <v-card-title class="text-left text-uppercase font-weight-black subtitle-1 mt-4 mx-4">
                 {{ $t('m.related_items') | uppercase }} 
            </v-card-title>
        </v-card>
        <sys-cart :verDrawer="this.drawer" @closeDrawer="changeDrawer" />
        <v-row v-if="this.destacados != ''" class="d-flex justify-center">
            <template v-for="i in this.destacados">
                <sys-items-destacados :key="i.id" :item="i" />
            </template>
        </v-row>

        <v-dialog v-model="addModal" max-width="80%" persistent>
            <v-card>
                <div class="float-right">
                    <v-btn icon @click="addModal = false">
                        <v-icon small>mdi-close</v-icon>
                    </v-btn>
                </div>
                <v-card-text class="headline mt-2 pt-2 font-weight-bold">{{$t('m.modal_title')}} </v-card-text>

                <v-card-text style="padding-buttom:10px">
                    <v-row v-if="windowWidth < 960">
                        <v-col cols="12" md="1" class="justify-space-around d-none d-md-flex">
                            <div>
                                <v-img :src="this.datos.image" aspect-ratio="1" contain width="80px" max-height="150px"></v-img>
                            </div>
                        </v-col>

                        <v-col cols="12" md="9">
                            <span v-if="this.$i18n.locale === 'es'" class="p-0 m-0 font-weight-bold headline">
                                {{ this.datosc.es_name }}: {{ this.datosc.attr_es_name }}
                            </span>
                            <span v-else class="p-0 m-0 font-weight-bold headline">
                                {{ this.datosc.en_name }}: {{ this.datosc.attr_en_name }}
                            </span> 
                            <br />

                            <span class="p-0 m-0 body-1"> {{ this.datosc.precio | dollar }} X {{ this.datosc.cantidad }} </span>
                        </v-col>

                        <v-col cols="12" md="3">
                            <div class="d-flex flex-row justify-end align-center headline">
                                <div class="font-weight-black">{{ this.datosc.total | dollar }} </div>
                                <div class="ml-4"></div>
                            </div>
                        </v-col>
                    </v-row>
                    <v-row v-else>
                        
                         <v-row v-for="(at,i) in catributos" :key="i">
                           
                                <v-col cols="12" md="1" class="justify-space-around d-none d-md-flex">
                                    <div>
                                        <v-img :src="at.image" aspect-ratio="1" contain width="80px" max-height="150px"></v-img>
                                    </div>
                                     
                                </v-col>

                                <v-col cols="12" md="8">
                                    <span v-if="idioma === 'es'" class="p-0 m-0 font-weight-bold headline">
                                        {{ at.es_name }}: {{ at.attr_es_name }}
                                    </span>
                                    <span v-else class="p-0 m-0 font-weight-bold headline">
                                        {{ at.en_name }}: {{ at.attr_en_name }}
                                    </span> 
                                    <br />

                                    <span class="p-0 m-0 body-1"> {{ at.precio | dollar }} X {{ at.cantidad }} </span>
                                </v-col> 

                                <v-col cols="12" md="3">
                                    <div class="d-flex flex-row justify-end align-center headline">
                                        <div class="font-weight-black">{{ at.total | dollar }} </div>
                                        <div class="ml-4"></div>
                                    </div>
                                </v-col> 

                            
                        </v-row>  
                    </v-row>
                </v-card-text>

                <v-spacer></v-spacer>
                <v-card-text>
                    
                    <v-row>
                        <v-col cols="12" offset-md="4" md="4">
                            <v-btn color="primary" block outlined @click="verCarro()"> {{$t('m.modal_btn_cart')}} </v-btn>
                        </v-col>

                        <v-col cols="12" md="4">
                            <v-btn color="success" block outlined @click="addModal = false"> {{ $t('m.modal_btn_close')}} </v-btn>
                        </v-col>
                    </v-row>

                    <v-spacer></v-spacer>

                    <v-row justify="center">
                         <v-col v-for="(mcat,i) in hmenu" :key="i" style="margin-top:4px; padding:1px 10px" cols="12" md="3" class="mt-3">
                            <v-btn v-if="idioma == 'es' " block style="text-decoration:none" color="purple darken-1" outlined small :href="`/category/${mcat.cat_es_name}`"> {{$t('m.btn_categories')+mcat.cat_es_name}} </v-btn>
                            <v-btn v-else block style="text-decoration:none" color="purple darken-1" outlined small :href="`/category/${mcat.cat_en_name}`"> {{$t('m.btn_categories')+mcat.cat_en_name}} </v-btn>
                        </v-col> 
                    </v-row>
                        
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-dialog v-model="verPdf" max-width="80%"  persistent>
            <template>
                
                
                <v-toolbar color="pink lighten-2">
                    <v-toolbar-title> {{ nPdf }} </v-toolbar-title>
                    <v-spacer></v-spacer>
                   <!-- <v-btn icon @click="printFicha(fichat)"> <v-icon>mdi-printer</v-icon></v-btn> -->
                    <v-btn icon @click="verPdf=false"> <v-icon>mdi-close</v-icon></v-btn>
                </v-toolbar>
            
            </template>
            <v-card>
                
                    <template>
                        <div id="fichaTecnica">
                            <pdf v-for="i in numPages" :key="i"  ref="myPdf" :src="src" :page="i" style="display: inline-block; width:100%"></pdf>
                        </div>
                    </template>  
            </v-card>
            
        </v-dialog>
    </div>
</template>

<script>
import { required } from 'vuelidate/lib/validators'
import pdf from 'vue-pdf'

var loadingTask 

export default {
    key: '_product',

    components: {
        pdf
    },

    props: {
        tuser: {type: String},
        source: String
    },

    data: () => ({
        itemInfo: false,
        tituloCategoria: 'Listado de Artticulos',
        color: 'green',
        snacbar: false,
        datos: {id: '', es_name: '', cantidad: 0, atributo: '', image: '', precio: ''},
        datosc: {id:'', es_name: '', en_name: '', attr_es_name: '', attr_en_name: '', 
                 precio: 0, tax:0, image: '', cod_tempo: '', cantidad: 0, id_attr: '', subtotal:0, 
                 total:0, st:0, dd:0},
        id_user: '',
        txtForm: '',
        txtData: '',
        addModal: false,
        drawer: false,
        atributos: [],
        catributos: [],
        imagenes: [],
        descuento: [],
        sliders: [],
        newForm: [],
        dataForm: [],
        hmenu: [],
        es_categoria: '',
        en_categoria: '',
        destacados: [],
        windowWidth: '',
        buy_disabled: false,
        imagen_actual: '/storage/images/pblanco.png',
        id_prod: '',
        new_price: 0,
        categoria_ppal: 'aa',
        bread_es: [ {text: 'Swell', disabled: false, href: '/'} ],
        bread_en: [ {text: 'Swell', disabled: false, href: '/'} ],
        pp: 0,
        st: 0,
        precio: 0,
        fichat: '',
        verPdf: false,
        nPdf: '',
        src: '',
        numPages: 0,
        limg: '',
        idioma: '',
        windowWidth: '',
        paseatributo: 'a',
    }),

    watch: {
        'datos.atributo': function (newVal, oldVal) {
            const items = this.atributos.find( (element) => element.id === this.datos.atributo )
            this.datos.precio = items.precio.total

            if ( this.descuento_porcentual > 0 )
                this.new_price = parseFloat( this.datos.precio ) - ( parseFloat( this.datos.precio ) * parseFloat( this.descuento_porcentual ) / 100 )
        },

        'datos.precio' : function( newVal, oldVal ) {
            if ( newVal === 0 )
                this.buy_disabled = true
            else
                this.buy_disabled = false
        },


        descuento_porcentual() {
            this.new_price = parseFloat( this.datos.precio ) - ( parseFloat( this.datos.precio ) * parseFloat( this.descuento_porcentual ) / 100 )
        }
    },

    beforeCreate() {
            this.$i18n.locale = this.$session.get('idioma')
            this.idioma = this.$i18n.locale
            
    },

    mounted() {
        this.$i18n.locale = this.$session.get('idioma')
        this.idioma = this.$i18n.locale
        window.addEventListener('resize', () => { this.windowWidth = window.innerWidth})
    },

    created() {
        let products = window.location.pathname
        this.windowWidth = window.innerWidth
        this.id_prod = products.split('/')
        this.pp = this.$session.get('u-tipo')
        this.st = this.$session.get('u-st')
        this.id_user = this.$session.get('u-id')
        this.txtForm = 'newform_'+this.id_user
        this.txtData = 'dataform_'+this.id_user
        this.$i18n.locale = this.$session.get('idioma')
        this.idioma = this.$i18n.locale
        if (!this.pp) this.pp = 0

        axios.get(`/productos/${this.id_prod[2]}?tipo=${this.pp}`)
            .then( res => {
                
                this.categoria_ppal = '11'
                this.datos = res.data.data
                this.atributos = res.data.atributos
                this.imagenes = res.data.imagenes
                this.imagen_actual = res.data.data.image
                this.es_categoria = res.data.es_categoria
                this.en_categoria = res.data.en_categoria
                this.precio = res.data.data.precio
                if ( res.data.data.ficha != null) {
                    let nfile = res.data.data.ficha.split('/')
                    this.fichat = res.data.data.ficha
                    this.nPdf = nfile[3]
                } else {
                    this.fichat = ''
                }
                this.datosc.id = res.data.data.id
                this.datosc.es_name = res.data.data.es_name
                this.datosc.en_name = res.data.data.en_name
                this.datosc.attr_es_name = res.data.data.attr_nom
                this.datosc.attr_en_name = res.data.data.attr_en_name
                this.datosc.precio = res.data.data.precio
                this.datosc.image = res.data.data.image
                this.datosc.cantidad = res.data.data.cantidad
                this.datosc.cod_tempo = res.data.data.cod_tempo
                this.datosc.id_attr = res.data.data.atributo
                this.datosc.subtotal = this.datosc.cantidad * this.datosc.precio
                this.datosc.total = this.datosc.subtotal

                this.hmenu = res.data.cat
                this.limg = ''
                axios.get(`/categorias/${this.es_categoria}`)
                    .then ( (resp) => {
                        this.items = resp.data.categories
                        if ( resp.data.categories.parents[0] == null){
                            this.categoria_ppal = resp.data.categories.es_name
                            let elp = [];
                            let elpn = [];
                            
                            elp['text'] = resp.data.categories.es_name.charAt(0).toUpperCase()+ resp.data.categories.es_name.slice(1)
                            elp['href'] = `/category/${resp.data.categories.es_name}`
                            this.bread_es.push(elp)
                            elpn['text'] = resp.data.categories.en_name.charAt(0).toUpperCase()+ resp.data.categorie.en_name.slice(1)
                            elpn['href'] = `/category/${resp.data.categories.en_name}`
                            this.bread_en.push(elpn)
                        }else {
                            this.categoria_ppal = resp.data.categories.parents[0].es_name
                            resp.data.categories.parents.forEach( (element, i) => {
                                let ele = [];
                                let elen = [];
                                ele['text'] = element.es_name.charAt(0).toUpperCase() + element.es_name.slice(1);
                                ele['href'] = `/category/${element.es_name}`;
                                this.bread_es.push(ele);
                                elen['text'] = element.en_name.charAt(0).toUpperCase() + element.en_name.slice(1);
                                elen['href'] = `/category/${element.en_name}`;
                                this.bread_en.push(elen);
                            });
                            let el = [];
                            let eln = [];
                            el['text'] = resp.data.categories.es_name.charAt(0).toUpperCase()+ resp.data.categories.es_name.slice(1)
                            el['href'] = `/category/${resp.data.categories.es_name}`
                            this.bread_es.push(el)
                            eln['text'] = resp.data.categories.en_name.charAt(0).toUpperCase()+ resp.data.categories.en_name.slice(1)
                            eln['href'] = `/category/${resp.data.categories.en_name}`
                            this.bread_en.push(eln)
                        }
                        

                        this.$store.state.menu_select = this.categoria_ppal
                        this.$store.commit('changeMenu')
                    })
                let atr = this.atributos.find( (element) => element.id === this.datos.atributo )
                let img = this.imagenes.find( (element) => element.id === atr.imagen )

                if ( atr ) {
                    this.imagen_actual = atr.image
                    this.datos.image = atr.image
                }

                axios.get(`product/destacados?category=${this.es_categoria}`)
                    .then( (res) => {
                        this.destacados = res.data.articulos
                    })
                if ( this.descuento_porcentual > 0 )
                    this.new_price = parseFloat( this.datos.precio ) - ( parseFloat( this.datos.precio ) * parseFloat( this.descuento_porcentual ) / 100 )
            })
    },

    computed: {
        envaseErrors() {
            const errors = []
            if ( !this.$v.datos.atributo.$dirty) 
                return errors
            !this.$v.datos.atributo.required && errors.push($t('m.select_envase'))
            return errors
        },
        descuento_porcentual() {
            return this.$store.state.descuento_porcentual
        }
    },

    methods: {
        seleccionAttr(item) {
            this.datos.atributo = item.id
            
            //const img = this.atributos.find( (element) => element.id === item.imagen )
            if ( item) {
                this.imagen_actual = item.image
                this.datos.image = item.image
                this.precio = item.precio
            }
            this.datosc.attr_es_name = item.text
            this.datosc.attr_en_name = item.en_text
            this.datosc.image = item.image
            this.datosc.precio = item.precio
            this.datosc.cod_tempo = item.cod_tempo
            this.datosc.cantidad = this.datos.cantidad
            this.datosc.subtotal = this.datosc.cantidad * this.datosc.precio
            this.datosc.id_attr = item.id
        },

        changeImg(id) {
            this.imagen_actual = id.image
            this.datos.image = id.image
            this.precio = id.precio
            this.datos.atributo = id.id


            this.datosc.attr_es_name = id.text
            this.datosc.attr_en_name = id.en_text
            this.datosc.image = id.image
            this.datosc.precio = id.precio
            this.datosc.cod_tempo = id.cod_tempo
            this.datosc.cantidad = this.datos.cantidad
            this.datosc.subtotal = this.datosc.cantidad * this.datosc.precio
            this.datosc.id_attr = id.id
        },

        addArticulo() {
            if ( !this.datosc ) {
                return
            } 
             // this.limg = this.datosc
            if ( localStorage.getItem(this.txtForm) ) {
                try {
                    this.newForm = JSON.parse(localStorage.getItem(this.txtForm) )
                } catch ( e ) {
                    localStorage.removeItem(this.txtForm)
                }
            }

            this.$v.datos.$touch();
            if ( this.$v.datos.$pending || this.$v.datos.$error ) return;

            const items = this.newForm.find( (element) => element.cod_tempo === this.datosc.cod_tempo )
            const attr = this.atributos.find( (element) => element.id === this.datosc.id_attr )
            
            this.datosc.cantidad = this.datos.cantidad
            this.datos.attr_nom = attr.text

            if ( !items ) {
                this.datosc.total = this.datosc.cantidad * this.datosc.precio
                this.newForm.push( this.datosc )
                this.saveProducto()
                this.addModal = true
                document.body.scrollTop = 0  // For safari
                document.documentElement.scrollTop = 0 // For Chome, Firefox, IE and Opera
            } else {
                const index = this.newForm.findIndex( item => item.cod_tempo === this.datosc.cod_tempo )
                this.newForm[index].total = (this.datosc.cantidad + this.newForm[index].cantidad) * this.datosc.precio
                this.newForm[index].cantidad+= this.datosc.cantidad
                // this.newForm.splice( index, 1 )
                // this.newForm.push ( this.datosc )
                this.saveProducto()
                this.addModal = true
                document.body.scrollTop = 0  // For safari
                document.documentElement.scrollTop = 0 // For Chome, Firefox, IE and Opera
            }
        },

        addArticulo2() {
            
            if ( localStorage.getItem(this.txtForm) ) {
                try {
                    this.newForm = JSON.parse(localStorage.getItem(this.txtForm) )
                } catch ( e ) {
                    localStorage.removeItem(this.txtForm)
                }
            }

            if (this.windowWidth < 960) {
                this.$v.datos.$touch();
                if ( this.$v.datos.$pending || this.$v.datos.$error ) return;

                const items = this.newForm.find( (element) => element.cod_tempo === this.datosc.cod_tempo )
                const attr = this.atributos.find( (element) => element.id === this.datosc.id_attr )
                
                this.datosc.cantidad = this.datos.cantidad
                this.datos.attr_nom = attr.text

                if ( !items ) {
                    this.datosc.total = this.datosc.cantidad * this.datosc.precio
                    this.newForm.push( this.datosc )
                    this.saveProducto()
                } else {
                    const index = this.newForm.findIndex( item => item.cod_tempo === this.datosc.cod_tempo )
                    this.newForm[index].total = (this.datosc.cantidad + this.newForm[index].cantidad) * this.datosc.precio
                    this.newForm[index].cantidad= parseFloat(this.newForm[index].cantidad) + parsefloat(this.datosc.cantidad)
                    // this.newForm.splice( index, 1 )
                    // this.newForm.push ( this.datosc )
                    this.saveProducto()
                }


            } else {
                this.paseatributo = ''
                this.catributos = []
                let pos = 0
                let i = 0
                this.atributos.forEach(elem => {
                    let ldatos = {id:'', es_name: '', en_name: '', attr_es_name: '', attr_en_name: '', 
                        precio: 0, tax:0, image: '', cod_tempo: '', cantidad: 1, id_attr: '', subtotal:0, 
                        total:0, st:0, dd:0}
                    if ( elem.cantidad > 0) {
                        ldatos.id = this.datosc.id
                        ldatos.es_name = this.datosc.es_name
                        ldatos.en_name = this.datosc.en_name
                        ldatos.attr_es_name = elem.text
                        ldatos.attr_en_name = elem.en_text
                        ldatos.cantidad = elem.cantidad
                        ldatos.precio = elem.precio
                        ldatos.id_attr = elem.id_attr
                        ldatos.tax = elem.tax
                        ldatos.image = elem.image
                        ldatos.total = elem.cantidad * elem.precio
                        ldatos.cod_tempo = elem.cod_tempo
                        this.catributos[pos++] = ldatos
                        const items = this.newForm.find( (element) => element.cod_tempo === elem.cod_tempo )
                        if ( !items ) {
                            this.newForm.push( ldatos )
                            //this.saveProducto()
                        } else {
                            const index = this.newForm.findIndex( item => item.cod_tempo === elem.cod_tempo   )
                            
                            this.newForm[index].cantidad = parseFloat(this.newForm[index].cantidad) + parseFloat(ldatos.cantidad)
                            this.newForm[index].total = (this.newForm[index].cantidad) * ldatos.precio
                            // this.newForm.splice( index, 1 )
                            // this.newForm.push ( this.datosc )
                             //this.saveProducto()
                        }
                        this.atributos[i].cantidad = 0
                        i++
                    } else {
                        i++
                    }
                })
            }

            this.saveProducto()
            this.addModal = true
            document.body.scrollTop = 0  // For safari
            document.documentElement.scrollTop = 0 // For Chome, Firefox, IE and Opera
            

        },

        verCarro() {
            //this.$bus.$emit('addProd', this.datosc.id_attr)
            this.addModal = false
            this.drawer = !this.drawer
        },

        saveProducto() {
            const parsed = JSON.stringify( this.newForm )
            localStorage.setItem(this.txtForm, parsed)
            this.$store.commit('calcularCarro', this.descuento, this.txtForm)
        },

        sumaAtrCant(id) {
            const index = this.atributos.findIndex( item => item.id === id)
            
                this.atributos[index].cantidad++
            
        },

        minAtrCant(id) {
            const index = this.atributos.findIndex( item => item.id === id)
            if ( this.atributos[index].cantidad < 1) {
                this.atributos[index].cantidad = 0
            } else {
                this.atributos[index].cantidad--
            }
        },

        sumCant() {
            if ( this.datos.cantidad < 0 ) {
                this.datos.cantidad = 0
                this.datosc.cantidad = 0
            }
            else {
                this.datos.cantidad++
                this.datos.total = this.datos.cantidad * this.datos.precio
                this.datosc.cantidad++
                this.datosc.total = this.datosc.cantidad * this.datosc.precio
            }
        },
      
        minCant() {
            if ( this.datos.cantidad < 1 ) {
                this.datos.cantidad = 0
                this.datosc.cantidad = 0
            }
            else {
                this.datos.cantidad--
                this.datos.total = this.datos.cantidad * this.datos.precio
                this.datosc.cantidad--
                this.datosc.total = this.datosc.cantidad * this.datosc.precio
            }
        },

        eliminar( item ) {
            const index = this.items.findIndex( (i) => i.id === item.id )
            this.items.splice( index, 1 )
            this.saveProducto()
        },

        getDownload( file ) {
            this.limg = 1;
            axios.post(`/downloads/1`)
                .then( (res) => {
                    this.limg = 2
                    //window.open(`${file}`);
                    axios ({url: file, method: 'GET', responseType: 'blob' })
                        .then( (response) => {
                            var fileUrl = window.URL.createObjectURL(new Blob([response.data]))
                            var fileLink = document.createElement('a')

                            fileLink.href = fileUrl
                            fileLink.setAttribute('download', this.nPdf)
                            document.body.appendChild(fileLink)

                            fileLink.click()
                        })
                })
        },

        verFicha( file ) {
            loadingTask = pdf.createLoadingTask( file );

            this.src = loadingTask;
            this.src.promise.then(pdf => { this.numPages = pdf.numPages; });

            this.verPdf = true;
        },

        printFicha( file ) {
             
                
                axios ({url: file, method: 'GET', responseType: 'blob' })
                        .then( (response) => {
                            var fileUrl = window.URL.createObjectURL(new Blob([response.data]))
                            var fileLink = document.createElement('a')

                            fileLink.href = fileUrl
                            fileLink.setAttribute('download', this.nPdf)
                            document.body.appendChild(fileLink)
                            //let w = window.open()
                            //w.document.write(fileLink)
                            window.open(document)
                             w.document.close()
                            //w.setTimeout( function() { w.print() }, 1000 )
                            window.close()
                        })
            
            
        },

    },

    validations: {
        datos : {
            atributo: { required
            }
        }
    },
}
</script>

<style scope>
    .contacto {
        position: absolute;
        right: 5%;
        top: 35px;
        z-index: 1000;
    }
</style>