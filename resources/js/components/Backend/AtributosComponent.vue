<template >
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
                    <v-card-title class="headline">Seguro  que desea darle Eliminar este Atributo Id : {{atributo.id}} -> {{atributo.atr_es_name}} }</v-card-title>
                    <v-card-text>Esta acción no puede deshacerse</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="eliminarAtributo()"> {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row> 
        <!-- Fin eliminar -->

        

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Administración de Atributos</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Tabla de atributos -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Listado de Atributos
                <v-spacer></v-spacer>
                <v-text-field v-model="search"
                            append-icon="mdi-magnify"
                            label="Buscar"
                            single-line
                            hide-details
                ></v-text-field>
                <v-spacer></v-spacer>
            </v-card-title>

            <v-card-text>
                
            </v-card-text>

            <v-data-table :headers="headers" :items="atributos" :search="search" class="elevation-2 mr-5 ml-5">
                <template v-slot:item.edit="{ item }">
                    <v-btn color="green" small dark fab @click="editarItem(item)"><v-icon>mdi-pencil</v-icon></v-btn>
                </template>

                <template v-slot:item.delet="{ item }">
                    <v-btn color="red" small dark fab @click="eliminar(item)"><v-icon>mdi-delete</v-icon></v-btn>
                </template>

                <template v-slot:item.atr_tipo="{ item} "> 
                    <v-chip v-if="item.atr_tipo === 1">Productos Swell</v-chip>
                    <v-chip v-else>Articulos Ext.</v-chip>
                </template>

                <template v-slot:top>
                    <!-- Formulario Flotante de Atributos -->
                    <v-toolbar flat color="white">
                        <v-dialog v-model="editando" max-width="80%">
                            <template v-slot:activator="{ on }">
                                <v-btn color="cyan" dark class="mb-2" @click="nuevo" v-on="on">Nuevo Atributo</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="headline">{{ formTitle }} </span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="4" md="4">
                                                <v-text-field v-model.trim="$v.atributo.atr_es_name.$model"
                                                            label="Descripción"
                                                            :error-messages="es_nameErrors"
                                                            @input="$v.atributo.atr_es_name.$touch()"
                                                            @blur="$v.atributo.atr_es_name.$touch()"
                                                            :counter="20"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="4" md="4">
                                                <v-text-field v-model.trim="$v.atributo.atr_en_name.$model"
                                                            label="Descripción en Ingles"
                                                            :error-messages="en_nameErrors"
                                                            @input="$v.atributo.atr_en_name.$touch()"
                                                            @blur="$v.atributo.atr_en_name.$touch()"
                                                            :counter="20"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="4" md="4">
                                                <v-select v-model.trim="$v.atributo.atr_tipo.$model"
                                                        label="Tipo"
                                                        :error-messages="tipoErrors"
                                                        @input="$v.atributo.atr_tipo.$touch()"
                                                        @blur="$v.atributo.atr_tipo.$touch()"
                                                        :items="tipo_prod"
                                                            item-text="txt"
                                                            item-value="id" 
                                                ></v-select>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="cancelarEdicion">Cancelar</v-btn>
                                    <v-btn color="blue darken-1" text @click="guardarAtributo">Guardar</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
        <!-- Fin Formulario -->
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script>
import { required, minLength, maxLength } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            text: 'a',
            color: '',
            snackbar: false,
            atributos: [],
            modoEditar: false,
            eliminarModal: false,
            atributo: { id: '', atr_es_name: '', atr_en_name: '', atr_tipo: 1 },
            tipo_prod:  [{txt: 'Productos Swell', id: 1}, {txt: 'Articulos Ext.', id: 2}],
            search: '',
            headers: [ { text: 'Descripción', value: 'atr_es_name'},
                       { text: 'Descripción Ingles', value: 'atr_en_name'},
                       { text: 'Tipo', value: 'atr_tipo'}, 
                       { text: 'Editar', value: 'edit', sortable: false},
                       { text: 'Eliminar', value: 'delet', sortable: false} ],
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Atributos', disabled: true, href: '/admin/atributos'}],
            na: false,
            editando: false,
        }
    },

    created() {
        axios.get('/admin/atributos')
            .then( res => {
                this.atributos = res.data
            })
    },

    computed: {
        formTitle () {
            return this.na === false ? 'Editando Atributo'  : 'Nuevo Atributo'
        },

        es_nameErrors() {
            const errors = []
            if ( !this.$v.atributo.atr_es_name.$dirty ) return errors
            !this.$v.atributo.atr_es_name.required && errors.push( this.$t('m.required_error'))
            !this.$v.atributo.atr_es_name.minLength && errors.push( this.$t('m.min_lenght_error'))
            !this.$v.atributo.atr_es_name.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        en_nameErrors() {
            const errors = []
            if ( !this.$v.atributo.atr_en_name.$dirty ) return errors
            !this.$v.atributo.atr_en_name.required && errors.push( this.$t('m.required_error'))
            !this.$v.atributo.atr_en_name.minLength && errors.push( this.$t('m.min_lenght_error'))
            !this.$v.atributo.atr_en_name.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        tipoErrors() {
            const errors = []
            if ( !this.$v.atributo.atr_tipo.$dirty ) return errors
            !this.$v.atributo.atr_tipo.required && errors.push( this.$t('m.required_error'))
            return errors
        },
    },

    methods: {
        cancelarEdicion() {
            this.$v.atributo.$reset()
            this.atributo.id = ''
            this.atributo.atr_es_name = ''
            this.atributo.atr_en_name = ''
            this.atributo.atr_tipo = 1
            this.modoEditar = false
            this.editando = false
            if ( this.na == true)
                this.na = false
        },
        
        nuevo() {
            //this.cancelarEdicion()
            this.na = true
            this.atributo.id = 'new'
            this.editando = true
            
        },

        editarItem(item) {
            this.atributo.id = item.id
            this.atributo.atr_es_name = item.atr_es_name
            this.atributo.atr_en_name = item.atr_en_name
            this.atributo.atr_tipo = item.atr_tipo
            this.modoEditar = true
            this.na = false
            this.editando = true
        },

        guardarAtributo() {
            this.$v.atributo.$touch()
            if ( this.$v.atributo.$pending || this.$v.atributo.$error ) return
            const params = {id: this.atributo.id, es_name: this.atributo.atr_es_name,
                            en_name: this.atributo.atr_en_name, sw: 0, tipo: this.atributo_atr_tipo}
            axios.post(`/admin/atributos`, params)
                .then( res => {
                    if( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.cancelarEdicion()
                        this.atributos = res.data[2]
                        this.snackbar = true
                    }
                })
        },

        eliminar (item) {
            this.atributo.id = item.id
            this.atributo.atr_es_name = item.atr_es_name
            this.eliminarModal = true
        },

        eliminarAtributo() {
            const params = {id: this.atributo.id, sw:3}
            axios.post(`/admin/atributos`, params)
                .then( res => {
                    if( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        const index = this.atributos.findIndex(item => item.id === this.atributo.id)
                        this.atributos.splice(index,1)
                        this.eliminarModal = false
                    }
                })
                .catch( error => {
                    console.log( error.response)
                    this.text = 'Hubo un error General al Eliminar el Atributo'
                    this.color = 'error'
                    this.snackbar = true
                })
        },
    },

    validations: {
        atributo: {
            atr_es_name: { required, minLength: minLength(2), maxLength: maxLength(20) },
            atr_en_name: { required, minLength: minLength(2), maxLength: maxLength(20) },
            atr_tipo: { required },
        },
    },
}
</script>