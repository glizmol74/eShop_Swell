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

        <!-- Dialogo de biblioteca  de Imagen -->
        <v-row justify="center">
            <v-dialog v-model="bibliotecaModal" persistent max-width="80%">
                <v-card>
                    <v-card-title class="headline">
                        Biblioteca de Imagenes  
                        <v-spacer></v-spacer>
                    </v-card-title>
                    <v-card-actions>
                        <v-card-text>
                            <v-row justify="space-around">
                                <template v-for="(item) in bibliotecas">
                                    <v-col cols="3" :key="item.id">
                                        <v-card class="d-inline-block mx-auto">
                                            <v-img :src="item.bib_url" height="150px" width="150px" ></v-img>
                                            <v-card-text class="caption mx-1 px-1 py-0"><strong>{{item.id}}</strong> {{item.bib_nombre}}
                                                <v-tooltip bottom>
                                                    <template v-slot:activator="{ on }">
                                                        <v-btn v-if="item.id == cat_img" icon color="green" x-small v-on="on"><v-icon>mdi-home</v-icon> </v-btn>
                                                        <v-btn v-else icon color="grey" x-small v-on="on" @click="cat_img = item.id"><v-icon>mdi-home</v-icon> </v-btn>
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
                        <v-row>
                            <v-col cols="5" md="5">
                                <v-card  class="d-line-block mx-auto px-3">
                                    <v-card-title class="headline"> Imagen Seleccionada </v-card-title>
                                    <v-img :src="this.image_ppal" height="300px" width="300px"></v-img>
                                </v-card>
                            </v-col>
                    
                            <v-col cols="7" md="6" class="ml-3" >
                                <v-card  class="d-line-block mx-auto px-4 " >
                                    <v-card-title class="headline"> Nueva Imagen </v-card-title>
                                    <v-card-text>
                                        <v-row>
                                            <v-col cols="12" md="10">
                                                <v-file-input v-model="file" accept="image/*" messages="" @change="previewImagen"></v-file-input>
                                                <v-card class="d-inline-block mx-auto">
                                                    <v-container v-if="this.img_prod!= ''">
                                                        <v-img height="" width="400px" :src="img_prod"></v-img>
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
        <!-- Fin Dialogo de imagen -->

        <!-- Tabla -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Presentación {{name}} 
                <v-spacer></v-spacer>
                <v-text-field v-model="search"
                            append-icon="mdi-magnify"
                            label="Buscar"
                            single-line
                            hide-details
                ></v-text-field>
            </v-card-title>

            <v-data-table :headers="headers_atributos" :items="attr" sort-by="pat_orden">
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-dialog v-model="insertAtributo" max-width="80%" persistent>
                            <template v-slot:activator="{ on }">
                                <v-btn color="blue" dark class="mb-2" v-on="on" @click="nuevoAtributo" :disabled="present">Nueva Presentación</v-btn>
                            </template>

                            <v-card>
                                <v-card-title><span class="headline">Presentación  </span></v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" md="3">
                                                <v-text-field v-model="name"
                                                label="Producto"
                                                disabled
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" md="3">
                                                <v-select v-model.trim="$v.atributo.pat_attr.$model"
                                                        label="Presentacion"
                                                        :error-messages="idErrors"
                                                        :items="lista_atributos"
                                                            item-value="id"
                                                            item-text="atr_es_name"
                                                ></v-select>
                                            </v-col>

                                            <v-col cols="12" md="3">
                                                <v-text-field v-model.trim="$v.atributo.pat_cod_tempo.$model"
                                                            label="Cod. Tempo"
                                                            :error-messages="tempoErrors"
                                                            @input="$v.atributo.pat_cod_tempo.$touch()"
                                                            @blur="$v.atributo.pat_cod_tempo.$touch()"
                                                            type="text"
                                                            :counter="15"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" md="3">
                                                <v-text-field v-model.trim="$v.atributo.pat_orden.$model"
                                                            label="Orden"
                                                            :error-messages="ordenErrors"
                                                            @input="$v.atributo.pat_orden.$touch()"
                                                            @blur="$v.atributo.pat_orden.$touch()"
                                                            type="number"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" md="3">
                                                <v-text-field v-model.trim="$v.atributo.pat_precio_dst.$model"
                                                            label="Precio Distribuidor"
                                                            :error-messages="dstErrors"
                                                            @input="$v.atributo.pat_precio_dst.$touch()"
                                                            @blur="$v.atributo.pat_precio_dst.$touch()"
                                                            type="decimal"
                                                            prefix="$"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" md="3">
                                                <v-text-field v-model.trim="$v.atributo.pat_precio_esp.$model"
                                                            label="Precio Especial"
                                                            :error-messages="espErrors"
                                                            @input="$v.atributo.pat_precio_esp.$touch()"
                                                            @blur="$v.atributo.pat_precio_esp.$touch()"
                                                            type="decimal"
                                                            prefix="$"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" md="3">
                                                <v-text-field v-model.trim="$v.atributo.pat_precio_emp.$model"
                                                            label="Precio Empresa"
                                                            :error-messages="empErrors"
                                                            @input="$v.atributo.pat_precio_emp.$touch()"
                                                            @blur="$v.atributo.pat_precio_emp.$touch()"
                                                            type="decimal"
                                                            prefix="$"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" md="3">
                                                <v-text-field v-model.trim="$v.atributo.pat_precio_usr.$model"
                                                            label="Precio Usuario Final"
                                                            :error-messages="usrErrors"
                                                            @input="$v.atributo.pat_precio_usr.$touch()"
                                                            @blur="$v.atributo.pat_precio_usr.$touch()"
                                                            type="decimal"
                                                            prefix="$"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="6" md="4">
                                                <v-card class="mt-3" height="300">
                                                    <v-card-title>Imagén
                                                        <v-spacer></v-spacer>
                                                        <v-tooltip bottom>
                                                            <template v-slot:activator="{ on }">
                                                                <v-btn class="mr-2" color="cyan" fab dark small @click="cambiarImagen" v-on="on"><v-icon>mdi-image</v-icon></v-btn>
                                                            </template>
                                                            <span v-if="url ==''">Agregar Imagén</span>
                                                            <span v-else>Cambiar Imagén</span>
                                                        </v-tooltip>
                                                    </v-card-title>
                                                    <v-card-text class="text-center mx-3">
                                                        <v-img :src="url" height="200px" width="200px"></v-img>
                                                    </v-card-text>
                                                </v-card>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="cancelAtributo">Cancelar</v-btn>
                                    <v-btn color="blue darken-1" text @click="agregarAtributo">Guardar</v-btn>
                                   
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>

                <template v-slot:item.pat_estado="{item}">
                    <v-switch v-model="item.pat_estado" @change="cambiarEstado(item)"></v-switch>
                </template>

                <template v-slot:item.bib_url="{item}">
                    <span v-if="item.bib_url!=null">
                        <v-img width="100px" :src="item.bib_url"></v-img>
                    </span>
                </template>

                <template v-slot:item.pat_precio_dst="{item}">
                    {{item.pat_precio_dst | dollar}}
                </template>

                <template v-slot:item.pat_precio_esp="{item}">
                    {{item.pat_precio_esp | dollar}}
                </template>

                <template v-slot:item.pat_precio_emp="{item}">
                    {{item.pat_precio_emp | dollar}}
                </template>

                <template v-slot:item.pat_precio_usr="{item}">
                    {{item.pat_precio_usr | dollar}}
                </template>

                <template v-slot:item.actions="{item}">
                    <v-btn class="mr-2" fab dark small @click="editItem(item)" color="cyan" ><v-icon small>mdi-pencil</v-icon></v-btn>
                    <v-btn class="mr-2" fab dark small @click="eliminarItem(item)" color="red"><v-icon small>mdi-trash-can-outline</v-icon></v-btn>
                </template>

            </v-data-table>
        </v-card>
        <!-- Fin Tabla -->
    </div>
</template>

<script>
import { required, decimal, numeric, minLength, maxLength } from "vuelidate/lib/validators";

export default {
    props: { 
        prod: {type: String, required: true},
        attr: {type: Array, required: true},
        name: {type: String, required: true},
        tipo_p : {type: BigInt, required: true},
    },
    data() {
        return {
            text: '',
            color: '',
            snackbar: false,
            insertAtributo: false,
            bibliotecaModal: false,
            img_prod: '',
            cat_img: '',
            image_ppal: '',
            url: '',
            search: '',
            atributos_prod: [],
            lista_atributos: [],
            bibliotecas: [],
            file: [],
            namefile: '',
            na: false,
            atributo: { id: '', pat_prod: this.prod, pat_attr: '', atr_es_name: '', pat_imagen: '', bib_url: '',
                        pat_precio_usr: '', pat_precio_emp: '', pat_precio_esp: '', pat_precio_dst: '',
                        pat_cod_tempo: '', pat_estado: '', pat_orden: ''},
            headers_atributos: [ { text: 'Presentación', value: 'atr_es_name'},
                                { text: 'Dist.', value: 'pat_precio_dst'},
                                { text: 'Esp.', value: 'pat_precio_esp'},
                                { text: 'Emp.', value: 'pat_precio_emp'},
                                { text: 'C. Final', value: 'pat_precio_usr'},
                                { text: 'Imagén', value: 'bib_url'},
                                { text: 'Cod. Tempo', value: 'pat_cod_tempo'},
                                { text: 'Orden', value: 'pat_orden'},
                                { text: 'Estado', value: 'pat_estado'},
                                { text: 'Acciones', value: 'actions', sortable:false}],
            lib: '/storage/images/tienda/1',
            ruta: 'public/images/tienda',
            present: false,
            
        }
    },

    created() {
         if ( this.tipo_p == 1) {
            this.lib = '/storage/images/tienda/'
            this.ruta = 'public/images/tienda'
        } else {
            this.lib = '/storage/images/tienda/art/'
            this.ruta = 'public/images/tienda/art'
        }
        const params = {id: 2, lib: this.lib+'%', sw: 2}
        axios.post('/admin/banners', params )
            .then( res => {
                this.bibliotecas = res.data[2]
            })
            .catch(error => {
                console.log(error)
            }) 

        axios.get('/admin/atributos')
            .then( res => {
                this.lista_atributos = res.data
            })
        this.atributos_prod = attr
        if ( this.prod == 'new')
            this.present = true
        else
            this.present = false

       

        
    },
    mounted() {
        this.atributos_prod = this.attr
         if ( this.prod == 'new')
            this.present = true
        else
            this.present = false
        if ( this.tipo_p == 1) {
            this.lib = '/storage/images/tienda/'
            this.ruta = 'public/images/tienda'
        } else {
            this.lib = '/storage/images/tienda/art/'
            this.ruta = 'public/images/tienda/art'
        }
    },

    watch: {
        'cat_img': function (newVal, oldVal) {
            if ( this.cat_img  != '') {
                this.image_ppal = 'aa'
                const index = this.bibliotecas.find( (element) => element.id === this.cat_img)
                this.image_ppal = index.id
                if (index) this.image_ppal = index.bib_url
                else this.image_ppal = ''
            } else this.image_ppal = ''
        },
        'prod' : function() {
            if ( this.prod == 'new')
            this.present = true
        else
            this.present = false
        },
    },

    computed: {
        idErrors() {
            const errors = []
            if ( !this.$v.atributo.pat_attr.$dirty ) return errors
            !this.$v.atributo.pat_attr.required && errors.push( this.$t('m.required_error'))
            return errors
        },

        tempoErrors() {
            const errors = []
            if ( !this.$v.atributo.pat_cod_tempo.$dirty ) return errors
            !this.$v.atributo.pat_cod_tempo.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        ordenErrors() {
            const errors = []
            if ( !this.$v.atributo.pat_orden.$dirty ) return errors
            !this.$v.atributo.pat_orden.numeric && errors.push( this.$t('m.message_numeric'))
            return errors
        },

        dstErrors() {
            const errors = []
            if ( !this.$v.atributo.pat_precio_dst.$dirty ) return errors
            !this.$v.atributo.pat_precio_dst.decimal && errors.push( this.$t('m.message_numeric'))
            return errors
        },

        espErrors() {
            const errors = []
            if ( !this.$v.atributo.pat_precio_esp.$dirty ) return errors
            !this.$v.atributo.pat_precio_esp.decimal && errors.push( this.$t('m.message_numeric'))
            return errors
        },

        empErrors() {
            const errors = []
            if ( !this.$v.atributo.pat_precio_emp.$dirty ) return errors
            !this.$v.atributo.pat_precio_emp.decimal && errors.push( this.$t('m.message_numeric'))
            return errors
        },

        usrErrors() {
            const errors = []
            if ( !this.$v.atributo.pat_precio_usr.$dirty ) return errors
            !this.$v.atributo.pat_precio_usr.decimal && errors.push( this.$t('m.message_numeric'))
            return errors
        },
    },

    methods: {
        cancelAtributo() {
            this.insertAtributo = false
            this.atributo = { id: '', pat_prod: '', pat_attr: '', atr_es_name: '', pat_imagen: '', bib_url: '',
                        pat_precio_usr: '', pat_precio_emp: '', pat_precio_esp: '', pat_precio_dst: '',
                        pat_cod_tempo: '', pat_estado: '', pat_orden: ''}
            this.na = false
        },

        agregarAtributo() {
            this.$v.atributo.$touch();
            if ( this.$v.atributo.$pending || this.$v.atributo.$error ) return
            const params = {id: this.atributo.id, prod: this.atributo.pat_prod, id_attr: this.atributo.pat_attr,
                            imagen: this.atributo.pat_imagen, usr: this.atributo.pat_precio_usr, emp: this.atributo.pat_precio_emp,
                            esp: this.atributo.pat_precio_esp, dst: this.atributo.pat_precio_dst, tempo: this.atributo.pat_cod_tempo,
                            estado: this.atributo.pat_estado, orden: this.atributo.pat_orden, sw: 0 }
            axios.post('/admin/producto_atributo', params)
                .then( res => {
                    if ( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.$v.atributo.$reset()
                        this.text = res.data[1]
                        this.color = 'success'
                        this.attr = res.data[2]
                        this.snackbar = true
                        this.cancelAtributo()
                    }
                })
                .catch( error => {
                    console.log( error.response )
                    this.text = 'Hubu un error General con el Atributo'
                    this.color = 'error'
                    this.snackbar = true
                })
        },

        nuevoAtributo() {
            this.atributo.id = 0
            this.atributo.pat_prod = this.prod
            this.atributo.pat_orden = 0
            this.atributo.pat_estado = 1
            this.url = ''
            this.na = true
        },

        cambiarEstado(item) {
            const params = {id: item.id, sw: 1}
            axios.post(`/admin/producto_atributo`, params)
                .then(res => {
                    if (res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        this.attr = res.data[0]
                    }
                })
        },

        cambiarImagen() {
            this.change_image = true
            this.bibliotecaModal = true
        },

        previewImagen: function(event) {
            
            let reader = new FileReader();
     
            reader.onload = () => {
                    this.img_prod = reader.result;
                }
                reader.readAsDataURL(this.file); 
                this.namefile = this.file.name      
        },

        aceptImagen() {
            if ( this.cat_img == '') {
                this.text = 'Debe seleccionar una Imagen'
                this.color = 'error'
                this.snackbar = true
            } else {
                const index = this.bibliotecas.find( (element) => element.id === this.cat_img)
                
                if (index) {
                    this.atributo.pat_imagen = index.id
                    this.url = index.bib_url
                }
                else {
                    this.atributo.pat_imagen = ''
                    this.url = ''
                }
                this.bibliotecaModal = false
                this.cat_img = ''
            }
        },

        addImagen() {
            if ( this.img_prod == '') return
            
            let file = new FormData()
            file.append("files", this.file)
            file.append("id", this.lib+'%')
            file.append("nombre", this.namefile)
            file.append("url", this.lib + this.namefile )
            file.append("ruta", this.ruta )

            axios.post('/admin/biblioteca/new', file, {headers: {'Content-Type': 'multipart/form-data'} } )
                .then( res => {
                    if (res.data[0] == 0 ) {
                        this.color = 'error'
                        this.text = res.data[1]
                        this.snackbar = true
                    }else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.img_prod = ''
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
            this.img_prod = ''
            
        },

        editItem(item) {
            this.insertAtributo = true
            this.atributo.id = item.id
            this.atributo.pat_prod = item.pat_prod
            this.atributo.pat_attr = item.pat_attr
            this.atributo.atr_es_name = item.atr_es_name
            this.atributo.pat_imagen = item.pat_imagen
            this.atributo.bib_url = item.bib_url
            this.atributo.pat_precio_usr = item.pat_precio_usr
            this.atributo.pat_precio_emp = item.pat_precio_emp
            this.atributo.pat_precio_esp = item.pat_precio_esp
            this.atributo.pat_precio_dst = item.pat_precio_dst
            this.atributo.pat_cod_tempo = item.pat_cod_tempo
            this.atributo.pat_estado = item.pat_estado
            this.atributo.pat_orden = item.pat_orden
            this.url = item.bib_url
        },
    },

    validations: {
        atributo: {
            pat_attr: { required },
            pat_cod_tempo: { maxLength: maxLength(15) },
            pat_orden: { numeric },
            pat_precio_dst: { decimal },
            pat_precio_esp: { decimal },
            pat_precio_emp: { decimal },
            pat_precio_usr: { decimal },
        }
    },
}
</script>