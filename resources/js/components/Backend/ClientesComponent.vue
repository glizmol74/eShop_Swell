<template>
    <div class="container">
        <v-snackbar v-model="snackbar" top right :timeout="5000" :color="color">
            {{ text }}
            <v-btn color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>

        <v-row justify="center">
            <v-dialog v-model="eliminarModal" persistent max-width="600">
                <v-card>
                    <div class="float-right">
                        <v-btn icon @click="eliminarModal = false"> <v-icon small>mdi-close</v-icon> </v-btn>
                    </div>

                    <v-card-text class="pt-4 headline font-weight-bold">
                        {{this.$t('m.confirm_delet_cliente1')}} ID : {{ usuario.usr_id }} {{ usuario.razonsocial }} 
                    </v-card-text>

                    <v-card-text> {{this.$t('m.confirm_delet_cliente2')}} </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false"> {{this.$t('m.cancel')}}</v-btn>
                        <v-btn color="green darken-1" text @click="eliminarUsuarios()"> {{this.$t('m.acept')}}</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>

        <v-row justify="center">
            <v-dialog v-model="passwordModal" persistent max-width="600">
                <v-card>
                    <div class="float-right">
                        <v-btn icon @click="passwordModal = false"> <v-icon small>mdi-close</v-icon> </v-btn>
                    </div>

                    <v-card-text class="pt-4 headline font-weight-bold">
                        {{this.$t('m.password_new')}}
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-container>
                            <v-row>
                                <v-col cols="12">
                                    <v-text-field v-model.trim="$v.clave.pass.$model"
                                        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                        @input="$v.clave.pass.$touch()"
                                        @blur="$v.clave.pass.$touch()"
                                        :label="this.$t('m.password')"
                                        :counter="40"
                                        :error-messages ="passErrors"
                                        :type="show1 ? 'text' : 'password'"
                                        @click:append="show1 = !show1"
                                    ></v-text-field>
                                </v-col>

                                <v-col cols="12">
                                    <v-text-field v-model.trim="$v.clave.passok.$model"
                                        :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                        :label="this.$t('m.repeartpassword')"
                                        :error-messages="PasswordErrors"
                                        :success-messages="PasswordSuccess"
                                        @input="$v.clave.passok.$touch()"
                                        @blur="$v.clave.passok.$touch()"
                                        :type="show2 ? 'text' : 'password'"
                                        @click:append="show2 = !show2"
                                    ></v-text-field>

                                    <v-checkbox v-model="check" :label="this.$t('m.send_email_clave')"></v-checkbox>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-actions>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="cancelPassword()"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="editPassword()"> {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>        

        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">{{$t('m.a_client')}}</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu_es" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu_en" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>

        <!-- Formulario -->
        
        <v-card class="mt-3">
            <v-card-title>
                {{ formTitle }}
                <v-spacer></v-spacer>
                <v-btn @click="nuevoCliente()" class="mr-4 mt-3" color="purple" dark>{{this.$t('m.new')}} </v-btn>
            </v-card-title> 
            <v-card-text>
                <v-row>
                    <v-col cols="12">
                        <v-card-title class="headline-2"> {{this.$t('m.datos_g')}} </v-card-title>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.dni.$model"
                                    :label="this.$t('m.cuit')"
                                    :error-messages="dniErrors"
                                    @input="$v.usuario.dni.$touch()"
                                    @blur="$v.usuario.dni.$touch()"
                                    type="text"
                                    :counter="15"
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.razonsocial.$model"
                                    :label="this.$t('m.full_name')"
                                    :error-messages="razonErrors"
                                    @input="$v.usuario.razonsocial.$touch()"
                                    @blur="$v.usuario.razonsocial.$touch()"
                                    type="text"
                                    :counter="50"
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.correo.$model"
                                    :label="this.$t('m.email')"
                                    :error-messages="correoErrors"
                                    @input="$v.usuario.correo.$touch()"
                                    @blur="$v.usuario.correo.$touch()"
                                    type="text"
                                    :counter="50"
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.telefono.$model"
                                    :label="this.$t('m.phone')"
                                    :error-messages="telefonoErrors"
                                    @input="$v.usuario.telefono.$touch()"
                                    @blur="$v.usuario.telefono.$touch()"
                                    type="number"
                                    :counter="50"
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.whatsapp.$model"
                                    label="Whatsapp"
                                    :error-messages="whatsappErrors"
                                    @input="$v.usuario.whatsapp.$touch()"
                                    @blur="$v.usuario.whatsapp.$touch()"
                                    type="number"
                                    :counter="50"
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-autocomplete v-model.trim="$v.usuario.per_descripcion.$model"
                                    :label="this.$t('m.t_client')"
                                    :error-messages="perfilDescErrors"
                                    @input="$v.usuario.per_descripcion.$touch()"
                                    @blur="$v.usuario.per_descripcion.$touch()"
                                    type="text"
                                    :items='perfiles'
                                        item-text="text"
                                        item-value="id"
                                    :disabled="editando"
                        ></v-autocomplete>
                    </v-col>

                    <v-col cols="6" md="8">
                        <v-text-field v-model.trim="$v.usuario.direccion.$model"
                                    :label="this.$t('m.street')"
                                    :error-messages="addressErrors"
                                    @input="$v.usuario.direccion.$touch()"
                                    @blur="$v.usuario.direccion.$touch()"
                                    type="text"
                                    :counter="100"
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.cp.$model"
                                    :label="this.$t('m.zip')"
                                    :error-messages="cpErrors"
                                    @input="$v.usuario.cp.$touch()"
                                    @blur="$v.usuario.cp.$touch()"
                                    type="number"
                                    :counter="4"
                                    disabled
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="8">
                        <v-text-field v-model.trim="entre_calles"
                                    :label="this.$t('m.between_streets')"
                                    type="text"
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-autocomplete v-model="$v.usuario.provincia.$model"
                                    :error-messages="provinciaErrors"
                                    @input="$v.usuario.provincia.$touch()"
                                    @blur="$v.usuario.provincia.$touch()"
                                    :label="this.$t('m.state')"
                                    :disabled='prov_disable || editando'
                                    :items='provincias'
                                        item-text="txt"
                                        item-value="id"
                                    
                        ></v-autocomplete>
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-autocomplete v-model="$v.usuario.localidad.$model"
                                    :error-messages="localidadErrors"
                                    @input="$v.usuario.localidad.$touch()"
                                    @blur="$v.usuario.localidad.$touch()"
                                    :label="this.$t('m.city')"
                                    :disabled='local_disable'
                                    :items='localidades'
                                        item-text="txt"
                                        item-value="id"
                        ></v-autocomplete>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.cod_tempo.$model"
                                    label="Codigo Tempo"
                                    :error-messages="codTempoErrors"
                                    @input="$v.usuario.cod_tempo.$touch()"
                                    @blur="$v.usuario.cod_tempo.$touch()"
                                    :counter="15"
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-autocomplete v-model="$v.usuario.estado.$model"
                                        :error-messages="estadoErrors"
                                        :label="this.$t('m.estado')"
                                        @input="$v.usuario.estado.touch()"
                                        @blur="$v.usuario.estado.touch()"
                                        :disabled="editando"
                                        :items="estados"
                                            item-text="txt"
                                            item-value="val"
                        ></v-autocomplete>
                    </v-col>

                    <v-col v-if="nc === true" cols="6" md="4">
                        <v-text-field v-model.trim="$v.clave.pass.$model"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            @input="$v.clave.pass.$touch()"
                            @blur="$v.clave.pass.$touch()"
                            :label="this.$t('m.password')"
                            :counter="40"
                            :error-messages ="passErrors"
                            :type="show1 ? 'text' : 'password'"
                            @click:append="show1 = !show1"
                        ></v-text-field>
                    </v-col>

                    <v-col v-if="nc === true" cols="6" md="4">
                        <v-text-field v-model.trim="$v.clave.passok.$model"
                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                            :label="this.$t('m.repeartpassword')"
                            :error-messages="PasswordErrors"
                            :success-messages="PasswordSuccess"
                            @input="$v.clave.passok.$touch()"
                            @blur="$v.clave.passok.$touch()"
                            :type="show2 ? 'text' : 'password'"
                            @click:append="show2 = !show2"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-card-title class=" headline-2"> {{this.$t('m.d_fact')}} </v-card-title>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.saldo.$model"
                                    :label="this.$t('m.saldo_f')"
                                    :error-messages="saldoErrors"
                                    @input="$v.usuario.saldo.$touch()"
                                    @blur="$v.usuario.saldo.$touch()"
                                    filled
                                    :disabled="editando"
                        ></v-text-field>
                    </v-col> 
                </v-row>

                <v-row>
                    <v-col cols="12" sm="12" md="12">
                        <v-checkbox v-model="check" :label="this.$t('m.send_email_clave')"></v-checkbox>
                    </v-col>
                </v-row>

                <v-row>
                    <v-btn v-if="modoEditar" class="mr-4 mt-3" @click="editarUsuario(usuario)" color="blue" dark large rounded >
                        <v-icon left>mdi-pencil</v-icon>
                         {{this.$t('m.save')}} 
                    </v-btn>
                    <v-btn v-else class="mr-4 mt-3" @click="alta()" color="blue" dark large rounded :disabled="editando">
                        <v-icon left>mdi-account-plus</v-icon>
                         {{this.$t('m.high')}} 
                    </v-btn>
                    <v-btn v-if="modoEditar || nc"  class="mr-4 mt-3" @click="cancelarEdicion()" color="red" dark large rounded >
                        <v-icon left>mdi-close-circle-outline</v-icon>
                         {{this.$t('m.cancel')}} 
                    </v-btn>
                </v-row>
                <v-row><v-col cols="12"> {{ this.check }} </v-col></v-row>
            </v-card-text> 
        </v-card>

        <!-- Fin Formulario -->


        <!-- Tabla de Clientes -->
        <v-card class="mt-3 pb-10">
            <v-card-title> {{this.$t('m.client')}} 
                <v-spacer></v-spacer>
                <v-text-field v-model="search" append-icon="mdi-magnify"
                            single-line hide-details :label="this.$t('m.search')"
                ></v-text-field>
            </v-card-title>

            <v-data-table class="elevation-1 mr-5 ml-5"
                        :headers="headers_es"
                        :items="usuarios"
                        :items-per-page="10"
                        :search="search"
            >
                <template v-slot:item.estado="{ item }">
                    <v-chip v-if="item.estado === 1">Activo</v-chip>
                    <v-chip v-else>Inactivo</v-chip>
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

                <template v-slot:item.pass="{item}">
                    <v-btn color="primary" small dark @click="ePassword(item)">
                        <v-icon small>mdi-lock</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>
        
    </div>
</template>

<script>
import { required, minLength, maxLength, email, numeric, sameAs, decimal } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            eliminarModal: false,
            passwordModal: false,
            nc: false,
            editando: true,
            check: false,
            text: '',
            color: '',
            clave: {pass:'', passok:''},
            snackbar: false,
            usuarios: [],
            provincias: [],
            localidades: [],
            perfiles: [],
            loading: true,
            modoEditar: false,
            show1: false,
            show2: false,
            usuario: {razonsocial: '', dni: '', telefono: '', whatsapp: '', correo: '',
                    direccion: '', provincia: '', localidad: '', pais: '', cod_tempo: '',
                    cli_id: '', saldo: 0, perfil: '', per_descripcion: '', estado: '',
                    usr_id: '', edit_loc: '', cp:'', entre_calles: ''},
            prov_disable: true,
            local_disable: true,
            breadmenu_es: [{text: 'Swell', disabled: false, href: '/',},
                           {text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                           {text: 'Clientes', disabled: true, href: 'clientes'}],
            breadmenu_en: [{text: 'Swell', disabled: false, href: '/',},
                           {text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                           {text: 'customers', disabled: true, href: 'clientes'}],
            estados: [{txt: 'Activo', val: 1}, {txt: 'Inactivo', val: 0}],
            search: '',
            headers_es: [
                { text: 'DNI o CUIT',  value: 'dni'},
                { text: 'Nombre Completo o Razón Social',  value: 'razonsocial'},
                { text: 'Correo', value: 'correo'},
                { text: 'Perfil', value: 'per_descripcion'},
                { text: 'Estado', value: 'estado'},
                { text: 'Saldo', value: 'saldo'},
                { text: 'Contraseña', value: 'pass', sortabe: false},
                { text: 'Editar', value: 'edit', sortable: false},
                { text: 'Eliminar', value: 'delet', sortabe: false}
            ],
            pp: 'a',
            entre_calles: '',
        }
    },

    created() {
        axios.get('/admin/clientes/data')
            .then ( res => {
                this.usuarios = res.data.usuarios
                this.perfiles = res.data.perfiles
            })
        axios.get('/provincia')
            .then ( res => {
                this.provincias = res.data
                this.prov_disable = false
            })
    },

    watch: {
        'usuario.provincia': function( newVal, oldVal) {
            this.cambioProvincia()
        },
        'usuario.localidad': function( newVal, oldVal) {
            this.cambioLocalidad()
        },
        'usuario.per_descripcion': function( newVal, oldVal) {
            this.usuario.perfil = this.usuario.per_descripcion
            this.pp = this.usuario.perfil
        },

        'entre_calles': function(newVal, oldVal) {
            this.usuario.entre_calles = this.entre_calles
        },
    },

    computed: {
        dniErrors() {
            const errors = []
            if ( !this.$v.usuario.dni.$dirty ) return errors
            !this.$v.usuario.dni.minLength && errors.push(this.$t('m.min_lenght_error') + '8')
            !this.$v.usuario.dni.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.usuario.dni.required && errors.push(this.$t('m.required_error'))
            !this.$v.usuario.dni.numeric && errors.push(this.$t('m.message_numeric'))
            return errors
        },

        razonErrors() {
            const errors = []
            if ( !this.$v.usuario.razonsocial.$dirty ) return errors
            !this.$v.usuario.razonsocial.minLength && errors.push(this.$t('m.min_lenght_error') + ' 4')
            !this.$v.usuario.razonsocial.maxLength && errors.push(this.$t('m.max_length_error'))
            !this.$v.usuario.razonsocial.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        correoErrors() {
            const errors = []
            if ( !this.$v.usuario.correo.$dirty ) return errors
            !this.$v.usuario.correo.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.usuario.correo.required && errors.push(this.$t('m.required_error'))
            !this.$v.usuario.correo.email && errors.push(this.$t('m.email_error'))
            return errors
        },

        telefonoErrors() {
            const errors = []
            if ( !this.$v.usuario.telefono.$dirty ) return errors
            !this.$v.usuario.telefono.required && errors.push(this.$t('m.required_error'))
            !this.$v.usuario.telefono.numeric && errors.push(this.$t('m.message_numeric'))
            return errors
        },

        whatsappErrors() {
            const errors = []
            if ( !this.$v.usuario.whatsapp.$dirty ) return errors
            !this.$v.usuario.whatsapp.required && errors.push(this.$t('m.required_error'))
            !this.$v.usuario.whatsapp.numeric && errors.push(this.$t('m.message_numeric'))
            return errors
        },

        perfilErrors() {
            const errors = []
            if ( !this.$v.usuario.perfil.$dirty )  return errors
            !this.$v.usuario.perfil.required && errors.push(this.$t('m.required_error'))
            return errors
        },

         perfilDescErrors() {
            const errors = []
            if ( !this.$v.usuario.per_descripcion.$dirty )  return errors
            !this.$v.usuario.per_descripcion.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        addressErrors() {
            const errors = []
            if ( !this.$v.usuario.direccion.$dirty ) return errors
            !this.$v.usuario.direccion.minLength && errors.push(this.$t('m.min_lenght_error') + ' 4')
            !this.$v.usuario.direccion.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.usuario.direccion.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        provinciaErrors() {
            const errors = []
            if ( !this.$v.usuario.provincia.$dirty ) return errors
            !this.$v.usuario.provincia.numeric && errors.push(this.$t('m.message_numeric'))
            !this.$v.usuario.provincia.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        localidadErrors() {
            const errors = []
            if ( !this.$v.usuario.localidad.$dirty ) return errors
            !this.$v.usuario.localidad.numeric && errors.push(this.$t('m.message_numeric'))
            !this.$v.usuario.localidad.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        cpErrors() {
            const errors = []
            if ( !this.$v.usuario.cp.$dirty ) return errors
            !this.$v.usuario.cp.numeric && errors.push(this.$t('m.message_numeric'))
            return errors
        },

        saldoErrors() {
            const errors = []
            if ( !this.$v.usuario.saldo.$dirty ) return errors
            !this.$v.usuario.saldo.decimal && errors.push(this.$t('m.message_numeric'))
            return errors
        },

        estadoError() {
            const errors = []
            if ( !this.$v.usuario.estado.$dirty )  return errors
            !this.$v.usuario.estado.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        codTempoErrors() {
            const errors = []
            if ( !this.$v.usuario.cod_tempo.$dirty ) return errors
            !this.$v.usuario.cod_tempo.maxLength && errors.push(this.$t('m.max_length_error'))
            return errors
        },


        formTitle() {
            return this.modoEditar === false ? 'Nuevo Cliente' : 'Editar Cliente'
        },

        passErrors() { 
            const errors = []
            if ( !this.$v.clave.pass.$dirty ) return errors
            !this.$v.clave.pass.minLength && errors.push(this.$t('m.min_lenght_error')+ ' 8')
            !this.$v.clave.pass.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.clave.pass.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        PasswordErrors () {
            const errors = []
            if ( !this.$v.clave.passok.$dirty ) return errors
            !this.$v.clave.passok.required && errors.push(this.$t('m.required_error'))
            !this.$v.clave.passok.sameAs && errors.push(this.$t('m.password_mismatch'))
            return errors
        },

        PasswordSuccess () {
            const errors = []
            if ( !this.$v.clave.passok.$dirty ) return errors
            this.$v.clave.passok.sameAs && errors.push(this.$t('m.password_ok'))
            return errors
        }, 
    },

    methods: {
        nuevoCliente() {
            this.cancelarEdicion()
            this.nc = true
            this.usuario.saldo = 0
            this.editando = false
            this.usuario.estado = 1
        },

        alta() {
            this.$v.usuario.$touch()
            this.$v.clave.$touch()
            if ( this.$v.usuario.$pending || this.$v.usuario.$error || this.$v.clave.$pending || this.$v.clave.$error) return
            const params = { dni: this.usuario.dni,
                             razonsocial: this.usuario.razonsocial,
                             telefono: this.usuario.telefono,
                             whatsapp: this.usuario.whatsapp,
                             correo: this.usuario.correo,
                             direccion: this.usuario.direccion,
                             entre_calles: this.usuario.entre_calles,
                             provincia: this.usuario.provincia,
                             cod_postal: this.usuario.localidad,
                             pais: this.usuario.pais,
                             cod_tempo: this.usuario.cod_tempo,
                             cli_id: this.usuario.cli_id,
                             saldo: this.usuario.saldo,
                             perfil: this.usuario.perfil,
                             estado: this.usuario.estado,
                             usr_id: this.usuario.usr_id,
                             pass: this.clave.pass,                             
                             check: this.check,
                             sw: 0,
                        }
            this.$v.$reset()

            axios.post('/admin/clientes', params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'error'
                    } else {
                        //this.usuarios.push(res.data)
                        this.usuarios = res.data[2].usuarios
                        this.text = 'Se agregó correctamente un Nuevo Usuario'
                        this.color = 'success'
                        this.cancelarEdicion()
                        this.check = false
                    }
                    this.snackbar = true
                    
                })
                .catch( error => {
                    this.color = 'error'
                    this.text = 'Hubo un error Creado el Usuario, Comuniquese con el Administrador'
                    this.snackbar = true
                })
        },
        cambioProvincia() {
            this.local_disable = true
            
            if ( this.usuario.provincia != '' )
                axios.get(`/localidad/${this.usuario.provincia}`)
                    .then( res => {
                        this.localidades = res.data
                        if ( this.usuario.edit_loc == '')
                            this.usuario.localidad= ''
                        else
                            this.usuario.edit_loc = ''
                        //if ( this.usuario.provincia != 4)
                            this.local_disable = false
                      
                        this.cambioLocalidad()
                    })
        },

        cambioLocalidad(item) {
           
            if ( this.localidades != '') {
            
                const index = this.localidades.find( (element) => element.id === this.usuario.localidad )
                
                if ( !index )
                    this.usuario.cp = ''
                else
                    this.usuario.cp = index.cp
                
            }
            
        },

        editarFormulario( item ) {
            this.usuario.dni = item.dni
            this.usuario.razonsocial = item.razonsocial
            this.usuario.telefono = item.telefono
            this.usuario.whatsapp = item.whatsapp
            this.usuario.correo = item.correo
            this.usuario.direccion = item.direccion
            this.entre_calles = item.entre_calles
            this.usuario.provincia = item.provincia
            this.usuario.localidad = item.localidad
            this.usuario.edit_loc = item.localidad
            this.usuario.pais = item.pais
            this.usuario.cod_tempo = item.cod_tempo
            this.usuario.cli_id = item.cli_id
            this.usuario.saldo = item.saldo
            this.usuario.perfil = item.perfil
            this.usuario.per_descripcion = item.perfil
            this.usuario.estado = item.estado
            this.usuario.usr_id = item.usr_id
            this.modoEditar = true
            this.nc = false
            this.editando = false
        },

        editarUsuario( usuario) {
            this.$v.usuario.$touch()
            if ( this.$v.usuario.$pending || this.$v.usuario.error ) return
            const params = { dni: this.usuario.dni,
                             razonsocial: this.usuario.razonsocial,
                             telefono: this.usuario.telefono,
                             whatsapp: this.usuario.whatsapp,
                             correo: this.usuario.correo,
                             direccion: this.usuario.direccion,
                             entre_calles: this.usuario.entre_calles,
                             provincia: this.usuario.provincia,
                             cod_postal: this.usuario.localidad,
                             pais: this.usuario.pais,
                             cod_tempo: this.usuario.cod_tempo,
                             cli_id: this.usuario.cli_id,
                             saldo: this.usuario.saldo,
                             perfil: this.usuario.perfil,
                             estado: this.usuario.estado,
                             usr_id: this.usuario.usr_id,
                             id: this.usuario.usr_id,
                             sw: 1,
                        }
            axios.post(`/admin/clientes`, params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color= 'error'
                    }else {
                        this.usuarios = res.data[2].usuarios
                        this.editarFormulario(this.usuarios)
                        this.text = 'Se Actualizo los datos del Cliente Correctamente'
                        this.color = 'success'
                        this.cancelarEdicion()
                        this.modoEditar = false
                    }
                    this.$v.$reset()
                    this.snackbar = true
                })
                .catch( error => {
                    this.text = 'Error General editando Clientes'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        },

        eliminar( item ) {
            this.usuario.usr_id = item.usr_id
            this.usuario.razonsocial = item.razonsocial
            this.eliminarModal = true
        },

        ePassword ( item ) {
            this.$v.$reset()
            this.usuario.usr_id = item.usr_id
            this.clave.pass = ''
            this.clave.passok = ''
            this.passwordModal = true
        },

        editPassword() {
            this.$v.clave.$touch()
            if ( this.$v.clave.$pending || this.$v.clave.$error) return
            const params = {id: this.usuario.usr_id, password: this.clave.pass, check: this.check}
            axios.post(`/admin/password-edit`, params)
                .then( res => {
                    this.text = 'Se Modifico la Contraseña Correctamente del Usuario'
                    this.color = 'success'
                    this.passwordModal = false
                    this.snackbar = true
                    this.check = false
                    this.clave.pass = ''
                })
                .catch( error => {
                    this.text = 'Hubo un error General cambiado la clave del Usuario'
                    this.color = 'error'
                    this.passwordModal= false
                    this.snackbar = true
                    this.check = false
                    this.clave.pass = ''
                })
        },

        eliminarUsuarios() {
            const params = {id: this.usuario.usr_id, sw: 3}
            axios.post(`/admin/clientes`, params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'error'
                    } else {
                        const index = this.usuarios.findIndex( item => item.id === this.usuario.usr_id)
                        this.usuarios.splice(index, 1)
                        this.text = 'Se Eliminó el usuario Correctamente'
                        this.color = 'bg-danger'
                    }
                    this.eliminarModal = false
                    this.snackbar = true
                })
                .catch( error => {
                    this.text = 'Hubo un Error General Eliminando el Usiuario'
                    this.color = 'error'
                    this.eliminarModal = false
                    this.snackbar = true
                })
        },

        cancelarEdicion() {
            this.$v.usuario.$reset()
            this.usuario.dni = ''
            this.usuario.razonsocial = ''
            this.usuario.telefono = ''
            this.usuario.whatsapp = ''
            this.usuario.correo = ''
            this.usuario.direccion = ''
            this.usuario.provincia = ''
            this.usuario.localidad = ''
            this.usuario.edit_loc = ''
            this.usuario.pais = ''
            this.usuario.cod_tempo = ''
            this.usuario.cli_id = ''
            this.usuario.saldo = ''
            this.usuario.perfil = ''
            this.usuario.per_descripcion = ''
            this.usuario.estado = ''
            this.usuario.usr_id = ''
            this.entre_calles = ''
            this.modoEditar = false
            this.nc = false
            this.editando = true
        },

        cancelPassword() {
            this.$v.$reset()
            this.clave.pass = ''
            this.clave.passok = ''
            this.check = false
            this.passwordModal = false
        },
    },

    validations: {
        usuario: {
            razonsocial: {
                required,
                minLength: minLength(4),
                maxLength: maxLength(50)
            },
            dni: {
                required, numeric, minLength: minLength(8), maxLength: maxLength(15)
            },
            telefono: {
                required, numeric
            },
            whatsapp: {
                required, numeric
            },
            correo: {
                required, email, maxLength: maxLength(50)
            },
            direccion: {
                required, minLength: minLength(4), maxLength: maxLength(100)
            },
            provincia: { required, numeric },
            localidad: { required, numeric },
            per_descripcion: {required},
            cp: { numeric },
            saldo: { decimal },
            cod_tempo: {maxLength: maxLength(15)},
            estado: { required },
        },
        clave: {
            pass: {
                required,
                minLength: minLength(8),
                maxLength: maxLength(50)
            },

            passok: {
                required,
                sameAs: sameAs('pass')
            }
        },
    }
}
</script>