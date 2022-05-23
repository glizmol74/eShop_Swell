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
            <v-dialog v-model="eliminarModal" persistent max-width="600">
                <v-card>
                    <v-card-title class="headline">Seguro que desea Eliminar el Banner</v-card-title>
                    <v-card-text>Esta acción no puede deshacerse</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="eliminarBanners()"> {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- Fin eliminar -->

        <!-- Biblioteca de Imagenes -->
        <v-row justify="center">
            <v-dialog v-model="bibliotecaModal" persistent max-width="800">
                <v-card>
                    <v-card-title class="headline">
                        Biblioteca de Imagenes
                        <v-spacer></v-spacer>
                        <v-select v-model.trim="$v.tipo_biblioteca.$model"
                                    label="Tipo"
                                    :error-messages="tipo_bibliotecaErrors"
                                    @input="$v.tipo_biblioteca.$touch()"
                                    @blur="$v.tipo_biblioteca.$touch()"
                                    :items="selectTipo"
                                        item-text="txt"
                                        item-value="val"
                                    disabled
                            ></v-select>
                    </v-card-title>
                    <v-card-actions>
                        <v-card-text>
                            <v-row justify="space-around">
                                <template v-for="(item) in bibliotecas">
                                    <v-col cols="3" :key="item.id">
                                        <v-card class="d-inline-block mx-auto">
                                            <v-img :src="item.bib_url" height="" width="300px" ></v-img>
                                            <v-card-text class="caption mx-1 px-1 py-0"><strong>{{item.id}}</strong> {{item.bib_nombre}}
                                                <v-tooltip bottom>
                                                    <template v-slot:activator="{ on }">
                                                        <v-btn v-if="item.id == cat_img" icon color="green" x-small v-on="on"><v-icon>mdi-home</v-icon> </v-btn>
                                                        <v-btn v-else icon color="grey" x-small v-on="on" @click="cat_img = item.id"><v-icon>mdi-home</v-icon> </v-btn>
                                                    </template>
                                                    <span>Principal</span>
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
                        <v-row>
                            <v-col cols="5" md="5">
                                <v-card v-if="this.image_ppal" class="d-line-block mx-auto px-3">
                                    <v-card-title class="headline"> Imagen Seleccionada </v-card-title>
                                    <v-img :src="this.image_ppal" height="" width="400px"></v-img>
                                </v-card>
                            </v-col>
                    
                            <v-col cols="7" md="6" class="ml-3" >
                                <v-card v-if="this.tipo_biblioteca != ''" class="d-line-block mx-auto px-4 " >
                                    <v-card-title class="headline"> Nueva Imagen </v-card-title>
                                    <v-card-text>
                                        <v-row>
                                            <v-col cols="12" md="10">
                                                <v-file-input v-model="file" accept="image/*" messages="" @change="previewImagen"></v-file-input>
                                                <v-card class="d-inline-block mx-auto">
                                                    <v-container v-if="this.img_banner!= ''">
                                                        <v-img height="" width="400px" :src="img_banner"></v-img>
                                                        <v-card-text class="caption mx-1 px-1 py-0" >
                                                            <v-tooltip bottom>
                                                                <template v-slot:activator="{ on }">
                                                                    <v-btn icon color="green" x-small v-on="on" @click="addImagen"><v-icon>mdi-marker-check</v-icon> </v-btn>
                                                                </template>
                                                                <span>Alta</span>
                                                            </v-tooltip>
                                                            <v-tooltip bottom>
                                                                <template v-slot:activator="{ on }">
                                                                    <v-btn icon color="red" x-small v-on="on" @click="cancelImagen"><v-icon>mdi-close</v-icon> </v-btn>
                                                                </template>
                                                                <span>Cancelar</span>
                                                            </v-tooltip>
                                                        </v-card-text>
                                                    </v-container>
                                                   {{ this.namefile }}
                                                </v-card>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>
                            </v-col>
                        </v-row>
                    </v-card>
                    <v-spacer></v-spacer>
                    <v-card class="my-2">
                        <v-btn color="red darken-1" text @click="bibliotecaModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-4" text @click="aceptImagen"> {{this.$t('m.acept')}} </v-btn>
                    </v-card>
                </v-card>
            </v-dialog>
        </v-row>

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Banners</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu_es" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu_en" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Formulario -->
        <v-card class="mt-3" :loading="loading_file" :disabled="disable_files">
           
                <v-card-title> 
                    <div v-if="editando">{{ formTitle }} </div>
                    <v-spacer></v-spacer>
                <v-btn @click="nuevoBanners()" class="mr-4 mt-3" color="purple" dark>{{this.$t('m.new')}} </v-btn>
                </v-card-title>
                <v-card-text>
                    <v-row>
                    
                        <v-col cols="6" md="3">
                            <v-select v-model.trim="$v.banner.tipo.$model"
                                    label="Tipo"
                                    :error-messages="tipoErrors"
                                    @input="$v.banner.tipo.$touch()"
                                    @blur="$v.banner.tipo.$touch()"
                                    :items="selectTipo"
                                        item-text="txt"
                                        item-value="val"
                                    :disabled="!editando"
                            ></v-select>
                        </v-col>

                        <v-col cols="6" md="3">
                            <v-text-field v-model.trim="$v.banner.extra.$model"
                                        label="Titulo ó Commando"
                                        :error-messages="extraErrors"
                                        @input="$v.banner.extra.$touch()"
                                        @blur="$v.banner.extra.$touch()"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col> 

                        <v-col cols="6" md="3">
                            <v-text-field v-model.trim="$v.banner.posicion.$model"
                                        label="Orden"
                                        :error-messages="posicionErrors"
                                        @input="$v.banner.posicion.$touch()"
                                        @blur="$v.banner.posicion.$touch()"
                                        type="number"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="6" md="3">
                            <v-select v-if="banner.tipo == 2 || banner.tipo == 5 " v-model.trim="$v.banner.align.$model"
                                    label="Centrado Vertical"
                                    :error-messages="alignErrors"
                                    @input="$v.banner.align.$touch()"
                                    @blur="$v.banner.align.$touch()"
                                    :items="selectSubCategoria"
                                        item-text="txt"
                                        item-value="val"
                                    :disabled="!editando"
                            ></v-select>
                            <v-select v-else v-model.trim="$v.banner.align.$model"
                                    label="Centrado Vertical"
                                    :error-messages="alignErrors"
                                    @input="$v.banner.align.$touch()"
                                    @blur="$v.banner.align.$touch()"
                                    :items="selectCentradoVertical"
                                        item-text="txt"
                                        item-value="val"
                            ></v-select>
                        </v-col>

                        <v-col cols="6" md="3">
                            <v-select v-model.trim="$v.banner.justify.$model"
                                    label="Centrado Horizontal"
                                    :error-messages="justifyErrors"
                                    @input="$v.banner.justify.$touch()"
                                    @blur="$v.banner.justify.$touch()"
                                    :items="selectHorizontal"
                                        item-text="txt"
                                        item-value="val"
                                    :disabled="!editando"
                            ></v-select>
                        </v-col>

                        <v-col cols="6" md="3">
                            <v-text-field v-model.trim="$v.banner.padding.$model"
                                        label="Padding"
                                        :error-messages="paddingErrors"
                                        @input="$v.banner.padding.$touch()"
                                        @blur="$v.banner.padding.$touch()"
                                        messages="x% T-R-B-L"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="6" md="3">
                            <v-text-field v-model.trim="$v.banner.margin.$model"
                                        label="Margin"
                                        :error-messages="marginErrors"
                                        @input="$v.banner.margin.$touch()"
                                        @blur="$v.banner.margin.$touch()"
                                        messages="x% T-R-B-L"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="6" md="3">
                            <v-text-field v-model.trim="$v.banner.class.$model"
                                        label="Class"
                                        :error-messages="classErrors"
                                        @input="$v.banner.class.$touch()"
                                        @blur="$v.banner.class.$touch()"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="12">
                            <v-text-field v-model.trim="$v.banner.es_text.$model"
                                        label="Text"
                                        :error-messages="es_textErrors"
                                        @input="$v.banner.es_text.$touch()"
                                        @blur="$v.banner.es_text.$touch()"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="12">
                            <v-text-field v-model.trim="$v.banner.en_text.$model"
                                        label="Text en Ingles"
                                        :error-messages="en_textErrors"
                                        @input="$v.banner.en_text.$touch()"
                                        @blur="$v.banner.en_text.$touch()"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>
                        
                        <!-- imagen Carrousel-->
                        <v-col v-if="banner.tipo == 1" cols="9" md="9">
                            <v-carousel hide-delimiters  height="auto" width="300" >
                                <v-carousel-item  :src="banner.image" :style="{ background: banner.color}" :cover="true">
                                    <v-row class="slider-txt fill-height" :align="banner.align" :justify="banner.justify" height="100%" color="s.color">
                                        <div v-if="$i18n.locale ==='es'" :class="banner.class" :style="{
                                            textAlign: banner.textalign,
                                            color: banner.colortext,
                                            padding: banner.padding,
                                            margin: banner.margin,
                                            backgroundColor: banner.background_text,     
                                            }" style="border-radius:2px;"
                                        >
                                        
                                            <h3> {{ banner.es_text }}</h3>
                                        </div>
                                        <div v-else :class="banner.class" :style="{
                                            textAlign: banner.textalign,
                                            color: banner.colortext,
                                            padding: banner.padding,
                                            margin: banner.margin,
                                            backgroundColor: banner.background_text,     
                                            }" style="border-radius:2px;"
                                        >
                                        
                                            <h3>{{ banner.en_text }}</h3>
                                        </div>

                                    </v-row>
                                </v-carousel-item>
                            </v-carousel>
                        </v-col>

                        <!-- imagen Categorias -->
                        <v-col v-else-if="banner.tipo == 2" cols="9" md="9" class="masonry-column">
                            <template>
                                <div>
                            <a  style="text-decoration:nono" >
                                <v-hover v-slot:default="{ hover }">
                                    <v-img :src="banner.image" aspect-ratio="1" :class="banner.class" :style="banner.margin" height="250">
                                        <v-expand-transition>
                                            <div v-if="hover" :style="{color: banner.colortext, backgroundColor: banner.color}"
                                                    class="d-flex scale-transition title text-uppercase font-weight-medium v-card--reveal text-center"
                                                    style="height:100%;"
                                            >
                                                <div v-if="$i18n.locale==='es'">{{ banner.es_text }}</div>
                                                <div v-else>{{ banner.en_text }}</div>
                                            </div>
                                        </v-expand-transition>
                                    </v-img>
                                </v-hover>
                            </a>
                            </div>
                            </template>
                        </v-col>

                        <!-- imagen otras -->
                        <v-col v-else cols="9" md="9">
                            <template>
                                <v-card class="mx-auto" max-width="400" height="250">
                                    <v-img :src="banner.image" height="250" width="400">
                                       
                                    </v-img> 
                                </v-card>
                            </template> 
                        </v-col>

                        <v-col cols="3" md="3">
                            <template > 
                                <v-card class="mx-auto" max-width="400" height="250">
                                    
                                    <v-card-text class="text-center">
                                        <v-btn v-if="banner.image === ''" color="green darken-4" @click="bibliotecaModal = true" class="my-15" :disabled="!editando || banner.tipo == ''">Seleccionar Imagen</v-btn>
                                        <v-btn v-else color="green darken-2" @click="bibliotecaModal = true" :disabled="!editando || banner.tipo == ''">Cambiar Imagen</v-btn>
                                    </v-card-text>
                                </v-card>
                            </template> 
                        </v-col>

                        <v-col cols="6" md="4">
                            <span>Bacground de Texto</span>
                            <v-color-picker class="ma-2" dot-size="30"
                                            v-model.trim="banner.background_text"
                                            :disabled="!editando"
                            ></v-color-picker>
                        </v-col>

                        <v-col cols="6" md="4">
                            <span>Color de Texto</span>
                            <v-color-picker class="ma-2" dot-size="30"
                                            v-model.trim="banner.colortext"
                                            :disabled="!editando"
                            ></v-color-picker>
                        </v-col>

                        <v-col cols="6" md="4">
                            <span>Color de Fondo</span>
                            <v-color-picker class="ma-2" dot-size="30"
                                            v-model.trim="banner.color"
                                            :disabled="!editando"
                            ></v-color-picker>
                        </v-col>

                        
                    </v-row>

                    <v-row>
                        <v-btn v-if="modoEditar" class="mr-4 mt-3" @click="editarBanners(banner)" color="blue" dark large rounded >
                            <v-icon left>mdi-pencil</v-icon>
                            {{this.$t('m.save')}} 
                        </v-btn>
                        <v-btn v-else class="mr-4 mt-3" @click="alta()" color="blue" dark large rounded :disabled="!editando">
                            <v-icon left>mdi-image-area</v-icon>
                            {{this.$t('m.high')}} 
                        </v-btn>
                        <v-btn v-if="modoEditar || nb"  class="mr-4 mt-3" @click="cancelarEdicion()" color="red" dark large rounded >
                            <v-icon left>mdi-close-circle-outline</v-icon>
                            {{this.$t('m.cancel')}} 
                        </v-btn>
                    </v-row>
                </v-card-text>
            
        </v-card>
        <!-- Fin Formulario -->

        <!-- Tabla de Banners -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Categorías  
                <v-spacer></v-spacer>
                <v-text-field v-model="search" append-icon="mdi-magnify"
                                :label="this.$t('m.search')" single-line hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table :headers="headers" :items="banners" :items-per-page="10" :search="search" class="elevations-1 mr-5 ml-5">
                <template v-slot:item.tipo="{item}">
                    <v-chip>{{buscarTipo(item.tipo)}} </v-chip>
                </template>
                <template v-slot:item.edit="{item}">
                    <v-btn color="green" small dark @click="editarFormulario(item)">
                        <v-icon small>mdi-pencil</v-icon>
                    </v-btn>
                </template>

                <template v-slot:item.delet="{item}">
                    <v-btn color="red" small dark @click="eliminar(item)">
                        <v-icon small>mdi-delete</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script>
import { required, maxLength, numeric } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            eliminarModal: false,
            loading_file: false,
            disable_files: false,
            bibliotecaModal: false,
            cat_img: '',
            image_ppal: '',
            previewImage: null,
            file: [],
            namefile: '',
            text: '1',
            color: '',
            snackbar: false,
            banners: [],
            bibliotecas: [],
            modoEditar: false,
            nb:false,
            editando: false,
            loading: true,
            img_banner: '',
            tipo_biblioteca: '',
            banner: {id: '', tipo: '', posicion: '', extra: '', align: '', justify: '', padding: '',
                     margin: '', background_text: '', es_text: '', en_text: '', class: '', 
                     colortext: '', color: '', image: '', id_bib: '' },
            search: '',
            headers: [
                { text: 'Id', value: 'id',},
                { text: 'Nombre', value: 'extra',},
                { text: 'Tipo', value: 'tipo',},
                { text: 'Orden', value: 'posicion',},
                { text: 'Texto', value: 'es_text',},
                { text: 'Editar', value: 'edit', sortable: false,},
                { text: 'Eliminar', value: 'delet', sortable: false,},
            ],
            breadmenu_es: [
                {text: 'Swell', disabled: false, href: '/',},
                {text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                {text: 'Banner', disabled: true, href: '/banners',}
            ],
            breadmenu_en: [
                {text: 'Swell', disabled: false, href: '/',},
                {text: 'Banner', disabled: true, href: '/banners',}
            ],
            selectTipo: [ 
                { txt: 'Banner Home', val:1}, 
                { txt: 'Categorías', val: 2},
                { txt: 'Banner Cobranding', val: 3},
                { txt: 'Banner Como Comprar', val:4},
                { txt: 'Categorías (superior en página)', val:5}
            ],
            selectCentradoVertical: [
                { txt: 'Superior', val: 'start'},
                { txt: 'Centrado', val: 'center'},
                { txt: 'Inferior', val: 'end'}
            ],   
            selectHorizontal: [
                { txt: 'Izquierda', val: 'start'},
                { txt: 'Derecha', val: 'end'},
                { txt: 'Centrado', val: 'center'}
            ],

            selectSubCategoria: [
                { txt: 'Categoría Media Size', val: 6},
                { txt: 'Categoría Full Size', val:12}
            ],

            libreria: ['',
                '/storage/sliders/home',
                '/storage/sliders/categoria',
                '/storage/images/cobranding',
                '/storage/images/comocomprar',
                '/storage/sliders/pag_cat',
            ],
            ruta: ['',
                'public/sliders/home',
                'public/sliders/categoria',
                'public/images/cobranding',
                'public/images/comocomprar',
                'public/sliders/pag_cat',
            ],
        }
        
    },

    created() {
        axios.get('/admin/banners/data')
            .then( res => {
                this.banners = res.data
            })
    },

    watch: {
        'banner.tipo': function ( newVal, oldVal) {
            
            if ( this.tipo_biblioteca != this.banner.tipo ) {
                this.banner.image = ''
                this.banner.bib_url = ''
            }
            this.tipo_biblioteca = this.banner.tipo
        },
        'cat_img': function (newVal, oldVal) {
            if ( this.cat_img  != '') {
                this.image_ppal = 'aa'
                const index = this.bibliotecas.find( (element) => element.id === this.cat_img)
                this.image_ppal = index.id
                if (index) this.image_ppal = index.bib_url
                else this.image_ppal = ''
            } else this.image_ppal = ''
        },
        'tipo_biblioteca': function( newVal, oldVal) {
            let lib = this.libreria[this.tipo_biblioteca]+'/%';
            this.image_ppal = ''
            const params = {id: this.tipo_biblioteca, lib: lib, sw:2}
            axios.post(`/admin/banners`, params)
                .then( res => {
                    this.bibliotecas = res.data[2]
                })
                .catch(error => {
                    console.log(error)
                })
        },
    },

    computed: {
        tipoErrors() {
            const errors = []
            if ( !this.$v.banner.tipo.$dirty ) return errors
            !this.$v.banner.tipo.numeric && errors.push(this.$t('m.message_numeric'))
            !this.$v.banner.tipo.required && errors.push(this.$t('m.required_error'))
            return errors
        },
        tipoBibliotecaErrors() {
            const errors = []
            if ( !this.$v.tipo_biblioteca.$dirty ) return errors
            !this.$v.tipo_biblioteca.numeric && errors.push(this.$t('m.message_numeric'))
            !this.$v.tipo_biblioteca.required && errors.push(this.$t('m.required_error'))
            return errors
        },
        posicionErrors() {
            const errors = []
            if ( !this.$v.banner.posicion.$dirty ) return errors
            !this.$v.banner.posicion.numeric && errors.push(this.$t('m.message_numeric'))
            !this.$v.banner.posicion.required && errors.push(this.$t('m.required_error'))
            return errors
        },
        extraErriors() {
            const errors = []
            if ( !this.$v.banner.extra.$dirty ) return errors
            !this.$v.banner.extra.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        alignErrors() {
            const errors = []
            if ( !this.$v.banner.align.$dirty ) return errors
            !this.$v.banner.align.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        justifyErrors() {
            const errors = []
            if ( !this.$v.banner.justify.$dirty ) return errors
            !this.$v.banner.justify.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        paddingErrors() {
            const errors = []
            if ( !this.$v.banner.padding.$dirty ) return errors
            !this.$v.banner.padding.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        marginErrors() {
            const errors = []
            if ( !this.$v.banner.margin.$dirty ) return errors
            !this.$v.banner.margin.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        background_textErrors() {
            const errors = []
            if ( !this.$v.banner.background_text.$dirty ) return errors
            !this.$v.banner.background_text.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        es_textError() {
            const errors = []
            if ( !this.$v.banner.es_text.$dirty ) return errors
            !this.$v.banner.es_text.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        en_textErrors() {
            const errors = []
            if ( !this.$v.banner.en_text.$dirty ) return errors
            !this.$v.banner.en_text.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        classErrors() {
            const errors = []
            if ( !this.$v.banner.class.$dirty ) return errors
            !this.$v.banner.class.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        colortextErrors() {
            const errors = []
            if ( !this.$v.banner.colortext.$dirty ) return errors
            !this.$v.banner.colortext.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        colorError() {
            const errors = []
            if ( !this.$v.banner.color.$dirty ) return errors
            !this.$v.banner.color.maxLength && errors.push(this.$t('m.max_lenght_error'))
            return errors
        },
        formTitle() {
            return this.modoEditar === false ? 'Nuevo Banner' : 'Editar Banner'
        },
    },

    methods: {
     
        previewImagen: function(event) {
            
            let reader = new FileReader();
     
            reader.onload = () => {
                    this.img_banner = reader.result;
                    
                }
                
                reader.readAsDataURL(this.file); 
                this.namefile = this.file.name      
        },

        buscarTipo(id) {
            const index = this.selectTipo.find( (element) => element.val === id)
            return index.txt
        },

        addImagen() {
            if ( this.img_banner == '') return
            
            let file = new FormData()
            file.append("files", this.file)
            file.append("id", this.libreria[this.tipo_biblioteca]+'/%')
            file.append("nombre", this.namefile)
            file.append("url", this.libreria[this.tipo_biblioteca]+ "/" + this.namefile )
            file.append("ruta", this.ruta[this.tipo_biblioteca] )

            axios.post('/admin/biblioteca/new', file, {headers: {'Content-Type': 'multipart/form-data'} } )
                .then( res => {
                    if (res.data[0] == 0 ) {
                        this.color = 'error'
                        this.text = res.data[1]
                        this.snackbar = true
                    }else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.img_banner = ''
                        this.file = []
                        this.snackbar = true
                        this.bibliotecas = res.data[2]
                        this.cat_img = res.data[3]
                        this.namefile = ''
                    }
                })
        },

        cancelImagen() {
            this.file = []
            this.img_banner = ''
            
        },

        aceptImagen() {
            if ( this.cat_img == '') {
                this.text = 'Debe seleccionar una Imagen'
                this.color = 'error'
                this.snackbar = true
            } else {
                const index = this.bibliotecas.find( (element) => element.id === this.cat_img)
                
                if (index) {
                    this.banner.image = index.bib_url
                    this.banner.id_bib = index.id
                }
                else {
                    this.banner.image = ''
                    this.banner.id_bib = ''
                }
                this.bibliotecaModal = false
                this.cat_img = ''
            }
        },

        nuevoBanners() {
            this.nb = true
            this.editando = true
            this.banner.id = 0
        },

        alta() {
            this.$v.banner.$touch()
            if ( this.$v.banner.$peding || this.$v.banner.$error ) return

            const params = { id: this.banner.id,
                             tipo: this.banner.tipo,
                             posicion: this.banner.posicion,
                             extra: this.banner.extra,
                             align: this.banner.align,
                             justify: this.banner.justify,
                             padding: this.banner.padding,
                             margin: this.banner.margin,
                             background_text: this.banner.background_text,
                             es_text: this.banner.es_text,
                             en_text: this.banner.en_text,
                             class: this.banner.class,
                             colortext: this.banner.colortext,
                             color: this.banner.color,
                             id_bib: this.banner.id_bib,
                             sw: 1,
                        }
            axios.post(`/admin/banners`, params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'error'
                        this.snackbar = true
                    } else {
                        this.modoEditar = false
                        this.banners = res.data[2]
                        this.text = 'Se agrego el Banner Correctamente'
                        this.color = 'success'
                        this.snackbar = true
                        this.$v.$reset()
                        this.cancelarEdicion()
                        this.editando = false
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General Editando el Banner Contacte al Administrador'
                    this.color = 'bg-danger'
                    this.snackbar = true
                    console.log( error.response)
                })
        },

        cancelarEdicion() {
            this.$v.$reset()
            this.banner.id = ''
            this.banner.tipo = ''
            this.banner.posicion = ''
            this.banner.extra = ''
            this.banner.align = ''
            this.banner.justify = ''
            this.banner.padding = ''
            this.banner.margin = ''
            this.banner.background_text = ''
            this.banner.es_text = ''
            this.banner.en_text = ''
            this.class = ''
            this.colortext = ''
            this.color = ''
            this.banner.image = ''
            this.banner.id_bib = ''
            this.file = []
            this.modoEditar = false
            this.editando = false
            this.nb = false
        },

        eliminar(item) {
            this.banner.id = item.id
            this.eliminarModal = true
        },

        eliminarBanners() {
            const params = {id: this.banner.id, sw: 3}
            axios.post(`/admin/banners`, params)
                .then( res => {
                    this.banners = res.data
                    this.text = 'Se eliminor el Banner Correxctamente'
                    this.color = 'success'
                    this.eliminarModal = false
                    this.snackbar = true
                })
                .catch( error => {
                    this.text = 'Hubo un error eliminando el Banner'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        },

        editarFormulario(item) {
            this.banner.id = item.id
            this.banner.tipo = item.tipo
            this.banner.posicion = item.posicion
            this.banner.extra = item.extra
            this.banner.align = item.align
            this.banner.justify = item.justify
            this.banner.padding = item.padding
            this.banner.margin = item.margin
            this.banner.background_text = item.background_text
            this.banner.es_text = item.es_text
            this.banner.en_text = item.en_text
            this.banner.class = item.class
            this.banner.colortext = item.colortext
            this.banner.color = item.color
            this.banner.image = item.image
            this.banner.id_bib = item.id_bib
            this.modoEditar = true
            this.editando = true
        },

        editarBanners() {
            this.$v.banner.$touch()
            if ( this.$v.banner.$peding || this.$v.banner.$error ) return

            const params = { id: this.banner.id,
                             tipo: this.banner.tipo,
                             posicion: this.banner.posicion,
                             extra: this.banner.extra,
                             align: this.banner.align,
                             justify: this.banner.justify,
                             padding: this.banner.padding,
                             margin: this.banner.margin,
                             background_text: this.banner.background_text,
                             es_text: this.banner.es_text,
                             en_text: this.banner.en_text,
                             class: this.banner.class,
                             colortext: this.banner.colortext,
                             color: this.banner.color,
                             id_bib: this.banner.id_bib,
                             sw: 1,
                        }
            axios.post(`/admin/banners`, params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'error'
                        this.snackbar = true
                    } else {
                        this.modoEditar = false
                        this.banners = res.data[2]
                        this.text = 'Se editó el Banner Correctamente'
                        this.color = 'success'
                        this.snackbar = true
                        this.$v.$reset()
                        this.cancelarEdicion()
                        this.editando = false
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General Editando el Banner Contacte al Administrador'
                    this.color = 'bg-danger'
                    this.snackbar = true
                    console.log( error.response)
                })
        },
    },

    validations: {
        banner: {
            id: { numeric },
            tipo: { numeric, required },
            posicion: { numeric, required },
            extra: { maxLength: maxLength(90) },
            align: { maxLength: maxLength(90) },
            justify: { maxLength: maxLength(90) },
            padding: { maxLength: maxLength(90) },
            margin: { maxLength: maxLength(90) },
            background_text: { maxLength: maxLength(90) },
            es_text: { maxLength: maxLength(90) },
            en_text: { maxLength: maxLength(90) },
            class: { maxLength: maxLength(90) },
            colortext: { maxLength: maxLength(90) },
            color: { maxLength: maxLength(90) },
            image: { required, maxLength: maxLength(90) },
        },
        tipo_biblioteca: { numeric, required},
    },

}
</script>


<style scoped>
.imagePreview {
    width: 300px;
    height: 300px;
    display: block;
    cursor: pointer;
    margin: 0 auto 30px;
    background-size: cover;
    background-position: center center;
}

.masonry-column {
        padding: 20px 5px 0px 5px;
    }

 .masonry-column-grid > div .thumbnail {
        margin: 10px 10px;
    }
.v-card--reveal {
        align-items: center;
        bottom: 0;
        justify-content: center;
        position: absolute;
        width: 100%;
    }

</style