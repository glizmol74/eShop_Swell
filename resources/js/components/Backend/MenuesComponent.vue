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
                    <v-card-title class="headline">Seguro  que desea darle Eliminar este perfil Id : {{menu.id}} -> {{menu.men_nombre}} </v-card-title>
                    <v-card-text>Esta acción no puede deshacerse</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="eliminarMenu()"> {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row> 
        <!-- Fin eliminar -->

        

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Administración de Menúes</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Tabla de atributos -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Listado de Menúes
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

            <v-data-table :headers="headers" :items="menues" :search="search" class="elevation-2 mr-5 ml-5">
                <template v-slot:item.edit="{ item }">
                    <v-btn color="green" small dark fab @click="editarItem(item)"><v-icon>mdi-pencil</v-icon></v-btn>
                </template>

                <template v-slot:item.delet="{ item }">
                    <v-btn color="red" small dark fab @click="eliminar(item)"><v-icon>mdi-delete</v-icon></v-btn>
                </template>

                <template v-slot:item.men_es_menu="{ item }">
                    {{buscarMenu(item.men_es_menu)}}
                </template>

                <template v-slot:top>
 
                    <v-toolbar flat color="white">
                        <v-dialog v-model="editando" max-width="80%">
                            <template v-slot:activator="{ on }">
                                <v-btn color="cyan" dark class="mb-2" @click="nuevo" v-on="on">Nuevo Menu</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="headline">{{ formTitle }} </span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field v-model.trim="$v.menu.men_nombre.$model"
                                                            label="Nombre"
                                                            :error-messages="nombreErrors"
                                                            @input="$v.menu.men_nombre.$touch()"
                                                            @blur="$v.menu.men_nombre.$touch()"
                                                            :counter="30"
                                                            type="text"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field v-model.trim="$v.menu.men_descripcion.$model"
                                                            label="Descripción"
                                                            :error-messages="descripcionErrors"
                                                            @input="$v.menu.men_descripcion.$touch()"
                                                            @blur="$v.menu.men_descripcion.$touch()"
                                                            :counter="60"
                                                            type="text"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field v-model.trim="$v.menu.men_link.$model"
                                                            label="Link"
                                                            :error-messages="linkErrors"
                                                            @input="$v.menu.men_link.$touch()"
                                                            @blur="$v.menu.men_link.$touch()"
                                                            :counter="50"
                                                            type="text"
                                                ></v-text-field>
                                            </v-col> 

                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field v-model.trim="$v.menu.men_icono.$model"
                                                            label="icono"
                                                            :error-messages="iconoErrors"
                                                            @input="$v.menu.men_icono.$touch()"
                                                            @blur="$v.menu.men_icono.$touch()"
                                                            :counter="50"
                                                            type="text"
                                                            :prepend-icon="menu.men_icono"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="6" md="4">
                                                <v-select v-model.trim="$v.menu.men_es_menu.$model"
                                                            label="Es Menú"
                                                            :error-messages="esmenuErrors"
                                                            @input="$v.menu.men_es_menu.$touch()"
                                                            @blur="$v.menu.men_es_menu.$touch()"
                                                            :items="esMenu"
                                                                item-text="txt"
                                                                item-value="val"
                                                ></v-select>
                                            </v-col> 

                                            <v-col cols="12" sm="6" md="4">
                                                <v-select v-model.trim="menu.men_level"
                                                            label="Padre"
                                                            :items="padre"
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
                                    <v-btn color="blue darken-1" text @click="guardarMenu">Guardar</v-btn>
                                </v-card-actions>
                            </v-card> 
                        </v-dialog>
                    </v-toolbar>
 
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
            modoEditar: false,
            eliminarModal: false,
            menues: [],
            menu: { id: '', men_nombre: '', men_descripcion: '', men_icono: '', men_level: '', men_link: '', men_es_menu: ''},
            search: '',
            headers: [ { text: 'id', value: 'id'},
                       { text: 'Nombre', value: 'men_nombre'},
                       { text: 'Descripción', value: 'men_descripcion' },
                       { text: 'Icono', value: 'men_icono' },
                       { text: 'Link', value: 'men_link' },
                       { text: 'Tipo', value: 'men_es_menu' },
                       { text: 'Padre', value: 'men_level' },
                       { text: 'Editar', value: 'edit', sortable: false },
                       { text: 'Eliminar', value: 'delet', sortable: false } ],
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Menúes', disabled: true, href: '/admin/menues'}],
            esMenu: [ { txt: 'Menu', val: 1 }, { txt: 'Titulo', val: 0 }, { txt: 'Items', val: 2 } ],
            padre: [],
            sinPadre: { id: 0, men_nombre: 'Sin Padre', men_descripcion: 'Separador'},
            na: false,
            editando: false,
        }
    },

    created() {
        axios.get('/admin/menues')
            .then( res => {
                this.menues = res.data.data
                this.padre = res.data.padre
                this.padre.push(this.sinPadre)
            })
    },

    computed: {
        formTitle () {
            return this.na === false ? 'Editando Menu'  : 'Nuevo Menú'
        },

        nombreErrors() {
            const errors = []
            if ( !this.$v.menu.men_nombre.$dirty ) return errors
            !this.$v.menu.men_nombre.required && errors.push( this.$t('m.required_error'))
            !this.$v.menu.men_nombre.minLength && errors.push( this.$t('m.min_lenght_error') + ' 4')
            !this.$v.menu.men_nombre.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        descripcionErrors() {
            const errors = []
            if ( !this.$v.menu.men_descripcion.$dirty ) return errors
            !this.$v.menu.men_descripcion.required && errors.push( this.$t('m.required_error'))
            !this.$v.menu.men_descripcion.minLength && errors.push( this.$t('m.min_lenght_error'))
            !this.$v.menu.men_descripcion.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        linkErrors() {
            const errors = []
            if ( !this.$v.menu.men_link.$dirty ) return errors
            !this.$v.menu.men_link.minLength && errors.push( this.$t('m.min_lenght_error'))
            !this.$v.menu.men_link.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        iconoErrors() {
            const errors = []
            if ( !this.$v.menu.men_icono.$dirty ) return errors
            !this.$v.menu.men_icono.minLength && errors.push( this.$t('m.min_lenght_error'))
            !this.$v.menu.men_icono.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        esmenuErrors() {
            const errors = []
            if ( !this.$v.menu.men_es_menu.$dirty ) return errors
            !this.$v.menu.men_es_menu.required && errors.push( this.$t('m.required_error'))
            return errors
        },

    },

    methods: {
        cancelarEdicion() {
            this.$v.menu.$reset()
            this.menu.id = ''
            this.menu.men_nombre = ''
            this.menu.men_descripcion = ''
            this.menu.men_icono = ''
            this.menu.men_level = ''
            this.menu.men_link = ''
            this.menu.men_es_menu = ''
            this.modoEditar = false
            this.editando = false
            if ( this.na == true)
                this.na = false
        },
        nuevo() {
            //this.cancelarEdicion()
            this.na = true
            this.menu.id = 'new'
            this.menu.men_nombre = ''
            this.menu.men_descripcion = ''
            this.menu.men_icono = ''
            this.menu.men_level = ''
            this.menu.men_link = ''
            this.menu.men_es_menu = ''
            this.editando = true
            
        },

        buscarMenu( id ) {
            const index = this.esMenu.find( elem => elem.val === id)
            return index.txt
        },

        editarItem(item) {
            this.menu.id = item.id
            this.menu.men_nombre = item.men_nombre
            this.menu.men_descripcion = item.men_descripcion
            this.menu.men_icono = item.men_icono
            this.menu.men_level = item.men_level
            this.menu.men_link = item.men_link
            this.menu.men_es_menu = item.men_es_menu
            this.modoEditar = true
            this.na = false
            this.editando = true
        },

        guardarMenu() {
            this.$v.menu.$touch()
            if ( this.$v.menu.$pending || this.$v.menu.$error ) return
            const params = {id: this.menu.id, nombre: this.menu.men_nombre,
                            descripcion: this.menu.men_descripcion, icono: this.menu.men_icono,
                            level: this.menu.men_level, link: this.menu.men_link,
                            esmenu: this.menu.men_es_menu, sw: 0}
            axios.post(`/admin/menues`, params)
                .then( res => {
                    if( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.cancelarEdicion()
                        this.menues = res.data[2].data
                        this.padre = res.data[2].padre
                        this.padre.push(this.sinPadre)
                        this.snackbar = true
                    }
                })
        },

        eliminar (item) {
            this.menu.id = item.id
            this.menu.men_nombre = item.men_nombre
            this.eliminarModal = true
        },

        eliminarMenu() {
            const params = {id: this.menu.id, sw:3}
            axios.post(`/admin/menues`, params)
                .then( res => {
                    if( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        const index = this.menues.findIndex(item => item.id === this.menu.id)
                        this.menues.splice(index,1)
                        this.eliminarModal = false
                    }
                })
                .catch( error => {
                    console.log( error.response)
                    this.text = 'Hubo un error General al Eliminar el Menú'
                    this.color = 'error'
                    this.snackbar = true
                })
        },
    },

    validations: {
        menu: {
            men_nombre: { required, minLength: minLength(4), maxLength: maxLength(30) },
            men_descripcion: { required, minLength: minLength(4), maxLength: maxLength(60) },
            men_es_menu: { required },
            men_link: { minLength: minLength(4), maxLength: maxLength(30)},
            men_icono: { minLength: minLength(4), maxLength: maxLength(30)}
        },
    },
}
</script>