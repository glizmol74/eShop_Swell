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

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Información de la Empresa</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Formulario -->
        <v-card class="mt-3">
            <v-card-title>Datos de Contacto Empresa</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col cols="12" sm="6" md="4">
                        <v-text-field v-model.trim="$v.empresa.nombre.$model"
                                label="Razón Social"
                                :error-messages="nombreErrors"
                                @input="$v.empresa.nombre.$touch()"
                                @blur="$v.empresa.nombre.$touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="4">
                        <v-text-field v-model.trim="$v.empresa.cuit.$model"
                                label="Cuit"
                                :error-messages="cuitErrors"
                                @input="$v.empresa.cuit.$touch()"
                                @blur="$v.empresa.cuit.$touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="4">
                        <v-text-field v-model.trim="$v.empresa.correo.$model"
                                label="Correo Ateción Clientes"
                                :error-messages="correoErrors"
                                @input="$v.empresa.correo.$touch()"
                                @blur="$v.empresa.correo.$touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="4">
                        <v-text-field v-model.trim="$v.empresa.admin.$model"
                                label="Correo Administración"
                                :error-messages="adminErrors"
                                @input="$v.empresa.admin.$touch()"
                                @blur="$v.empresa.admin.$touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="4">
                        <v-text-field v-model.trim="$v.empresa.ventas.$model"
                                label="Correo Ventas"
                                :error-messages="ventasErrors"
                                @input="$v.empresa.ventas.$touch()"
                                @blur="$v.empresa.ventas.$touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="12" md="12">
                        <v-text-field v-model.trim="$v.empresa.direccion.$model"
                                label="Dirección"
                                :error-messages="direccionErrors"
                                @input="$v.empresa.direccion.$touch()"
                                @blur="$v.empresa.direccion.$touch()"
                                type="text"
                                :counter="199"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="3">
                        <v-text-field v-model.trim="$v.empresa.telefono.$model"
                                label="Teléfono"
                                :error-messages="telefonoErrors"
                                @input="$v.empresa.telefono.$touch()"
                                @blur="$v.empresa.telefono.$touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="3">
                        <v-text-field v-model.trim="$v.empresa.whatsapp.$model"
                                label="Whatsapp"
                                :error-messages="whatsappErrors"
                                @input="$v.empresa.whatsapp.$touch()"
                                @blur="$v.empresa.whatsapp.$touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="6">
                        <v-text-field v-model.trim="$v.empresa.mapa.$model"
                                label="Mapa"
                                :error-messages="mapaErrors"
                                @input="$v.empresa.mapa.$touch()"
                                @blur="$v.empresa.mapa.$touch()"
                                type="text"
                                :counter="500"
                        ></v-text-field>
                    </v-col>
                </v-row>

                <v-card-title>Datos de la Aplicación</v-card-title>
                <v-row>
                    <v-col cols="12" sm="6" md="6">
                        <v-text-field v-model.trim="$v.empresa.app.$model"
                                label="Nombre Aplicación"
                                :error-messages="appErrors"
                                @input="$v.empresa.app.$touch()"
                                @blur="$v.empresa.app.$touch()"
                                type="text"
                                :counter="50"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6" md="6">
                        <v-select v-model.trim="$v.empresa.perfil.$model"
                                label="Perfil Nuevos Usuarios"
                                :error-messages="perfilErrors"
                                @input="$v.empresa.perfil.$touch()"
                                @blur="$v.empresa.perfil.$touch()"
                                :items="perfiles"
                                    item-text="text"
                                    item-value="id"
                        ></v-select>
                    </v-col>

                    <v-col cols="6" sm="6" md="6">
                        <v-card-text class="text-center">
                            <v-img :src="empresa.logo" size = "40" contain width="100px"></v-img>
                        </v-card-text>
                    </v-col>

                    <v-col cols="6" sm="6" md="6">
                        <v-file-input accept="image/*"
                                    label="Logo Empresa"
                                    v-model="logo"
                                    type="file"
                                    :messages="['Recomendado Archivo PNG de 50px Máximo']"
                        ></v-file-input>
                    </v-col>
                </v-row>
                <v-row justify="center">
                    <v-btn class="mr-4 mt-3" @click="guardar" color="blue" dark>Guardar</v-btn>
                </v-row>
            </v-card-text>
            
        </v-card>
        <!-- Fin Formulario -->

    </div>
</template>

<script>
import { required, minLength, maxLength, email, numeric  } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            text: '',
            color: '',
            snackbar: '', 
            src_logo: '/storage/images/logoEmpresa.png',
            logo: [],
            loading: true,
            empresa: {id: '', nombre: '', app: '', direccion: '', telefono: '', whatsapp: '',
                      cuit: '', logo: '', perfil: '', correo: '', mapa: '', admin: '', ventas: '' },
            perfiles: [],
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Empresa', disabled: true, href: '/admin/empresa'}],
        }
        
    },

    created() {
        axios.get('/admin/empresa/data')
            .then( res => {
                this.empresa.id = res.data.empresa.id
                this.empresa.nombre = res.data.empresa.emp_nombre
                this.empresa.app = res.data.empresa.emp_app
                this.empresa.direccion = res.data.empresa.emp_direccion
                this.empresa.telefono = res.data.empresa.emp_telefono
                this.empresa.whatsapp = res.data.empresa.emp_whatsapp
                this.empresa.cuit = res.data.empresa.emp_cuit
                this.empresa.logo = res.data.empresa.emp_logo
                this.empresa.perfil = res.data.empresa.emp_perfil_base
                this.empresa.correo = res.data.empresa.emp_email
                this.empresa.mapa = res.data.empresa.emp_mapa
                this.empresa.admin = res.data.empresa.emp_admin
                this.empresa.ventas = res.data.empresa.emp_ventas
                this.perfiles = res.data.perfiles
            })
    },

    computed: {
        nombreErrors() {
            const errors = []
            if ( !this.$v.empresa.nombre.$dirty ) return errors
            !this.$v.empresa.nombre.required && errors.push( this.$t('m.required_error'))
            !this.$v.empresa.nombre.minLength && errors.push( this.$t('m.min_lenght_error') + ' 2')
            !this.$v.empresa.nombre.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        appErrors() {
            const errors = []
            if ( !this.$v.empresa.app.$dirty ) return errors
            !this.$v.empresa.app.required && errors.push( this.$t('m.required_error'))
            !this.$v.empresa.app.minLength && errors.push( this.$t('m.min_lenght_error') + ' 2')
            !this.$v.empresa.app.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        direccionErrors() {
            const errors = []
            if ( !this.$v.empresa.direccion.$dirty ) return errors
            !this.$v.empresa.direccion.minLength && errors.push( this.$t('m.min_lenght_error') + ' 8')
            !this.$v.empresa.direccion.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        telefonoErrors() {
            const errors = []
            if ( !this.$v.empresa.telefono.$dirty ) return errors
            !this.$v.empresa.telefono.minLength && errors.push( this.$t('m.min_lenght_error') + ' 8')
            !this.$v.empresa.telefono.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        whatsappErrors() {
            const errors = []
            if ( !this.$v.empresa.whatsapp.$dirty ) return errors
            !this.$v.empresa.whatsapp.minLength && errors.push( this.$t('m.min_lenght_error') + ' 8')
            !this.$v.empresa.whatsapp.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        cuitErrors() {
            const errors = []
            if ( !this.$v.empresa.cuit.$dirty ) return errors
            !this.$v.empresa.cuit.required && errors.push( this.$t('m.required_error'))
            !this.$v.empresa.cuit.minLength && errors.push( this.$t('m.min_lenght_error') + ' 8')
            !this.$v.empresa.cuit.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        correoErrors() {
            const errors = []
            if ( !this.$v.empresa.correo.$dirty ) return errors
            !this.$v.empresa.correo.required && errors.push( this.$t('m.required_error'))
            !this.$v.empresa.correo.minLength && errors.push( this.$t('m.min_lenght_error') + ' 2')
            !this.$v.empresa.correo.maxLength && errors.push( this.$t('m.max_lenght_error'))
            !this.$v.empresa.correo.email && errors.push( this.$t('m.email_error'))
            return errors
        },

        adminErrors() {
            const errors = []
            if ( !this.$v.empresa.admin.$dirty ) return errors
            !this.$v.empresa.admin.required && errors.push( this.$t('m.required_error'))
            !this.$v.empresa.admin.minLength && errors.push( this.$t('m.min_lenght_error') + ' 2')
            !this.$v.empresa.admin.maxLength && errors.push( this.$t('m.max_lenght_error'))
            !this.$v.empresa.admin.email && errors.push( this.$t('m.email_error'))
            return errors
        },

        ventasErrors() {
            const errors = []
            if ( !this.$v.empresa.ventas.$dirty ) return errors
            !this.$v.empresa.ventas.required && errors.push( this.$t('m.required_error'))
            !this.$v.empresa.ventas.minLength && errors.push( this.$t('m.min_lenght_error') + ' 2')
            !this.$v.empresa.ventas.maxLength && errors.push( this.$t('m.max_lenght_error'))
            !this.$v.empresa.ventas.email && errors.push( this.$t('m.email_error'))
            return errors
        },

        mapaErrors() {
            const errors = []
            if ( !this.$v.empresa.mapa.$dirty ) return errors
            !this.$v.empresa.mapa.maxLength && errors.push( this.$t('m.max_lenght_error'))
            return errors
        },

        perfilErrors() {
            const errors = []
            if ( !this.$v.empresa.perfil.$dirty ) return errors
            !this.$v.empresa.perfil.numeric && errors.push( this.$t('m.message_numeric'))
            return errors
        },
    },

    methods: {
        guardar() {
            this.$v.empresa.$touch()
            if ( this.$v.empresa.$pending || this.$v.empresa.$error ) return

            if ( this.logo != '' ) {
                let file = new FormData()
                file.append("files", this.logo)
                file.append("tipo",1)
                axios.post('/admin/empresa', file, {headers: {'content-type': 'multipart/form-data'} })
                    .then( res => {
                        this.text = res.data
                    })
            }

            const params = { id: this.empresa.id, nombre: this.empresa.nombre, app: this.empresa.app,
                             direccion: this.empresa.direccion, telefono: this.empresa.telefono, whatsapp: this.empresa.whatsapp,
                             cuit: this.empresa.cuit, logo: this.empresa.logo, perfil: this.empresa.perfil,
                             correo: this.empresa.correo, mapa: this.empresa.mapa, admin: this.empresa.admin, 
                             ventas: this.empresa.ventas, tipo: 2 }
            axios.post('/admin/empresa', params)
                .then( res => {
                    if ( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                    }
                })
                .catch( error => {
                    console.log( error.response )
                    this.text = 'Hubo un error General al Actualizar los datos de la Empresa'
                    this.color = 'error'
                    this.snackbar = true
                })
        },
    },

    validations: {
        empresa: {
            nombre: { required, minLength: minLength(2), maxLength: maxLength(50) },
            app: { required, minLength: minLength(2), maxLength: maxLength(50) },
            direccion: { minLength: minLength(8), maxLength: maxLength(199) },
            telefono: { minLength: minLength(8), maxLength: maxLength(50) },
            whatsapp: { minLength: minLength(8), maxLength: maxLength(50) },
            cuit: { required, minLength: minLength(8), maxLength: maxLength(50) },
            correo: { required, minLength: minLength(8), maxLength: maxLength(50), email },
            admin: { required, minLength: minLength(8), maxLength: maxLength(50), email },
            ventas: { required, minLength: minLength(8), maxLength: maxLength(50), email },
            perfil: { numeric },
            mapa: { maxLength: maxLength(500) },
        }
    },
}
</script>