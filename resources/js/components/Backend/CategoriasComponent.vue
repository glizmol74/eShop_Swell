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
                    <v-card-title class="headline">Seguro que desea Eliminar la Categoria {{categoria.es_name}}</v-card-title>
                    <v-card-text>Esta acción no puede deshacerse</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="eliminarCategoria()"> {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- Fin eliminar -->

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Categorías</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Formulario -->
        <v-card class="mt-3">
            <v-card-title> 
                    <div v-if="editando">{{ formTitle }} </div>
                    <v-spacer></v-spacer>
                <v-btn @click="nuevaCategoria()" class="mr-4 mt-3" color="purple" dark>{{this.$t('m.new')}} </v-btn>
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="6" md="6">
                            <v-text-field v-model.trim="$v.categoria.es_name.$model"
                                        label="Nombre"
                                        :error-messages="es_nameErrors"
                                        @input="$v.categoria.es_name.touch()"
                                        @blur="$v.categoria.es_name.touch()"
                                        type="text"
                                        :counter="40"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="6" md="6">
                            <v-text-field v-model.trim="$v.categoria.en_name.$model"
                                        label="Nombre en Ingles"
                                        :error-messages="en_nameErrors"
                                        @input="$v.categoria.en_name.touch()"
                                        @blur="$v.categoria.en_name.touch()"
                                        type="text"
                                        :counter="40"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="6" md="6">
                            <v-select v-model="categoria.padre"
                                    label="Padre"
                                    :items="mcategoria"
                                        item-text="es_name"
                                        item-value="id"
                                    :disabled='!editando'
                            ></v-select>
                        </v-col>

                        <v-col cols="6" md="4">
                            <v-text-field v-model="categoria.orden"
                                        label="Orden"
                                        :error-messages="ordenErrors"
                                        @input="categoria.orden.touch()"
                                        @blur="categoria.oden.touch()"
                                        type="number"
                                        :disabled="!editando"
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-btn v-if="modoEditar" class="mr-4 mt-3" @click="editarCategoria(banner)" color="blue" dark large rounded >
                            <v-icon left>mdi-pencil</v-icon>
                            {{this.$t('m.save')}} 
                        </v-btn>
                        <v-btn v-else class="mr-4 mt-3" @click="alta()" color="blue" dark large rounded :disabled="!editando">
                            <v-icon left>mdi-image-area</v-icon>
                            {{this.$t('m.high')}} 
                        </v-btn>
                        <v-btn v-if="modoEditar || nc"  class="mr-4 mt-3" @click="cancelarEdicion()" color="red" dark large rounded >
                            <v-icon left>mdi-close-circle-outline</v-icon>
                            {{this.$t('m.cancel')}} 
                        </v-btn>
                    </v-row>
                </v-card-text>
        </v-card>
        <!-- Fin Formulario -->

        <!-- Tabla de Categorias -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Categorías  
                <v-spacer></v-spacer>
                <v-text-field v-model="search" append-icon="mdi-magnify"
                                :label="this.$t('m.search')" single-line hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table :headers="headers" :items="categorias" :items-per-page="10" :search="search" class="elevations-1 mr-5 ml-5">
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
import { required, minLength, maxLength, numeric } from 'vuelidate/lib/validators'

export default {
    data() {
        return {
            eliminarModal: false,
            text: '',
            color: '',
            snackbar: '',
            categorias: [],
            modoEditar: false,
            editando: false,
            loading: true,
            nc: false,
            categoria: { id: '', es_name: '', en_name: '', padre: '', orden: '', padre_es_name: '', padre_en_name: ''},
            mcategoria: { id: '', es_name:'', en_name: '', padre: '', orden: '', padre_es_name: '', padre_en_name: ''},
            padre: {id: null, es_name: 'Barra Principal'},
            search: '',
            headers: [  { text: 'Nombre', value: 'es_name'},
                        { text: 'Ingles', value: 'en_name'},
                        { text: 'Padre', value: 'padre_es_name'},
                        { text: 'Orden', value: 'orden'},
                        { text: 'Editar', value: 'edit', sortable: false},
                        { text: 'Eliminar', value: 'delet', sortable: false}],
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Categoria', disabled: true, href: '/admin/categorias'}],
        }
    },

    created() {
        axios.get('/admin/categorias')
            .then( res => {
                this.categorias = res.data
                this.mcategoria = res.data
                this.mcategoria.push(this.padre)
            })
    },

    computed: {
        es_nameErrors() {
            const errors = []
            if ( !this.$v.categoria.es_name.$dirty ) return errors
            !this.$v.categoria.es_name.minLength && errors.push( this.$t('m.min_Lenght_error') + ' 4')
            !this.$v.categoria.es_name.maxLength && errors.push( this.$t('m.max_Lenght_error'))
            !this.$v.categoria.es_name.required && errors.push( this.$t('m.required_error'))
            return errors
        },

        en_nameErrors() {
            const errors = []
            if ( !this.$v.categoria.en_name.$dirty ) return errors
            !this.$v.categoria.en_name.minLength && errors.push( this.$t('m.min_Lenght_error') + ' 3')
            !this.$v.categoria.en_name.maxLength && errors.push( this.$t('m.max_Lenght_error'))
            !this.$v.categoria.en_name.required && errors.push( this.$t('m.required_error'))
            return errors
        },

        ordenErrors() {
            const errors = []
            if ( !this.$v.categoria.orden.$dirty ) return errors
            !this.$v.categoria.orden.numeric && errors.push( this.$t('m.message_numeric'))
            !this.$v.categoria.orden.required && errors.push( this.$t('m.required_error'))
            return errors
        },

        formTitle() {
            return this.modoEditar === false ? 'Nueva Categoria' : 'Editar Categoria'
        },
    },

    watch: {
        'categoria.padre': function ( newVal, oldVal) {
            const index = this.categorias.find( (element) => element.id == this.categoria.padre)
            if ( index ) {
                this.categoria.padre_es_name = index.es_name
                this.categoria.padre_en_name = index.en_name
            } else {
                this.categoria.padre_es_name = ''
                this.categoria.padre_en_name = ''
            }
        }
    },

    methods: {
        eliminar(item) {
            this.categoria.id = item.id
            this.categoria.es_name = item.es_name
            this.eliminarModal = true
        },

        eliminarCategoria() {
            const params = {id: this.categoria.id, sw: 3}
            axios.post(`/admin/categorias`, params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'error'
                        this.snackbar = true
                    } else {
                        this.text = 'Se Eliminó Correctamente la Categoría'
                        this.color = 'success'
                        this.eliminarModal = false
                        this.snackbar = true
                        this.categorias = res.data[2]
                        this.mcategoria = res.data[2]
                        this.mcategoria.push( this.padre)
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General al Eliminar la Categoría'
                    this.color= 'bg-danger'
                    this.snackbar = true
                })
        },

        editarFormulario(item) {
            this.categoria.id = item.id
            this.categoria.es_name = item.es_name
            this.categoria.en_name = item.en_name
            this.categoria.padre = item.padre
            this.categoria.orden = item.orden
            this.categoria.padre_es_name = item.padre_es_name
            this.categoria.padre_en_name = item.padre_en_name
            this.modoEditar = true
            this.editando = true
            this.nc =false
        },

        cancelarEdicion() {
            this.$v.$reset()
            this.categoria.id = ''
            this.categoria.es_name = ''
            this.categoria.en_name = ''
            this.categoria.padre = ''
            this.categoria.orden = ''
            this.categoria.padre_es_name = ''
            this.categoria.padre_en_name = ''
            this.modoEditar = false
            this.editando = false
            this.nc = false
        },

        nuevaCategoria() {
            this.cancelarEdicion()
            this.categoria.id = 0
            this.categoria.padre = null
            this.nc = true
            this.editando = true
            this.categoria.orden = 0
        },

        editarCategoria() {
            this.$v.categoria.$touch()
            if ( this.$v.categoria.$pending || this.$v.categoria.$error ) return

            const params = {id: this.categoria.id, es_name: this.categoria.es_name,
                            en_name: this.categoria.en_name, padre: this.categoria.padre,
                            orden: this.categoria.orden, sw: 1}
            axios.post(`/admin/categorias`, params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = 'Se edito la Categoría Correctamente'
                        this.color = 'success'
                        this.snackbar = true
                        this.cancelarEdicion()
                        this.editando = false
                        this.modoEditar = false
                        this.categorias = res.data[2]
                        this.mcategoria = res.data[2]
                        this.mcategoria.push( this.padre)
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General al editar la categoria'
                    this.color = 'error'
                    this.snackbar = true
                })
        },

        alta() {
           this.$v.categoria.$touch()
            if ( this.$v.categoria.$pending || this.$v.categoria.$error ) return

            const params = {id: this.categoria.id, es_name: this.categoria.es_name,
                            en_name: this.categoria.en_name, padre: this.categoria.padre,
                            orden: this.categoria.orden, sw: 0}
            axios.post(`/admin/categorias`, params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = 'Se agrego la Categoría Correctamente'
                        this.color = 'success'
                        this.snackbar = true
                        this.cancelarEdicion()
                        this.editando = false
                        this.modoEditar = false
                        this.nc = false
                        this.categorias = res.data[2]
                        this.mcategoria = res.data[2]
                        this.mcategoria.push( this.padre)
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General al creando la Categoria'
                    this.color = 'error'
                    this.snackbar = true
                }) 
        },
    },

    validations: {
        categoria: {
            es_name: { required, minLength: minLength(4), maxLength: maxLength(40)},
            en_name: { required, minLength: minLength(3), maxLength: maxLength(40)},
            orden: { required, numeric }
        }
    },
}
</script>
