<template>
    <div>
        <!-- Alerta -->
        <v-snackbar v-model="snackbar" top right :timeout="5000" :color="color">
            {{ text }}
            <v-btn :color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>
        <!-- Fin Alerta -->

        <!-- Imagenes del Producto -->
        <v-row justify="center">
            <v-dialog v-model="imageModal" persistent max-width="60%">
                <v-card>
                    <v-card-title>Imagenes del Producto</v-card-title>
                    <v-card-actions>
                        <v-card-text>
                            <v-row justify="space-around">
                                <template v-for="(item) in attr">
                                    <v-col cols="3" :key="item.id">
                                        <v-card class="d-inline-block mx-auto">
                                            <v-img :src="item.bib_url" height="150px" width="150px" ></v-img>
                                            <v-card-text class="caption mx-1 px-1 py-0"><strong>{{item.pat_imagen}}</strong> 
                                                <v-tooltip bottom>
                                                    <template v-slot:activator="{ on }">
                                                        <v-btn v-if="item.pat_imagen == cat_img" icon color="green" x-small v-on="on"><v-icon>mdi-home</v-icon> </v-btn>
                                                        <v-btn v-else icon color="grey" x-small v-on="on" @click="cat_img = item.pat_imagen"><v-icon>mdi-home</v-icon> </v-btn>
                                                    </template>
                                                    <span>Seleccionar</span>
                                                </v-tooltip>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </template>
                            </v-row>
                        </v-card-text>
                        
                    </v-card-actions>
                    <v-spacer></v-spacer>
                    <v-card>
                        <v-row justify="center">
                                <v-card  class="d-line-block mx-auto px-4">
                                    <v-card-title class="headline"> Imagen Seleccionada {{prod.image}} </v-card-title>
                                    <v-img :src="this.image_ppal" height="200px" width="200px"></v-img>
                                    <v-spacer></v-spacer>
                                </v-card>
                        </v-row>
                    </v-card>
                    <v-card class="my-2 mt-5">
                        <v-btn color="red darken-1" text @click="imageModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-4" text @click="aceptImagen"> {{this.$t('m.acept')}} </v-btn>
                    </v-card>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- Fin Imagenes del Producto -->

        <!-- Formulario -->
        <v-card class="mt-3">
            <v-card-title>
                Datos General del Producto <br>Id : {{ this.prod.id}} - {{ this.prod.es_name}} - Destacado : 
                <v-btn icon dark @click="cambiarDestacado()" class="my-0 mt-3">
                    <v-icon v-if="prod.destacado == 1" color="pink">mdi-heart</v-icon>
                    <v-icon v-else color="grey">mdi-heart</v-icon>
                </v-btn>
            </v-card-title>

            <v-card-text>
                <v-row>
                    <v-col cols="12" sm="6" md="6">
                        <v-select v-model.trim="$v.prod.tipo.$model"
                                label="Tipo"
                                :error-messages="tipoErrors"
                                @input="$v.prod.tipo.$touch()"
                                @blur="$v.prod.tipo.$touch()"
                                :items="tipos"
                                    item-text="txt"
                                    item-value="id" 
                        ></v-select>
                  
                        <v-select v-model.trim="$v.prod.estado.$model"
                                label="Estado"
                                :error-messages="estadoErrors"
                                @input="$v.prod.estado.$touch()"
                                @blur="$v.prod.estado.$touch()"
                                :items="estados"
                                    item-text="txt"
                                    item-value="id"
                        ></v-select>

                        <v-text-field v-model.trim="$v.prod.es_name.$model"
                                label="Nombre"
                                :error-messages="es_nameErrors"
                                @input="$v.prod.es_name.touch()"
                                @blur="$v.prod.es_name.touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>

                        <v-text-field v-model.trim="$v.prod.en_name.$model"
                                label="Nombre Ingles"
                                :error-messages="en_nameErrors"
                                @input="$v.prod.en_name.touch()"
                                @blur="$v.prod.en_name.touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="6">
                        <v-card class="mt-1">
                            <v-card-title>
                                Imagén Principal
                                <v-spacer></v-spacer>
                                <v-tooltip bottom>
                                    <template v-slot:activator="{ on }">
                                        <v-btn class="mr-2" color="cyan" fab dark small @click="cambiarImagen" v-on="on"><v-icon>mdi-image</v-icon></v-btn>
                                    </template>
                                    <span v-if="prod.image > 0">Cambiar Imagén</span>
                                    <span v-else>Agregar Imagén</span>
                                </v-tooltip>
                            </v-card-title>
                            <div >
                                <v-img class="mx-15" height="150" width="150" :src="prod.url" ></v-img>
                            </div>
                        </v-card>
                    </v-col>

                    <v-col cols="12" sm="6" md="6">
                  
                    </v-col>

                    <v-col cols="12" sm="6" md="6">
                        
                    </v-col>

                    <v-col cols="12" sm="6" md="6">
                        <v-text-field v-model.trim="$v.prod.es_descripcion.$model"
                                    label="Descripción Corta"
                                    :error-messages="es_descripcionErrors"
                                    @input="$v.prod.es_descripcion.touch()"
                                    @blur="$v.prod.es_descripcion.touch()"
                                    type="text"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="6">
                        <v-text-field v-model.trim="$v.prod.en_descripcion.$model"
                                    label="Descripción Corta Ingles"
                                    :error-messages="en_descripcionErrors"
                                    @input="$v.prod.en_descripcion.touch()"
                                    @blur="$v.prod.en_descripcion.touch()"
                                    type="text"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="12" md="12">
                        <span>Descripción Larga</span>
                        <vue-editor v-model="prod.es_larga" :editorToolbar="customToolbar" id="editor" label="Descripción Larga"></vue-editor>
                    </v-col>

                    <v-col cols="12" sm="12" md="12">
                        <span>Descripción Larga en Ingles</span>
                        <vue-editor v-model="prod.en_larga" :editorToolbar="customToolbar" id="editor" label="Descripción Larga Ingles"></vue-editor>
                    </v-col>
                </v-row>

                <v-btn class="mr-4 mt-3" @click="updateProducto" color="green"
                        dark :error-messages="updateProducto" v-if="this.prod.id > 0"
                >Actualizar</v-btn>

                <v-btn class="mr-4 mt-3" @click="alta" color="blue"
                        dark :error-messages="alta" v-else
                >Guardar</v-btn>
              
            </v-card-text>
        </v-card>
        <!-- Fin Formulario -->
    </div>
</template>

<script>
import { required, minLength, maxLength } from 'vuelidate/lib/validators'
import { VueEditor } from 'vue2-editor'

export default {
    components: {VueEditor},

    props: { prod: {type: Object, required: true},
             attr: {type: Array, required: true},
              },

    data() {
        return {
            text: '',
            color: '',
            snackbar: false,
            estados: [ { txt: 'Inactivo', id: 0 }, { txt: 'Activo', id: 1 }, { txt: 'Baja', id: 2 } ], 
            tipos: [ { txt: 'Productos Swell', id: 1 }, { txt: 'Artículos Ext.', id: 2 } ],
            customToolbar: [ [ { 'size': ['small', false, 'large', 'huge'] } ],
                             [ { 'header': [ 1, 2, 3, 4, 5, 6, false] } ],
                             [ { 'font': [] } ],
                             [ 'bold', 'italic', 'underline', 'strike'],
                             [ { 'color': [] }, { 'background': [] } ],
                             [ { 'align': [] } ],
                             [ { 'header': 1 }, { 'header': 2 } ],
                             [ { 'list': 'ordered' }, { 'list': 'bullet'} ],
                             [ { 'script': 'sub' }, { 'script': 'super' } ],
                             [ { 'indent': '-1' }, { 'indent': '+1' } ],
                             [ 'link'],
                             [ 'image'],
                             [ 'blockquote'],
                             [ 'clean'] ],
            imageModal: false,
            fichaModal: false,
            cat_img: '',
            image_ppal: '',
            files: [],
        }
    },

    watch: {
        'cat_img': function (newVal, oldVal) {
            if ( this.cat_img  != '') {
                const index = this.attr.find( (element) => element.pat_imagen === this.cat_img)
                this.image_ppal = index.pat_imagen
                if (index) this.image_ppal = index.bib_url
                else this.image_ppal = ''
            } else this.image_ppal = ''
        },
    },

    computed: {
        tipoErrors() {
            const errors = []
            if ( !this.$v.prod.tipo.$dirty ) return errors
            !this.$v.prod.tipo.required && errors.push( this.$t('m.required_error'))
            return errors
        },

        estadoErrors() {
            const errors = []
            if ( !this.$v.prod.estado.$dirty ) return errors
            !this.$v.prod.estado.required && errors.push( this.$t('m.required_error'))
            return errors
        },

        es_nameErrors() {
            const errors = []
            if ( !this.$v.prod.es_name.$dirty ) return errors
            !this.$v.prod.es_name.required && errors.push( this.$t('m.required_error'))
            !this.$v.prod.es_name.minLength && errors.push( this.$t('m.min_Lenght_error') + ' 4')
            !this.$v.prod.es_name.maxLength && errors.push( this.$t('m.max_Lenght_error'))
            return errors
        },

        en_nameErrors() {
            const errors = []
            if ( !this.$v.prod.en_name.$dirty ) return errors
            !this.$v.prod.en_name.required && errors.push( this.$t('m.required_error'))
            !this.$v.prod.en_name.minLength && errors.push( this.$t('m.min_Lenght_error') + ' 4')
            !this.$v.prod.en_name.maxLength && errors.push( this.$t('m.max_Lenght_error'))
            return errors
        },

        es_descripcionErrors() {
            const errors = []
            if ( !this.$v.prod.es_descripcion.$dirty ) return errors
            
            return errors
        },

        en_descripcionErrors() {
            const errors = []
            if ( !this.$v.prod.en_descripcion.$dirty ) return errors
            
            return errors
        },
    },

    methods: {
        updateProducto() {
            this.$v.prod.$touch()
            if ( this.$v.prod.$pending || this.$v.prod.$error ) return ;
            
            const params = { id: this.prod.id,  es_name: this.prod.es_name, en_name: this.prod.en_name,
                             es_descripcion: this.prod.es_descripcion, en_descripcion: this.prod.en_descripcion,
                             es_larga: this.prod.es_larga, en_larga: this.prod.en_larga, estado: this.prod.estado,
                             tipo: this.prod.tipo, ficha: this.prod.ficha, image: this.prod.image, 
                             destacado: this.prod.destacado, sw: 1 }
            this.$v.$reset()
            axios.post(`/admin/producto`, params)
                .then( res => {
                    if ( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'error'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General Actualzando los datos General del Producto'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        }, 

        alta() {
            this.$v.prod.$touch()
            if ( this.$v.prod.$pending || this.$v.prod.$error ) return ;
            
            const params = { id: this.prod.id,  es_name: this.prod.es_name, en_name: this.prod.en_name,
                             es_descripcion: this.prod.es_descripcion, en_descripcion: this.prod.en_descripcion,
                             es_larga: this.prod.es_larga, en_larga: this.prod.en_larga, estado: this.prod.estado,
                             tipo: this.prod.tipo, ficha: this.prod.ficha, image: this.prod.image, sw: 0 }
            this.$v.$reset()
            axios.post(`/admin/producto`, params)
                .then( res => {
                    if ( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'error'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        this.prod.id = res.data[3]
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General Agregando los datos General del Producto'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        },

        cambiarImagen() {
            this.imageModal = true
            if ( this.prod.image > 0) {
                this.cat_img = this.prod.image
               
            }
        },

        aceptImagen() {
            if ( this.cat_img == '') {
                this.text = 'Debe seleccionar una Imagen'
                this.color = 'error'
                this.snackbar = true
            } else {
                const index = this.attr.find( (element) => element.pat_imagen === this.cat_img)
                
                if (index) {
                    this.prod.image = index.pat_imagen
                    this.prod.url = index.bib_url
                }
                else {
                    this.prod.image = ''
                    this.prod.url = ''
                }
                this.imageModal = false
                this.cat_img = ''
            }
        },

        cambiarDestacado() {
            axios.post(`/admin/destacado/${this.prod.id}`)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.prod.destacado = res.data[2]
                        this.color = 'success'
                        this.text = 'Se Cambio el producto destacado'
                        this.snackbar = true
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General al realizar el cambio'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        },

        leerPdf() {
          //  const fs = require('fs')
           // this.files = fs.readdirSync('public/ficha')
        },
    },

    validations: {
        prod: {
            tipo: { required },
            estado: { required },
            es_name: { required, minLength: minLength(4), maxLength: maxLength(50) },
            en_name: { required, minLength: minLength(4), maxLength: maxLength(50) },
            es_descripcion: {},
            en_descripcion: {},
        },
    },
}
</script>
