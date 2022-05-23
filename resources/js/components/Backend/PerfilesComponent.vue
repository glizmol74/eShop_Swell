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
                    <v-card-title class="headline">Seguro  que desea darle Eliminar este perfil Id : {{perfil.id}} -> {{perfil.per_nombre}}</v-card-title>
                    <v-card-text>Esta acción no puede deshacerse</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="eliminarPerfil()"> {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row> 
        <!-- Fin eliminar -->

        

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Administración de Perfiles</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Tabla de atributos -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Listado de Perfiles
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

            <v-data-table :headers="headers" :items="perfiles" :search="search" class="elevation-2 mr-5 ml-5">
                <template v-slot:item.edit="{ item }">
                    <v-btn color="green" small dark fab @click="editarItem(item)"><v-icon>mdi-pencil</v-icon></v-btn>
                </template>

                <template v-slot:item.delet="{ item }">
                    <v-btn color="red" small dark fab @click="eliminar(item)"><v-icon>mdi-delete</v-icon></v-btn>
                </template>

                <template v-slot:top>
                    <!-- Formulario Flotante de Atributos -->
                    <v-toolbar flat color="white">
                        <v-dialog v-model="editando" max-width="80%">
                            <template v-slot:activator="{ on }">
                                <v-btn color="cyan" dark class="mb-2" @click="nuevo" v-on="on">Nuevo Perfil</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="headline">{{ formTitle }} </span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="6" md="6">
                                                <v-text-field v-model.trim="$v.perfil.per_nombre.$model"
                                                            label="Nombre"
                                                            :error-messages="nombreErrors"
                                                            @input="$v.perfil.per_nombre.$touch()"
                                                            @blur="$v.perfil.per_nombre.$touch()"
                                                            :counter="30"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="6" md="6">
                                                <v-text-field v-model.trim="$v.perfil.per_descripcion.$model"
                                                            label="Descripción"
                                                            :error-messages="descripcionErrors"
                                                            @input="$v.perfil.per_descripcion.$touch()"
                                                            @blur="$v.perfil.per_descripcion.$touch()"
                                                            :counter="50"
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="cancelarEdicion">Cancelar</v-btn>
                                    <v-btn color="blue darken-1" text @click="guardarPerfil">Guardar</v-btn>
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
            perfiles: [],
            modoEditar: false,
            eliminarModal: false,
            perfil: { id: '', per_nombre: '', per_descripcion: '' },
            search: '',
            headers: [ { text: 'Nombre', value: 'per_nombre'},
                       { text: 'Descripción', value: 'per_descripcion'},
                       { text: 'Editar', value: 'edit', sortable: false},
                       { text: 'Eliminar', value: 'delet', sortable: false} ],
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Perfiles', disabled: true, href: '/admin/perfiles'}],
            na: false,
            editando: false,
        }
    },

    created() {
        axios.get('/admin/perfiles')
            .then( res => {
                this.perfiles = res.data
            })
    },

    computed: {
        formTitle () {
            return this.na === false ? 'Editando Perfil'  : 'Nuevo Perfil'
        },

        nombreErrors() {
            const errors = []
            if ( !this.$v.perfil.per_nombre.$dirty ) return errors
            !this.$v.perfil.per_nombre.required && errors.push( this.$t('m.required_error'))
            !this.$v.perfil.per_nombre.minLength && errors.push( this.$t('m.min_lenght_error'))
            !this.$v.perfil.per_nombre.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        descripcionErrors() {
            const errors = []
            if ( !this.$v.perfil.per_descripcion.$dirty ) return errors
            !this.$v.perfil.per_descripcion.required && errors.push( this.$t('m.required_error'))
            !this.$v.perfil.per_descripcion.minLength && errors.push( this.$t('m.min_lenght_error'))
            !this.$v.perfil.per_descripcion.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },
    },

    methods: {
        cancelarEdicion() {
            this.$v.perfil.$reset()
            this.perfil.id = ''
            this.perfil.per_nombre = ''
            this.perfil.per_descripcion = ''
            this.modoEditar = false
            this.editando = false
            if ( this.na == true)
                this.na = false
        },
        nuevo() {
            //this.cancelarEdicion()
            this.na = true
            this.perfil.id = 'new'
            this.editando = true
            
        },
        editarItem(item) {
            this.perfil.id = item.id
            this.perfil.per_nombre = item.per_nombre
            this.perfil.per_descripcion = item.per_descripcion
            this.modoEditar = true
            this.na = false
            this.editando = true
        },

        guardarPerfil() {
            this.$v.perfil.$touch()
            if ( this.$v.perfil.$pending || this.$v.perfil.$error ) return
            const params = {id: this.perfil.id, nombre: this.perfil.per_nombre,
                            descripcion: this.perfil.per_descripcion, sw: 0}
            axios.post(`/admin/perfiles`, params)
                .then( res => {
                    if( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.cancelarEdicion()
                        this.perfiles = res.data[2]
                        this.snackbar = true
                    }
                })
        },

        eliminar (item) {
            this.perfil.id = item.id
            this.perfil.per_nombre = item.per_nombre
            this.eliminarModal = true
        },

        eliminarPerfil() {
            const params = {id: this.perfil.id, sw:3 }
            axios.post(`/admin/perfiles`, params)
                .then( res => {
                    if( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        const index = this.perfiles.findIndex(item => item.id === this.perfil.id)
                        this.perfiles.splice(index,1)
                        this.eliminarModal = false
                    }
                })
                .catch( error => {
                    console.log( error.response)
                    this.text = 'Hubo un error General al Eliminar el Perfil'
                    this.color = 'error'
                    this.snackbar = true
                })
        },
    },

    validations: {
        perfil: {
            per_nombre: { required, minLength: minLength(2), maxLength: maxLength(30) },
            per_descripcion: { required, minLength: minLength(2), maxLength: maxLength(50) },
        },
    },
}
</script>