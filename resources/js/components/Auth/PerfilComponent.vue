<template>
    
    <div class="container">
       
        <v-snackbar v-model="snackbar" top right :timeout="5000" :color="color">
            {{ text }}
            <v-btn :color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>
        
        <v-row justify="center">
            <v-dialog v-model="passwordModal" persistent max-width="600">
                <v-card>
                    <v-form ref="form" v-model="valid" lazy-validation>
                    <v-card-title class="headline">{{ this.$t('m.password_new') }}</v-card-title>
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
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-actions>
                    <v-card-actions>
                        <v-spacer>
                            <v-btn color="red darken-1" text @click="cancelPassword()"> {{ this.$t('m.cancel')}} </v-btn>
                            <v-btn color="green darken-1" text @click="editarPassword()"> {{ this.$t('m.send')}} </v-btn>
                        </v-spacer>
                    </v-card-actions>
                    </v-form>
                </v-card>
            </v-dialog>
        </v-row>

        <v-card class="d-lg-flex justify-space-between mb-2 my-4">
            <v-card-title class="headline d-flex start text-truncate"> {{ this.$t('m.my_perfil')}} </v-card-title>
        </v-card>
        <v-card v-if="ok==0" class="mt-3">
            <v-card-title>
                Verificación de Datos
                <v-spacer></v-spacer>
              
            </v-card-title>
            <v-card-text>
                <v-container fluid>
                    <v-row>
                        <v-col v-if="correoOk == null" cols="12" sm="12" md="12">
                            <p>{{$t('m.reg_ok1')}} : <strong>{{usuario.correo}}</strong> </p>
                            <p>{{$t('m.reg_ok2')}} [  <strong>{{$t('m.reg_ok3')}}</strong> ]</p>
                            <v-row>
                                <v-col cols="6" sm="6" md="6">
                                    <v-text-field v-model.trim="$v.codigo.$model"
                                            :label="this.$t('m.code')"
                                            :error-messages="codigoErrors"
                                            @input="$v.codigo.$touch()"
                                            @blur="$v.codigo.$touch()"
                                            type="text"
                                            outlined
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3" sm="3" md="3">
                                    <v-btn class="mt-3" color="success" small @click=" validarEmail">{{$t('m.validate_mail')}}</v-btn>
                                </v-col>
                            </v-row>
                        </v-col>
                        

                        <v-col v-if="st == 0" cols="12" sm="12" md="12">
                            <p>{{$t('m.reg_ok4')}}</p>
                        </v-col>

                        <v-col cols="12" sm="6" md="3">
                            <v-icon v-if="st == 0">mdi-checkbox-blank-circle-outline</v-icon>
                            <v-icon v-else color="success">mdi-checkbox-marked-circle</v-icon>
                            {{'Estado Activo'}}
                        </v-col>
                        <v-col cols="12" sm="6" md="3">
                            <v-icon v-if="correoOk == null">mdi-checkbox-blank-circle-outline</v-icon>
                            <v-icon v-else color="success">mdi-checkbox-marked-circle</v-icon>
                            {{'Email Verificado'}}
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-card-text>
                            <v-btn v-if="correoOk == null" class="mt-5 mx-5" color="cyan" @click="sendMail">{{$t('m.reg_ok3')}}</v-btn>
                            <!-- <v-btn class="mt-5 mx-5" :href="`https://wa.me/54${usuario.celular}?text=685xft`">Enviar Codigo</v-btn> -->
                        </v-card-text>
                    </v-row>
                </v-container>
            </v-card-text>
        </v-card>
        <v-card class="mt-3">
            <form>
                <v-card-title> {{this.$t('m.my_datos')}} </v-card-title>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" sm="8" md="6">
                            <v-text-field v-model.trim="$v.usuario.nombre.$model"
                                    :label="this.$t('m.full_name')"
                                    :error-messages="nombreErrors"
                                    @input="$v.usuario.nombre.$touch()"
                                    @blur="$v.usuario.nombre.$touch()"
                                    type="text"
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12" sm="8" md="6">
                            <v-text-field v-model.trim="$v.usuario.correo.$model"
                                    :label="this.$t('m.email')"
                                    :error-messages="correoErrors"
                                    @input="$v.usuario.correo.$touch()"
                                    @blur="$v.usuario.correo.$touch()"
                                    type="text"
                                    disabled
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12" sm="12" md="12"></v-col>
                    </v-row>

                    <v-btn class="mr-4 mt-3" @click="editarUsuario(usuario)" color="blue" dark > {{this.$t('m.save')}} </v-btn>
                    <v-btn class="mr-4 mt-3" @click="passwordModal=true" color="green" dark > {{this.$t('m.password_change')}} </v-btn>
                    
                </v-card-text> 
            </form>
        </v-card> 
    </div>    
</template>

<script>

import { required, minLength, maxLength, email, sameAs } from "vuelidate/lib/validators"

export default {
    
    data() {
        return {
            passwordModal: false,
            clave: {pass: '', passok: ''},
            text: '',
            color: '',
            pass: '',
            repeartpassword: '',
            snackbar: false,
            loading: true,
            usuario: {id:'', nombre:'', correo: '', perfil: '', celular: ''},
            show1: false,
            show2: false,
            st: 0,
            ok: 0,
            correoOk: 0,
            cmd_celular: '',
            txtData: '',
            formData: {id:'', cuit:'', razon:'', telefono:'', address:'', correo:'', fecEntrega: '', fecha: ''},
            date: new Date(), 
            codigo: '',
            xx: '',
        }
    },

    created () {
        axios.get('/perfil/data')
            .then( res => {
                this.usuario.id = res.data.id
                this.usuario.nombre = res.data.name
                this.usuario.correo = res.data.email
                this.usuario.perfil = res.data.perfil
                this.usuario.celular = res.data.celular
                this.correoOk = res.data.email_ok
                this.st = res.data.cli_estado
                this.cmd_celular = 'https://'
                if ( this.st  == 0 || this.correoOk == null)
                    this.ok = 0
                else
                    this.ok = 1
                this.txtData = 'formdata'
                this.formData.id = res.data.id
                this.formData.cuit = res.data.cli_cuit
                this.formData.razon = res.data.name
                this.formData.telefono = res.data.celular
                this.formData.address = res.data.cli_direccion
                this.formData.correo = res.data.email
                this.formData.fecEntrega = new Date(this.date.getFullYear(), this.date.getMonth(), this.date.getDate()+3 ).toISOString().substr(0, 10)
                this.formData.fecha = new Date(this.date.getFullYear(), this.date.getMonth(), this.date.getDate()).toISOString().substr(0, 10)
                const parsed = JSON.stringify(this.formData)
                localStorage.setItem(this.txtData, parsed)
               
            })
    },

    mounted() {
        
        this.xx = this.$session.get('u-tipo')
    },


    computed: {
        codigoErrors() {
            const errors = []
            if (!this.$v.codigo.$dirty) return errors
            !this.$v.codigo.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.codigo.minLength && errors.push(this.$t('m.min_lenght_error'))
            !this.$v.codigo.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        nombreErrors() {
            const errors = []
            if ( !this.$v.usuario.nombre.$dirty ) return errors
            !this.$v.usuario.nombre.minLength && errors.push(this.$t('m.min_lenght_error') )
            !this.$v.usuario.nombre.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.usuario.nombre.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        correoErrors() {
            const errors = []
            if ( !this.$v.usuario.correo.$dirty ) return errors
            !this.$v.usuario.correo.minLength && errors.push(this.$t('m.min_lenght_error') )
            !this.$v.usuario.correo.maxLength && errors.push(this.$t('m.max_lenght_error') )
            !this.$v.usuario.correo.email && errors.push(this.$t('m.email_error') )
            !this.$v.usuario.correo.required && errors.push(this.$t('m.required_error') )
            return errors
        },

        passErrors() {
            
            const errors = []
            if ( !this.$v.clave.pass.$dirty ) return errors
            !this.$v.clave.pass.minLength && errors.push(this.$t('m.min_lenght_error'))
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

        sendMail() {
            axios.get(`/email/verify/${this.usuario.id}`)
                .then((res) => {
                    if ( res.data[0] == 1) {
                        this.color = 'bg-success'
                    } else {
                        this.color = 'bg-danger'
                        
                    }
                    this.text = res.data[1]
                })
                .catch( error => {
                    this.color = 'bg-danger'
                    text = error
                })
                this.snackbar = true
        },

        validarEmail() {
            const param = {codigo: this.codigo}
            axios.post('/validar-email', param)
                .then((res) => {
                    if ( res.data[0] == 1) {
                        this.correoOk = res.data[2];
                        this.text = this.$t('m.validate_mail_ok')
                        this.color = 'bg-success'
                        if ( this.st  == 0 || this.correoOk == null)
                            this.ok = 0
                        else {
                            this.ok = 1
                            this.$session.set('u-st',this.ok);
                            window.location.href = "/perfil";
                        }
                    }else {
                        this.text = this.$t('m.validate_mail_error')
                        this.color = 'bg-orange'
                    }
                })
                .catch ( error => {
                    this.text = error // this.$t('m.validate_mail_error')
                    this.color = 'bg-danger'
                })
                this.snackbar = true
        },

        sendCodigo() {
            let contenido = 'https://wa.me/54'+this.usuario.celular+'?text=685xft'
            axios.get(contenido)
        },

        editarPassword() {
            
            this.$v.clave.$touch();
            this.text = this.$v.clave.$pending + ' | ' + this.$v.clave.$error

            if( this.$v.clave.$pending || this.$v.clave.$error ) return;
            const params = { id: this.usuario.id, password: this.clave.pass, check: this.check }
            this.$v.clave.$reset()
            axios.post(`/pefil/edit_password`, params)
                    .then( res => {
                        this.text = this.$t('m.password_success')
                        this.color = 'bg-success'
                        this.passwordModal = false
                        this.snackbar = true
                        this.check = false
                        this.clave.pass = ''
                        this.clave.passok = ''
                    })
                    .catch( error => {
                        this.text = this.$t('m.password_error')
                        this.color = 'bg-danger'
                        this.snackbar = true
                        this.check = false
                        this. passwordModal = false
                        this.clave.pass = ''
                        this.clave.passok = ''
                    })
        },

        cancelPassword() {
            this.$v.clave.$reset()
            this.clave.passok = ''
            this.clave.pass = ''
            this.passwordModal = false
        },

        editarUsuario() {
            this.$v.usuario.$touch()
            this.text = this.$v.usuario.$pending + ' | ' + this.$v.usuario.$error
            if ( this.$v.usuario.$pending || this.$v.usuario.$error ) return

            const params = {id: this.usuario.id, nombre: this.usuario.nombre, email: this.usuario.correo, sw: 2}

            axios.post(`/cliente`, params)
                .then( res => {
                    this.$v.$reset()
                    this.text = this.$t('m.usuario_edit')
                    this.color = 'bg-success'
                    this.snackbar = true
                    this.formData.razon = res.data[2].cli_razon
                    const parsed = JSON.stringify(this.formData)
                    localStorage.setItem(this.txtData, parsed)
                })
                .catch( error => {
                    this.text = this.$t('m.usuario_edit_error')
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        },
    },

    validations: {
        usuario: {
            nombre: {
                required,
                minLength: minLength(4),
                maxLength: maxLength(50)
            },

            correo: {
                required,
                minLength: minLength(8),
                maxLength: maxLength(50),
                email
            },

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

        pass: {
            required,
            minLength: minLength(8),
            maxLength: maxLength(40)
        },

        repeartpassword: {
            sameAs: sameAs('pass')
        },

        codigo: {
            required,
            minLength : minLength(6),
            maxLength : maxLength(6)
        },
    }
}
</script>