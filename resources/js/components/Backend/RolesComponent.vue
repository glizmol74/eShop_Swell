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
                    <v-card-title class="headline">Seguro  que desea darle Eliminar este perfil Id : {{role.id}} -> {{role.per_nombre}} {{role.men_nombre}} </v-card-title>
                    <v-card-text>Esta acción no puede deshacerse</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="eliminarRole()"> {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row> 
        <!-- Fin eliminar -->

        

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Administración de Roles</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Tabla de atributos -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Listado de Roles Asignado
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

            <v-data-table :headers="headers" :items="roles" :search="search" class="elevation-2 mr-5 ml-5">
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
                                <v-btn color="cyan" dark class="mb-2" @click="nuevo" v-on="on">Nuevo Rol</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="headline">{{ formTitle }} </span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="6" md="6">
                                                <v-select v-model.trim="$v.role.rol_perfil.$model"
                                                            label="Perfil"
                                                            :error-messages="perfilErrors"
                                                            @input="$v.role.rol_perfil.$touch()"
                                                            @blur="$v.role.rol_perfil.$touch()"
                                                            :items="perfiles"
                                                                item-text="per_nombre"
                                                                item-value="id"
                                                ></v-select>
                                            </v-col>

                                            <v-col cols="12" sm="6" md="6">
                                                <v-select v-model.trim="$v.role.rol_menu.$model"
                                                            label="Menu"
                                                            :error-messages="menuErrors"
                                                            @input="$v.role.rol_menu.$touch()"
                                                            @blur="$v.role.rol_menu.$touch()"
                                                            :items="menues"
                                                                item-text="men_nombre"
                                                                item-value="id"
                                                ></v-select>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="cancelarEdicion">Cancelar</v-btn>
                                    <v-btn color="blue darken-1" text @click="guardarRole">Guardar</v-btn>
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
            text: '',
            color: '',
            snackbar: false,
            roles: [],
            modoEditar: false,
            eliminarModal: false,
            perfiles: [],
            menues: [],
            role: { id: '', rol_perfil: '', rol_menu: '', per_nombre: '', men_nombre: ''},
            search: '',
            headers: [ { text: 'Perfil', value: 'per_nombre'},
                       { text: 'Punto de Menu', value: 'men_nombre'},
                       { text: 'Editar', value: 'edit', sortable: false},
                       { text: 'Eliminar', value: 'delet', sortable: false} ],
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Roles', disabled: true, href: '/admin/roles'}],
            na: false,
            editando: false,
        }
    },

    created() {
        axios.get('/admin/perfiles')
            .then( res => {
                this.perfiles = res.data
            })
        axios.get('/admin/roles')
            .then( res2 => {
                this.roles = res2.data
            })
        axios.get('/admin/menues')
            .then( res3 => {
                this.menues = res3.data.data
            })
    },

    computed: {
        formTitle () {
            return this.na === false ? 'Editando Rol'  : 'Nuevo Rol'
        },

        perfilErrors() {
            const errors = []
            if ( !this.$v.role.rol_perfil.$dirty ) return errors
            !this.$v.role.rol_perfil.required && errors.push( this.$t('m.required_error'))
            return errors
        },

        menuErrors() {
            const errors = []
            if ( !this.$v.role.rol_menu.$dirty ) return errors
            !this.$v.role.rol_menu.required && errors.push( this.$t('m.required_error'))
            return errors
        },
    },

    methods: {
        cancelarEdicion() {
            this.$v.role.$reset()
            this.role.id = ''
            this.role.rol_perfil = ''
            this.role.rol_menu = ''
            this.role.per_nombre = ''
            this.role.men_nombre = ''
            this.modoEditar = false
            this.editando = false
            if ( this.na == true)
                this.na = false
        },
        nuevo() {
            //this.cancelarEdicion()
            this.na = true
            this.role.id = 'new'
            this.editando = true
            
        },
        editarItem(item) {
            this.role.id = item.id
            this.role.rol_perfil = item.rol_perfil
            this.role.rol_menu = item.rol_menu
            this.role.per_nombre = item.per_nombre
            this.role.men_nombre = item.men_nombre
            this.modoEditar = true
            this.na = false
            this.editando = true
        },

        guardarRole() {
            this.$v.role.$touch()
            if ( this.$v.role.$pending || this.$v.role.$error ) return
            const params = {id: this.role.id, perfil: this.role.rol_perfil,
                            menu: this.role.rol_menu, sw: 0}
            axios.post(`/admin/roles`, params)
                .then( res => {
                    if( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.cancelarEdicion()
                        this.roles = res.data[2]
                        this.snackbar = true
                    }
                })
        },

        eliminar (item) {
            this.role.id = item.id
            this.role.per_nombre = item.per_nombre
            this.role.men_nombre = item.men_nombre
            this.eliminarModal = true
        },

        eliminarRole() {
            const params = {id: this.role.id, sw: 3 }
            axios.post(`/admin/roles`, params)
                .then( res => {
                    if( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        const index = this.roles.findIndex(item => item.id === this.role.id)
                        this.roles.splice(index,1)
                        this.eliminarModal = false
                    }
                })
                .catch( error => {
                    console.log( error.response)
                    this.text = 'Hubo un error General al Eliminar el Rol'
                    this.color = 'error'
                    this.snackbar = true
                })
        },
    },

    validations: {
        role: {
            rol_perfil: { required },
            rol_menu: { required },
        },
    },
}
</script>