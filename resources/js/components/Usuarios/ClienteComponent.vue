<template>
    <div class="container">
        <v-snackbar v-model="snackbar" top right :timeout="5000" :color="color">
            {{ text }}
            <v-btn color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>

        <v-card class="d-lg-flex justify-space-between mb-2">
            <v-card-title class="headline d-flex start text-truncate"> {{$t('m.my_datos')}} </v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu_es" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu_en" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>

        <!-- Formulario -->
        <v-card class="mt-3">
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
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="4">
                        <v-text-field v-model.trim="$v.usuario.per_descripcion.$model"
                                    :label="this.$t('m.t_client')"
                                    :error-messages="perfilErrors"
                                    @input="$v.usuario.per_descripcion.$touch()"
                                    @blur="$v.usuario.per_descripcion.$touch()"
                                    type="text"
                                    :counter="50"
                                    disabled
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6" md="8">
                        <v-text-field v-model.trim="$v.usuario.direccion.$model"
                                    :label="this.$t('m.street')"
                                    :error-messages="addressErrors"
                                    @input="$v.usuario.direccion.$touch()"
                                    @blur="$v.usuario.direccion.$touch()"
                                    type="text"
                                    :counter="100"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-autocomplete v-model="$v.usuario.provincia.$model"
                                    :error-messages="provinciaErrors"
                                    @input="$v.usuario.provincia.$touch()"
                                    @blur="$v.usuario.provincia.$touch()"
                                    :label="this.$t('m.state')"
                                    :disabled='prov_disable'
                                    :items='provincias'
                                        item-text="txt"
                                        item-value="id"
                        ></v-autocomplete>
                    </v-col>

                    <v-col cols="12" md="6">
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

                    <v-col cols="6" md="6">
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
                                    disabled
                        ></v-text-field>
                    </v-col>
                </v-row>

                <v-row>
                    <v-btn class="mr-4 mt-3" @click="editarUsuario(usuario)" color="blue" dark large rounded >
                        <v-icon left>mdi-pencil</v-icon>
                         {{this.$t('m.update')}} 
                    </v-btn>
                </v-row>
                <v-row><v-col cols="12"></v-col></v-row>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
import { required, minLength, maxLength, email, numeric } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            text: '',
            color: '',
            snackbar: false,
            provincias: [],
            localidades: [],
            loading: true,
            modoEditar: false,
            usuario: {razonsocial: '', dni: '', telefono: '', whatsapp: '', correo: '',
                    direccion: '', provincia: '', localidad: '', pais: '', cod_tempo: '',
                    cli_id: '', saldo: '', perfil: '', per_descripcion: '', estado: '',
                    usr_id: '', edit_loc: '', cp:''},
            prov_disable: true,
            local_disable: true,
            breadmenu_es: [{text: 'Swell', disabled: false, href: '/',},
                           {text: 'Clientes', disabled: true, href: 'clientes'}],
            breadmenu_en: [{text: 'Swell', disabled: false, href: '/',},
                           {text: 'customers', disabled: true, href: 'clientes'}],
            pp: 'a',
        }
    },

    created() {
        axios.get('/cliente/data')
            .then ( res => {
                this.usuarios = res.data
                this.pp = res.data
                this.editarFormulario(this.usuarios)
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
    },

    computed: {
        dniErrors() {
            const errors = []
            if ( !this.$v.usuario.dni.$dirty ) return errors
            !this.$v.usuario.dni.minLength && errors.push(this.$t('m.min_lenght_error') + ' 8')
            !this.$v.usuario.dni.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.usuario.dni.required && errors.push(this.$t('m.required_error'))
            !this.$v.usuario.dni.numeric && errors.push(this.$t('m.message_numeric'))
            return errors
        },

        razonErrors() {
            const errors = []
            if ( !this.$v.usuario.razonsocial.$dirty ) return errors
            !this.$v.usuario.razonsocial.minLength && errors.push(this.$t('m.min_length_error') + ' 4')
            !this.$v.usuario.razonsocial.maxLength && errors.push(this.$t('m.max_length_error'))
            !this.$v.usuario.razonsocial.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        correoErrors() {
            const errors = []
            if ( !this.$v.usuario.correo.$dirty ) return errors
            !this.$v.usuario.correo.maxLength && errors.push(this.$t('m.max_length_error'))
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
            return errors
        },

        addressErrors() {
            const errors = []
            if ( !this.$v.usuario.direccion.$dirty ) return errors
            !this.$v.usuario.direccion.minLength && errors.push(this.$t('m.min_length_error') + ' 4')
            !this.$v.usuario.direccion.maxLength && errors.push(this.$t('m.max_length_error'))
            !this.$v.usuario.direccion.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        provinciaErrors() {
            const errors = []
            if ( !this.$v.usuario.provincia.$dirty ) return errors
            !this.$v.usuario.provincia.numeric && errors.push(this.$t('m.message_numeric'))
            return errors
        },

        localidadErrors() {
            const errors = []
            if ( !this.$v.usuario.localidad.$dirty ) return errors
            !this.$v.usuario.localidad.numeric && errors.push(this.$t('m.message_numeric'))
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
            !this.$v.usuario.saldo.numeric && errors.push(this.$t('m.message_numeric'))
            return errors
        },
    },

    methods: {
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
            this.pp = this.usuario.localidad
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
            this.usuario.provincia = item.provincia
            this.usuario.localidad = item.localidad
            this.usuario.edit_loc = item.localidad
            this.usuario.pais = item.pais
            this.usuario.cod_tempo = item.cod_tempo
            this.usuario.cli_id = item.cli_id
            this.usuario.saldo = item.saldo
            this.usuario.perfil = item.perfil
            this.usuario.per_descripcion = item.per_descripcion
            this.usuario.estado = item.estado
            this.usuario.usr_id = item.usr_id
            this.modoEditar = true
            
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
                             provincia: this.usuario.provincia,
                             cod_postal: this.usuario.localidad,
                             pais: this.usuario.pais,
                             cod_tempo: this.usuario.cod_tempo,
                             cli_id: this.usuario.cli_id,
                             saldo: this.usuario.saldo,
                             perfil: this.usuario.perfil,
                             estado: this.usuario.estado,
                             usr_id: this.usuario.usr_id,
                             id: this.usuario.cli_id,
                             sw: 1,
                        }
            axios.post(`/cliente`, params)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color= 'error'
                    }else {
                        this.usuarios = res.data[2]
                        this.editarFormulario(this.usuarios)
                        this.text = 'Datos Actualiazos'
                        this.color = 'success'
                    }
                    this.$v.$reset()
                    this.snackbar = true
                })
                .catch( error => {
                    this.text = 'Error editando'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
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
            provincia: { numeric },
            localidad: { numeric },
            per_descripcion: {required},
            cp: { numeric },
            saldo: { numeric},
        }
    }
}
</script>