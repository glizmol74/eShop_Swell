<template>
    
    <v-col cols="12" md="10" offset-md="1" class="">
        <v-card width="" elevation="0">
            <v-container fluid> 
                <v-form ref="form" v-model="valid" lazy-validation>
                    <v-row>
                        <v-col cols="12" md="6">
                            <v-text-field
                            v-model.trim="$v.datos.cli_razon.$model"
                            :error-messages="cli_razonErrors"
                            @input="$v.datos.cli_razon.$touch()"
                            @blur="$v.datos.cli_razon.$touch()"
                            :counter="50"
                            :label="this.$t('m.full_name')"
                            filled
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field
                            v-model.trim="$v.datos.cli_cuit.$model"
                            :error-messages="dniErrors"
                            :messages="this.$t('m.message_numeric')"
                            :counter="15"
                            :label="this.$t('m.cuit')"
                            @input="$v.datos.cli_cuit.$touch()"
                            @blur="$v.datos.cli_cuit.$touch()"
                            type="number"
                            filled
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field
                            v-model.trim="$v.datos.cli_telefono.$model"
                            :error-messages="cli_telefonoErrors"
                            :counter="50"
                            :label="this.$t('m.phone')"
                            @input="$v.datos.cli_telefono.$touch()"
                            @blur="$v.datos.cli_telefono.$touch()"
                            filled
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field
                            v-model.trim="$v.datos.cli_whatsapp.$model"
                            :error-messages="whatsappErrors"
                            :counter="50"
                            label="Whatsapp"
                            @input="$v.datos.cli_whatsapp.$touch()"
                            @blur="$v.datos.cli_whatsapp.$touch()"
                            filled
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            v-model.trim="$v.datos.cli_pass.$model"
                            :type="show1 ? 'text' : 'password'"
                            :error-messages="passErrors"
                            :counter="50"
                            :label="this.$t('m.password')"
                            @input="$v.datos.cli_pass.$touch()"
                            @blur="$v.datos.cli_pass.$touch()"
                            @click:append="show1 = !show1"
                            filled
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field
                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                            v-model.trim="$v.datos.cli_passok.$model"
                            :type="show2 ? 'text' : 'password'"
                            :error-messages="passwordErrors"
                            :success-messages="passwordSuccess"
                            :counter="50"
                            :label="this.$t('m.repeartpassword')"
                            @input="$v.datos.cli_passok.$touch()"
                            @blur="$v.datos.cli_passok.$touch()"
                            @click:append="show2 = !show2"
                            filled
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field
                            v-model.trim="$v.datos.cli_direccion.$model"
                            :error-messages="direccionErrors"
                            :counter="100"
                            :label="this.$t('m.street')"
                            @input="$v.datos.cli_direccion.$touch()"
                            @blur="$v.datos.cli_direccion.$touch()"
                            filled
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field
                            v-model.trim="$v.datos.cli_email.$model"
                            :error-messages="cli_emailErrors"
                            @input="$v.datos.cli_email.$touch()"
                            @blur="$v.datos.cli_email.$touch()"
                            :counter="50"
                            :label="this.$t('m.email')"
                            filled
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-autocomplete
                                v-model.trim="$v.datos.cli_provincia.$model"
                                :error-messages="provinciaErrors"
                                @input="$v.datos.cli_provincia.$touch()"
                                @blur="$v.datos.cli_provincia.$touch()"
                                :label="this.$t('m.state')"
                                :disabled='prov_disable'
                                :items="provincias"
                                    item-text="txt"
                                    item-value="id"
                                filled
                            ></v-autocomplete>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-autocomplete
                                v-model.trim="$v.datos.cli_cod_postal.$model"
                                :error-messages="localidadErrors"
                                @input="$v.datos.cli_cod_postal.$touch()"
                                @blur="$v.datos.cli_cod_postal.$touch()"
                                :label="this.$t('m.city')"
                                :disabled='local_disable'
                                :items="localidades"
                                    item-text="txt"
                                    item-value="id"
                                filled
                            ></v-autocomplete>
                        </v-col>

                        <v-col cols="12">
                            <p>Promedio de Compra Aproximada Mensual ( {{tipo_clientes[radios] || ''}} )</p>
                            <v-radio-group v-model="radios" mandatory>
                                <v-radio label="Entre $ 2.500,00  Y  $ 19.999,99" value="5"></v-radio>
                                <v-radio label="Entre $ 20.000,00  Y  $ 79.999,99" value="4"></v-radio>
                                <v-radio label="Entre $ 80.000,00  Y  $ 249.999,99" value="3"></v-radio>
                                <v-radio label="Más de $ 250.000,00" value="2"></v-radio>
                            </v-radio-group>
                        </v-col>

                        <v-col cols="12">
                            <v-alert
                                v-model="snackbar"
                                prominent
                                outlined
                                text
                                :type="typeAlert"
                            >
                              {{ this.text}}
                            </v-alert>
                        </v-col>

                        <v-col cols="12">
                            <v-btn 
                                aria-label="Enviar"
                                x-large
                                dark
                                class="m-2"
                                color="green"
                                @click="Enviar()">

                                    {{$t('m.send')}}
                            </v-btn>  

                              <v-btn 
                                aria-label="Enviar"
                                x-large
                                dark
                                class="m-2"
                                color="red"
                                @click="Cancelar()">

                                    {{$t('m.cancel')}}
                            </v-btn>
                        </v-col>
                        
                    </v-row>
                </v-form>
            </v-container>
        </v-card>
    </v-col>
    
</template>

<script>
    import { required, maxLength, minLength, email, numeric, sameAs } from 'vuelidate/lib/validators'

    export default {
        name: "sys-register",
        data: () => ({
            valid: true,
            show1: false,
            show2: false,
            datos: {
                cli_cod: '11',
                cli_razon: '',
                cli_cuit: '',
                cli_direccion: '',
                cli_telefono: '',
                cli_whatsapp: '',
                cli_saldo: 0,
                cli_tipo: 5,
                cli_cod_postal: '',
                cli_pais: '1',
                cli_provincia: '',
                cli_estado: '0',
                cli_email: '',
                cli_user: '1',
                cli_pass: '',
                cli_passok: '',
                },
            radios: '',
            tipo_clientes: ['','','Distribuidor','Clientes Especial', 'Empresas','Consumidor Final'],
            localidades: [],
            provincias: [],
            prov_disable: true,
            local_disable: true,
            snackbar: false,
            text: 'aa',
            typeAlert: 'sucess',
        }),

        watch: {
            'datos.cli_provincia': function (newVal, oldVal) {
                this.local_disable = true
                axios.get(`/localidad/${this.datos.cli_provincia}`)
                    .then((res)=> {
                        this.localidades = res.data
                        this.local_disable = false
                    })
            },
            'radios' : function(newVal, oldVal) {
                this.datos.cli_tipo = this.radios
            }
        },

        created() {
            axios.get('/provincia')
                .then ((res)=> {
                    this.provincias = res.data
                    this.prov_disable = false
                })
        },

        computed: {
            cli_razonErrors() {
                const errors = []
                if (!this.$v.datos.cli_razon.$dirty) return errors
                !this.$v.datos.cli_razon.maxLength && errors.push(this.$t('m.max_length_error'))
                !this.$v.datos.cli_razon.required && errors.push(this.$t('m.required_error'))
                return errors
            },
           
            cli_emailErrors() {
                const errors = []
                if (!this.$v.datos.cli_email.$dirty) return errors
                !this.$v.datos.cli_email.maxLength && errors.push(this.$t('m.max_lenght_error'))
                !this.$v.datos.cli_email.email && errors.push(this.$t('m.email_error'))
                !this.$v.datos.cli_email.required && errors.push(this.$t('m.required_error'))
                return errors
            },
            dniErrors() {
                const errors = []
                if (!this.$v.datos.cli_cuit.$dirty) return errors
                !this.$v.datos.cli_cuit.maxLength && errors.push(this.$t('m.max_lenght_error'))
                !this.$v.datos.cli_cuit.required && errors.push(this.$t('m.required_error'))
                return errors
            },
            direccionErrors() {
                const errors = []
                if (!this.$v.datos.cli_direccion.$dirty) return errors
                !this.$v.datos.cli_direccion.maxLength && errors.push(this.$t('m.max_lenght_error'))
                !this.$v.datos.cli_direccion.required && errors.push(this.$t('m.address_required'))
                return errors
            },
            cli_telefonoErrors() {
                const errors = []
                if (!this.$v.datos.cli_telefono.$dirty) return errors
                !this.$v.datos.cli_telefono.maxLength && errors.push(this.$t('m.max_lenght_error'))
                !this.$v.datos.cli_telefono.numeric && errors.push(this.$t('m.message_numeric'))
                !this.$v.datos.cli_telefono.required && errors.push(this.$t('m.required_error'))
                return errors
            },
            whatsappErrors() {
                const errors = []
                if (!this.$v.datos.cli_whatsapp.$dirty) return errors
                !this.$v.datos.cli_whatsapp.maxLength && errors.push(this.$t('m.max_lenght_error'))
                !this.$v.datos.cli_whatsapp.numeric && errors.push(this.$t('m.message_numeric'))
                !this.$v.datos.cli_whatsapp.required && errors.push(this.$t('m.required_error'))
                return errors
            },
            provinciaErrors() {
                const errors = []
                if (!this.$v.datos.cli_provincia.$dirty) return errors
                !this.$v.datos.cli_provincia.maxLength && errors.push(this.$t('m.chose_state'))
                !this.$v.datos.cli_provincia.required && errors.push(this.$t('m.required_error'))
                return errors
            },
            localidadErrors() {
                const errors = []
                if (!this.$v.datos.cli_cod_postal.$dirty) return errors
                !this.$v.datos.cli_cod_postal.maxLength && errors.push(this.$t('m.choose_city'))
                return errors
            },
            passErrors() {
                const errors = []
                if (!this.$v.datos.cli_pass.$dirty) return errors
                !this.$v.datos.cli_pass.maxLength && errors.push(this.$t('m.max_lenght_error'))
                !this.$v.datos.cli_pass.minLength && errors.push(this.$t('m.password_min'))
                !this.$v.datos.cli_pass.required && errors.push(this.$t('m.required_error'))
                return errors
            },
            passwordErrors() {
                const errors = []
                if (!this.$v.datos.cli_passok.$dirty) return errors
                !this.$v.datos.cli_passok.sameAs && errors.push(this.$t('m.password_mismatch'))
                !this.$v.datos.cli_passok.required && errors.push(this.$t('m.required_error'))
                return errors
            },
            passwordSuccess() {
                const errors = []
                if (!this.$v.datos.cli_passok.$dirty) return errors
                this.$v.datos.cli_passok.sameAs && errors.push(this.$t('m.password_ok'))
                return errors
            }

        },

        methods: {
            Enviar(){
                this.text = this.$v.datos.$pending + ' | ' + this.$v.datos.$error;
                this.$v.datos.$touch();
                if (this.$v.datos.$pending || this.$v.datos.$error) return;
                this.text = this.text + ' | Envio de Formulario Cliente Nuevo';
                const params_ok = {email: this.datos.cli_email, password: this.datos.cli_pass}
                const params = {
                    cli_cod: this.datos.cli_cod,
                    cli_razon: this.datos.cli_razon,
                    cli_cuit: this.datos.cli_cuit,
                    cli_direccion: this.datos.cli_direccion,
                    cli_telefono: this.datos.cli_telefono,
                    cli_whatsapp: this.datos.cli_whatsapp,
                    cli_saldo: this.datos.cli_saldo,
                    cli_tipo: this.datos.cli_tipo,
                    cli_cod_postal: this.datos.cli_cod_postal,
                    cli_pais: this.datos.cli_pais,
                    cli_provincia: this.datos.cli_provincia,
                    cli_estado: this.datos.cli_estado,
                    email: this.datos.cli_email,
                    password: this.datos.cli_pass,                    
                }
                axios.post('registro', params)
                    .then ((res)=> {
                        if (res.data[0] == 0){
                            this.text= this.$t('m.reseller_id_error')
                            this.typeAlert = 'warning'
                            this.snackbar = true;
                            setTimeout(() => { this.snackbar = false }, 4500);
                        }else if (res.data[0] == 2){
                            this.text = this.$t('m.reseller_email_error')
                            this.typeAlert='warning'
                            this.snackbar = true;
                            setTimeout(() => { this.snackbar = false }, 4500);
                        }else {
                            this.text = this.$t('m.reseller_success')
                            this.typeAlert='success'
                            this.datos.cli_razon = ''
                            this.datos.cli_cuit = ''
                            this.datos.cli_direccion = ''
                            this.datos.cli_telefono = ''
                            this.datos.cli_whatsapp = ''
                            this.datos.cli_cod_postal = ''
                            this.datos.cli_provincia = ''
                            this.datos.cli_email = ''
                            this.datos.cli_passok = ''
                            this.datos.cli_pass = ''
                            this.$v.$reset()
                            this.snackbar = true;
                            setTimeout(() => { this.snackbar = false }, 4500);
                            axios.post('/login', params_ok)
                              .then ((res)=> {
                                    axios.post('/email/verification-notification')
                                    window.location.href = "/perfil";
                                })
                        }
                        
                    })
                    .catch(error =>{
                        console.log(error.response);
                        this.text = this.$t('m.reseller_error')
                        this.typeAlert='error'
                        this.snackbar = true;
                        setTimeout(() => { this.snackbar = false }, 4000);
                        this.$v.datos.$reset()
                    });
                   
            },
            Cancelar(){
                this.$v.$reset()
                this.datos.cli_razon = ''
                this.datos.cli_cuit = ''
                this.datos.cli_direccion = ''
                this.datos.cli_telefono = ''
                this.datos.cli_whatsapp = ''
                this.datos.cli_cod_postal = ''
                this.datos.cli_provincia = ''
                this.datos.email = ''
                this.datos.cli_passok = ''
                this.datos.cli_pass = ''
            },
        },

        validations: {
            datos: {
                cli_razon: {
                    required,
                    minLength: minLength(2),
                    maxLength: maxLength(50)
                },
                cli_cuit: {
                    required,
                    numeric,
                    maxLength: maxLength(15)
                },
                cli_email: {
                    email,
                    required,
                    minLength: minLength(8),
                    maxLength: maxLength(50)
                },
                cli_direccion: {
                    required,
                    maxLength: maxLength(100)
                },
                cli_pass: {
                    required,
                    minLength: minLength(8),
                    maxLength: maxLength(50)
                },
                cli_passok: {
                    required,
                    minLength: minLength(8),
                    sameAs: sameAs( 'cli_pass' )
                },
                cli_provincia: {
                    required,
                    maxLength: maxLength(100)
                },
                cli_cod_postal: {
                    maxLength: maxLength(100)
                },
                cli_telefono: {
                    required,
                    numeric,
                    maxLength: maxLength(50)
                },
                cli_whatsapp: {
                    required,
                    numeric,
                    maxLength: maxLength(50)
                },
            },

        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>