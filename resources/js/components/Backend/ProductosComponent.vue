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

        <!-- Eliminar -->
        <v-row justify="center">
            <v-dialog v-model="eliminarModal" persistent max-width="580">
                <v-card>
                    <v-card-title class="headline">Seguro  que desea darle de Baja a este Producto : ( {{'producto.es_name'}} )</v-card-title>
                    <v-card-text>Esta acción puede deshacerse</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false" > {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="eliminarRoles()" > {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- Fin eliminar -->

        <!-- Listado de Fichas Tecnica -->
        <v-row justify="center">
            <v-dialog v-model="fichaModal" persistent max-width="95%">
                <v-card class="mt-1">
                    <v-card-text class="text-center my-0" > <h2> {{'Fichas Técnicas'}} </h2></v-card-text>
                </v-card>

                <v-card class="mt-1 headline">
                    <v-row justify="center">
                        <v-col cols="12" sm="6" md="4" v-for="(ft,i) in fichas" :key="i">
                            <template>
                                <v-card class="ma-2">
                                    <v-card-text class="text-center">
                                        <h6>
                                            <v-btn v-if="ft == oldFicha" fab small color="green"><v-icon>mdi-check</v-icon></v-btn>
                                            <v-btn v-else fab small @click="oldFicha = ft"></v-btn>
                                            {{ft}}
                                        </h6>
                                    </v-card-text>
                                    <v-spacer></v-spacer>
                                    <div>
                                        <pdf :ref="'myPdf'+i" :src="'/storage/ficha/'+ft" style="display: inline-block; width:100%; " ></pdf>
                                    </div>
                                </v-card>
                            </template>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                            <v-file-input v-model="file" accept=".pdf" messages="" @change="previewPdf"></v-file-input>
                            <v-card class="d-inline-block mx-auto">
                                <v-container v-if="this.img_ficha!= ''">
                                    <template>
                                        <div>
                                            <pdf :ref="'myPdf'+i" :src="img_ficha" style="display: inline-block; width:100%; " ></pdf>
                                        </div>
                                    </template>
                                    {{namefile}}
                                    <v-card-text class="caption mx-1 px-1 py-0" >
                                        <v-tooltip bottom>
                                            <template v-slot:activator="{ on }">
                                                <v-btn icon color="green" small v-on="on" @click="addFicha"><v-icon>mdi-marker-check</v-icon> </v-btn>
                                            </template>
                                            <span>Alta</span>
                                        </v-tooltip>
                                        <v-tooltip bottom>
                                            <template v-slot:activator="{ on }">
                                                <v-btn icon color="red" small v-on="on" @click="cancelFicha"><v-icon>mdi-close</v-icon> </v-btn>
                                            </template>
                                            <span>Cancelar</span>
                                        </v-tooltip>
                                    </v-card-text>
                                </v-container>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-card>

                <v-card class="mt-1">
                    <v-btn color="red darken-1" text @click="fichaModal = false"> {{this.$t('m.cancel')}} </v-btn>
                    <v-btn color="green darken-4" text @click="aceptFicha"> {{this.$t('m.acept')}} </v-btn>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- Fin Lista de ficha -->

        <!-- Listado de Certificado Senasa -->
        <v-row justify="center">
            <v-dialog v-model="senasaModal" persistent max-width="95%">
                <v-card class="mt-1">
                    <v-card-text class="text-center my-0" > <h2> {{'Certificados de SENASA'}} </h2></v-card-text>
                </v-card>

                <v-card class="mt-1 headline">
                    <v-row justify="center">
                        <v-col cols="12" sm="6" md="4" v-for="(ft,i) in senasas" :key="i">
                            <template>
                                <v-card class="ma-2">
                                    <v-card-text class="text-center">
                                        <h6>
                                            <v-btn v-if="ft == oldSenasa" fab small color="green"><v-icon>mdi-check</v-icon></v-btn>
                                            <v-btn v-else fab small @click="oldSenasa = ft"></v-btn>
                                            {{ft}}
                                        </h6>
                                    </v-card-text>
                                    <v-spacer></v-spacer>
                                    <div>
                                        <pdf :ref="'myPdf_s'+i" :src="'/storage/senasa/'+ft" style="display: inline-block; width:100%; " ></pdf>
                                    </div>
                                </v-card>
                            </template>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                            <v-file-input v-model="file_s" accept=".pdf" messages="" @change="previewPdf_s"></v-file-input>
                            <v-card class="d-inline-block mx-auto">
                                <v-container v-if="this.img_senasa!= ''">
                                    <template>
                                        <div>
                                            <pdf :ref="'myPdf_s'+i" :src="img_senasa" style="display: inline-block; width:100%; " ></pdf>
                                        </div>
                                    </template>
                                    {{namefile_s}}
                                    <v-card-text class="caption mx-1 px-1 py-0" >
                                        <v-tooltip bottom>
                                            <template v-slot:activator="{ on }">
                                                <v-btn icon color="green" small v-on="on" @click="addSenasa"><v-icon>mdi-marker-check</v-icon> </v-btn>
                                            </template>
                                            <span>Alta</span>
                                        </v-tooltip>
                                        <v-tooltip bottom>
                                            <template v-slot:activator="{ on }">
                                                <v-btn icon color="red" small v-on="on" @click="cancelSenasa"><v-icon>mdi-close</v-icon> </v-btn>
                                            </template>
                                            <span>Cancelar</span>
                                        </v-tooltip>
                                    </v-card-text>
                                </v-container>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-card>

                <v-card class="mt-1">
                    <v-btn color="red darken-1" text @click="senasaModal = false"> {{this.$t('m.cancel')}} </v-btn>
                    <v-btn color="green darken-4" text @click="aceptSenasa"> {{this.$t('m.acept')}} </v-btn>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- Fin Lista de senasa -->

        <!-- Listado de Certificado Anmat -->
        <v-row justify="center">
            <v-dialog v-model="anmatModal" persistent max-width="95%">
                <v-card class="mt-1">
                    <v-card-text class="text-center my-0" > <h2> {{'Certificados de ANMAT'}} </h2></v-card-text>
                </v-card>

                <v-card class="mt-1 headline">
                    <v-row justify="center">
                        <v-col cols="12" sm="6" md="4" v-for="(ft,i) in anmats" :key="i">
                            <template>
                                <v-card class="ma-2">
                                    <v-card-text class="text-center">
                                        <h6>
                                            <v-btn v-if="ft == oldAnmat" fab small color="green"><v-icon>mdi-check</v-icon></v-btn>
                                            <v-btn v-else fab small @click="oldAnmat = ft"></v-btn>
                                            {{ft}}
                                        </h6>
                                    </v-card-text>
                                    <v-spacer></v-spacer>
                                    <div>
                                        <pdf :ref="'myPdf_a'+i" :src="'/storage/anmat/'+ft" style="display: inline-block; width:100%; " ></pdf>
                                    </div>
                                </v-card>
                            </template>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                            <v-file-input v-model="file_a" accept=".pdf" messages="" @change="previewPdf_a"></v-file-input>
                            <v-card class="d-inline-block mx-auto">
                                <v-container v-if="this.img_anmat!= ''">
                                    <template>
                                        <div>
                                            <pdf :ref="'myPdf_a'+i" :src="img_anmat" style="display: inline-block; width:100%; " ></pdf>
                                        </div>
                                    </template>
                                    {{namefile_a}}
                                    <v-card-text class="caption mx-1 px-1 py-0" >
                                        <v-tooltip bottom>
                                            <template v-slot:activator="{ on }">
                                                <v-btn icon color="green" small v-on="on" @click="addanmat"><v-icon>mdi-marker-check</v-icon> </v-btn>
                                            </template>
                                            <span>Alta</span>
                                        </v-tooltip>
                                        <v-tooltip bottom>
                                            <template v-slot:activator="{ on }">
                                                <v-btn icon color="red" small v-on="on" @click="cancelAnmat"><v-icon>mdi-close</v-icon> </v-btn>
                                            </template>
                                            <span>Cancelar</span>
                                        </v-tooltip>
                                    </v-card-text>
                                </v-container>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-card>

                <v-card class="mt-1">
                    <v-btn color="red darken-1" text @click="anmatModal = false"> {{this.$t('m.cancel')}} </v-btn>
                    <v-btn color="green darken-4" text @click="aceptAnmat"> {{this.$t('m.acept')}} </v-btn>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- Fin Lista de anmat -->

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Administración de Productos </v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Formulario -->
        <v-row>
            <!-- Datos General del Producto -->
            <v-col cols="12" sm="6" md="8" class="mt-5">
                <productogeneral :prod="producto" :attr="productos_atributos"  /> 
            </v-col>

            <!-- Categoría y/o Ficha Tecnica del Producto -->
            <v-col cols="12" sm="6" md="4">
                <productocategoria :prod="producto.id" :cate="productos_categorias" />

                <v-card v-if="producto.tipo == 1" class="mt-3">
                    <v-card-title class="justify-center">Ficha Técnica</v-card-title>
                    <template >
                        <pdf ref="myPdf" :src="producto.ficha" style="display: inline-block; width:100%; " ></pdf>
                    </template>
                    
                    <v-card-text class="text-center">
                        <div> <h6> {{ nPdf }} </h6> </div>
                        <v-btn v-if="producto.ficha != null " color="blue" @click="cambiarFicha">Cambiar Ficha</v-btn>
                        <v-btn v-else color="purple" @click="cambiarFicha">Seleccionar Ficha</v-btn>
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col cols="12" sm="6" md="6">
                <v-card v-if="producto.tipo == 1" class="mt-3">
                    <v-card-title class="justify-center">Certificado ANMAT</v-card-title>
                    <template >
                        <pdf ref="myPdf_A" :src="producto.anmat" style="display: inline-block; width:100%; " ></pdf>
                    </template>
                    
                    <v-card-text class="text-center">
                        <div> <h6> {{ aPdf }} </h6> </div>
                        <v-btn v-if="producto.anmat != null " color="blue" @click="cambiarAnmat">Cambiar Certificado</v-btn>
                        <v-btn v-else color="purple" @click="cambiarAnmat">Seleccionar Certificado</v-btn>
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col cols="12" sm="6" md="6">
                <v-card v-if="producto.tipo == 1" class="mt-3">
                    <v-card-title class="justify-center">Certificado SENASA</v-card-title>
                    <template >
                        <pdf ref="myPdf_S" :src="producto.senasa" style="display: inline-block; width:100%; " ></pdf>
                    </template>
                    
                    <v-card-text class="text-center">
                        <div> <h6> {{ sPdf }} </h6> </div>
                        <v-btn v-if="producto.senasa != null " color="blue" @click="cambiarSenasa">Cambiar Certificado</v-btn>
                        <v-btn v-else color="purple" @click="cambiarSenasa">Seleccionar Certificado</v-btn>
                    </v-card-text>
                </v-card>
            </v-col>

            <!-- Presentacion del Producto -->
            <v-col cols="12" sm="12" md="12">
                
                <productoatributo :prod="producto.id" :attr="productos_atributos" :name="producto.es_name" :tipo_p="producto.tipo"  /> 
            </v-col>

        </v-row>
        <!-- Fin Formulario -->
    </div>
</template>

<script>
import { required, minLength, maxLength } from 'vuelidate/lib/validators'
import { mapState } from 'vuex'
import pdf from 'vue-pdf'

var perfilesValidodor
var menuesValidador

export default {

    components: {
        pdf
    },
  
    props: ['id_prod'],

    data() {
        return {
            text: '',
            color: '',
            snackbar: false,
            eliminarModal: false,
            numPages: '',
            src: '',
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Listado Productos', disabled: false, href: '/admin/listado_productos'},
                         { text: 'Producto', disabled: true, href: '/admin/productos'}],
            producto: { id: this.id, es_name: '', en_name: '', es_descripcion: null, en_descripcion: null,
                        es_larga: null, en_larga: null, estado: '', destacado: 0, tipo: '', ficha: null,
                        image : null, url: '', anmat: null, senasa: null },
            producto_full: [],
            productos_categorias: [],
            productos_atributos: [],
            // ***** ficha ******
            nPdf: '',
            oldFicha: '',
            fichas: [],
            fichaModal: false,
            file: [],
            namefile: '',
            img_ficha: '',
            lib: '/storage/ficha',
            ruta: 'public/ficha',
            // ******* anmat *****
            aPdf: '',
            oldAnmat: '',
            anmats: [],
            anmatModal: false,
            file_a: [],
            namefile_a: '',
            img_anmat: '',
            lib_a: '/storage/anmat',
            ruta_a: 'public/anmat',
            // ****** senasa *******
            sPdf: '',
            oldSenasa: '',
            senasas: [],
            senasaModal: false,
            file_s: [],
            namefile_s: '',
            img_senasa: '',
            lib_s: '/storage/senasa',
            ruta_s: 'public/senasa',
            p_lib : '/storage/images/tienda/',
            p_ruta: 'public/images/tienda',
        }
    },

    mounted() {
        this.producto.id = this.id_prod
    },

    created() {
        if ( this.id_prod > 0 ) {
           let name = ''
           let name_s = ''
           let name_a = ''
            axios.get(`/admin/producto/${this.id_prod}`)
                .then( res => {
                    this.producto_full = res.data
                    this.fichas = res.data.fichas
                    this.anmats = res.data.anmat
                    this.senasas = res.data.senasa
                    this.productos_atributos = res.data.attr
                    this.productos_categorias = res.data.cats

                    this.producto.es_name = res.data.prod.pro_es_nombre
                    this.producto.en_name = res.data.prod.pro_en_nombre
                    this.producto.es_descripcion = res.data.prod.pro_es_descripcion
                    this.producto.en_descripcion = res.data.prod.pro_en_descripcion
                    this.producto.es_larga = res.data.prod.pro_es_descripcion_larga
                    this.producto.en_larga = res.data.prod.pro_en_descripcion_larga
                    this.producto.estado = res.data.prod.pro_estado
                    this.producto.destacado = res.data.prod.pro_destacado
                    this.producto.tipo = res.data.prod.pro_tipo
                    this.producto.ficha = res.data.prod.pro_ficha
                    this.producto.anmat = res.data.prod.pro_anmat
                    this.producto.senasa = res.data.prod.pro_senasa
                    this.producto.image = res.data.prod.pro_imagen_ppal
                    this.producto.url = res.data.prod.bib_url
                    if ( this.producto.ficha != '') {
                        name = this.producto.ficha.split('/')
                        this.nPdf = name[3]
                        this.oldFicha = this.nPdf
                    }
                    if ( this.producto.anmat != '') {
                        name_a = this.producto.anmat.split('/')
                        this.aPdf = name_a[3]
                        this.oldAnmat = this.aPdf
                    }
                    if ( this.producto.senasa != '') {
                        name_s = this.producto.senasa.split('/')
                        this.sPdf = name_s[3]
                        this.oldSenasa = this.sPdf
                    }
                })
        } else {
            axios.get(`/admin/producto/${this.id_prod}`)
                .then( res => {
                    this.fichas = res.data.fichas
                    this.anmats = res.data.anmat
                    this.senasas = res.data.senasa
                })
        }
    },

    watch: {
        'producto.tipo' : function() {
            if ( this.producto.tipo == 1) {
                this.p_lib = '/storage/images/tienda/'
                this.p_ruta = 'public/images/tienda'
            } else {
                this.p_lib = '/storage/images/tienda/art/'
                this.p_ruta = 'public/images/tienda/art'
            }
        },
    },

    methods: {
        cambiarFicha() {
            this.fichaModal = true
            this.oldFicha = this.nPdf
        },

        cambiarSenasa() {
            this.senasaModal = true
            this.oldSenasa = this.sPdf
        },

        cambiarAnmat() {
            this.anmatModal = true
            this.oldAnmat = this.aPdf
        },

        aceptFicha() {
            if ( this.oldFicha == '') {
                this.text = 'Debe Seleccionar una Ficha'
                this.color = 'bg-danger'
                this.snackbar = true
            } else if (this.oldFicha != this.nPdf) {
                this.producto.ficha = '/storage/ficha/'+ this.oldFicha
                this.fichaModal = false
                this.nPdf = this.oldFicha
            } else {
                this.fichaModal = false
            }
        },

        aceptSenasa() {
            if ( this.oldSenasa == '') {
                this.text = 'Debe Seleccionar un Certificado'
                this.color = 'bg-danger'
                this.snackbar = true
            } else if (this.oldSenasa != this.sPdf) {
                this.producto.senasa = '/storage/senasa/'+ this.oldSenasa
                this.senasaModal = false
                this.sPdf = this.oldSenasa
            } else {
                this.senasaModal = false
            }
        },

        aceptAnmat() {
            if ( this.oldAnmat == '') {
                this.text = 'Debe Seleccionar un Certificado'
                this.color = 'bg-danger'
                this.snackbar = true
            } else if (this.oldAnmat != this.aPdf) {
                this.producto.anmat = '/storage/anmat/'+ this.oldAnmat
                this.anmatModal = false
                this.aPdf = this.oldAnmat
            } else {
                this.anmatModal = false
            }
        },

        previewPdf: function(event) {
            
            let reader = new FileReader();
     
            reader.onload = () => {
                    this.img_ficha = reader.result;
                }
                reader.readAsDataURL(this.file); 
                this.namefile = this.file.name      
        },

        previewPdf_s: function(event) {
            
            let reader = new FileReader();
     
            reader.onload = () => {
                    this.img_senasa = reader.result;
                }
                reader.readAsDataURL(this.file_s); 
                this.namefile_s = this.file_s.name      
        },

        previewPdf_a: function(event) {
            
            let reader = new FileReader();
     
            reader.onload = () => {
                    this.img_anmat = reader.result;
                }
                reader.readAsDataURL(this.file_a); 
                this.namefile_a = this.file_a.name      
        },

        cancelFicha() {
            this.file = []
            this.img_ficha = ''
        },

        cancelSenasa() {
            this.file_s = []
            this.img_senasa = ''
        },

        cancelAnmat() {
            this.file_a = []
            this.img_anmat = ''
        },

        addFicha() {
            if ( this.namefile == '') return

            const index = this.fichas.find( (e) => e == this.namefile)
            if ( index ) {
                this.text = 'Archivo [ ' + index + ' ] ya existe'
                this.color = 'bg-danger'
                this.snackbar = true
                return
            }

            let file = new FormData()
            file.append("files", this.file)
            file.append("id", this.lib+'%')
            file.append("nombre", this.namefile)
            file.append("url", this.lib + this.namefile )
            file.append("ruta", this.ruta )
            file.append("tipo", 'ficha')

            axios.post('/admin/biblioteca/newft', file, {headers: {'Content-Type': 'multipart/form-data'} } )
                .then( res => {
                    if (res.data[0] == 0 ) {
                        this.color = 'error'
                        this.text = res.data[1]
                        this.snackbar = true
                    }else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.img_ficha = ''
                        this.file = []
                        this.snackbar = true
                        this.fichas = res.data[2]
                        this.oldFicha = this.namefile
                        this.namefile = ''
                    }
                })
        },

        addSenasa() {
            if ( this.namefile_s == '') return

            const index = this.senasas.find( (e) => e == this.namefile_s)
            if ( index ) {
                this.text = 'Archivo [ ' + index + ' ] ya existe'
                this.color = 'bg-danger'
                this.snackbar = true
                return
            }

            let file = new FormData()
            file.append("files", this.file_s)
            file.append("id", this.lib_s+'%')
            file.append("nombre", this.namefile_s)
            file.append("url", this.lib_s + this.namefile_s )
            file.append("ruta", this.ruta_s )
            file.append("tipo", 'senasa')

            axios.post('/admin/biblioteca/newft', file, {headers: {'Content-Type': 'multipart/form-data'} } )
                .then( res => {
                    if (res.data[0] == 0 ) {
                        this.color = 'error'
                        this.text = res.data[1]
                        this.snackbar = true
                    }else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.img_senasa = ''
                        this.file_s = []
                        this.snackbar = true
                        this.senasas = res.data[2]
                        this.oldSenasa = this.namefile_s
                        this.namefile_s = ''
                    }
                })
        },

        addanmat() {
            if ( this.namefile_a == '') return

            const index = this.anmats.find( (e) => e == this.namefile_a)
            if ( index ) {
                this.text = 'Archivo [ ' + index + ' ] ya existe'
                this.color = 'bg-danger'
                this.snackbar = true
                return
            }

            let file = new FormData()
            file.append("files", this.file_a)
            file.append("id", this.lib_a+'%')
            file.append("nombre", this.namefile_a)
            file.append("url", this.lib_a + this.namefile_a )
            file.append("ruta", this.ruta_a )
            file.append("tipo", 'anmat')

            axios.post('/admin/biblioteca/newft', file, {headers: {'Content-Type': 'multipart/form-data'} } )
                .then( res => {
                    if (res.data[0] == 0 ) {
                        this.color = 'error'
                        this.text = res.data[1]
                        this.snackbar = true
                    }else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.img_anmat = ''
                        this.file_a = []
                        this.snackbar = true
                        this.anmats = res.data[2]
                        this.oldAnmat = this.namefile_a
                        this.namefile_a = ''
                    }
                })
        },
    },
}
</script>

<style scoped>
    .btn-float{
        padding-right: -10%!important;
    }
</style>
