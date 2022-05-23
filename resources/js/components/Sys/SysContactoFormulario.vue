<template>
    <v-col cols="12" md="6" offset-md="4" class="">
        <v-card width="70%" elevation="0">
            <v-container>
                <v-form ref="form" v-model="valid" lazy-validation>
                    <v-row>
                        <v-col cols="12">
                            <v-select 
                                v-if="this.$i18n.locale ==='es'"
                                v-model.trim="$v.datos.preguntas.$model"
                                :error-messages="preguntaErrors"
                                @input="$v.datos.preguntas.$touch()"
                                @blur="$v.datos.preguntas.$touch()"
                                dense
                                :label="$t('m.ForWhom')"
                                class="mb-0 pb-0 caption"
                                hide-details
                                :items="destinatario_es"
                                filled
                            ></v-select>
                            <v-select 
                                v-else
                                v-model.trim="$v.datos.preguntas.$model"
                                :error-messages="preguntaErrors"
                                @input="$v.datos.preguntas.$touch()"
                                @blur="$v.datos.preguntas.$touch()"
                                dense
                                :label="$t('m.ForWhom')"
                                class="mb-0 pb-0 caption"
                                hide-details
                                :items="destinatario_en"
                                filled
                            ></v-select>
                        </v-col>

                        <v-col cols="12">
                            <v-text-field
                                v-model="$v.datos.fname.$model"
                                :error-messages="nameErrors"
                                @input="$v.datos.fname.$touch()"
                                @blur="$v.datos.fname.$touch()"
                                :counter="50"
                                :label="$t('m.name')"
                                
                                filled
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12">
                            <v-text-field
                                v-model="$v.datos.email.$model"
                                :error-messages="emailErrors"
                                @input="$v.datos.email.$touch()"
                                @blur="$v.datos.email.$touch()"
                                :counter="50"
                                :label="$t('m.email')"
                                
                                filled
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12">
                            <v-text-field
                                v-model="$v.datos.telefono.$model"
                                :error-messages="telefonoErrors"
                                @input="$v.datos.telefono.$touch()"
                                @blur="$v.datos.telefono.$touch()"
                                :counter="50"
                                :label="$t('m.phone')"
                                
                                filled
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="12">
                            <v-textarea
                                v-model="$v.datos.comentarios.$model"
                                :error-messages="comentariosErrors"
                                @input="$v.datos.comentarios.$touch()"
                                @blur="$v.datos.comentarios.$touch()"
                                :counter="2500"
                                :label="$t('m.message')"
                                
                                outlined
                                filled
                            ></v-textarea>
                        </v-col>

                        <v-col cols="12" >
                            <v-btn 
                                aria-label="send" 
                                x-large 
                                dark 
                                block 
                                color="black" 
                                @click="enviarForm()"
                                >{{$t('m.send')}}</v-btn
                                >
                        </v-col>

                        <v-snackbar
                            v-model="snackbar"
                            top
                            right
                            :timeout="5000"
                            :color="xcolor"
                        >
                            {{ this.text }}
                            <v-btn aria-label="Close" :color="xcolor" small dark elevation="0" @click="snackbar = false">
                                <v-icon small>mdi-close</v-icon>
                            </v-btn>
                        </v-snackbar>
                    </v-row>
                </v-form>
            </v-container>
        </v-card>
    </v-col>
</template>

<script>
import { required, maxLength, email, numeric} from 'vuelidate/lib/validators'
export default {
    data: () => ({
      valid: true,
      datos: {
          preguntas: '',
          fname: '',
          email: '',
          telefono: '',
          comentarios: '',
      },
      destinatario_es: ['Atención al Cliente', 'Canal Mayorista'],
      destinatario_en: ['Customer Support', 'Reseller Support'],

      xcolor: 'green',
      snackbar: false,
      text: '',
      correoc: 'xx',
    }),

    created() {
        this.correoc = this.$session.get('correo_c');
    },

    computed: {
        preguntaErrors () {
            const errors = []
            if (!this.$v.datos.preguntas.$dirty) return errors
            !this.$v.datos.preguntas.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.datos.preguntas.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        nameErrors () {
            const errors = []
            if (!this.$v.datos.fname.$dirty) return errors
            !this.$v.datos.fname.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.datos.fname.required && errors.push(this.$t('m.required_error'))
            return errors
        },

        emailErrors () {
            const errors = []
            if (!this.$v.datos.email.$dirty) return errors
            !this.$v.datos.email.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.datos.email.required && errors.push(this.$t('m.required_error'))
            !this.$v.datos.email.email && errors.push(this.$t('m.email_error'))
            return errors
        },

        telefonoErrors () {
            const errors = []
            if (!this.$v.datos.telefono.$dirty) return errors
            !this.$v.datos.telefono.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.datos.telefono.required && errors.push(this.$t('m.required_error'))
            !this.$v.datos.telefono.numeric && errors.push(this.$t('m.message_numeric'))
            return errors
        },

        comentariosErrors () {
            const errors = []
            if (!this.$v.datos.comentarios.$dirty) return errors
            !this.$v.datos.comentarios.maxLength && errors.push(this.$t('m.max_lenght_error'))
            !this.$v.datos.comentarios.required && errors.push(this.$t('m.required_error'))
            return errors
        }
    },

    methods: {
        enviarForm() {
            this.text = this.$v.datos.$pending + ' | ' + this.$v.datos.$error;
            this.$v.datos.$touch();
            if ( this.$v.datos.$pending || this.$v.datos.$error ) return;
            const params = {
                            pregunta: this.datos.preguntas,
                            name: this.datos.fname,
                            email: this.datos.email,
                            telefono: this.datos.telefono,
                            comentarios: this.datos.comentarios,
                            destinatario: this.correoc,
                            }
            axios.post('/formulariocontacto', params)
                .then ( (res)=> {
                    this.text = this.$t('m.form_success')
                    this.xcolor = 'success'
                    this.snackbar = true
                    this.datos = {preguntas: '', name:'', email:'', telefono:'',comentarios:''}
                })
                .catch( error => {
                    console.log(error.response)
                    this.text = this.$t('m.form_error')
                    this.xcolor = 'bg-danger'
                    this.snackbar = true
                })
            this.$v.$reset()
        },
    },
    
    
    validations: {
        datos: {
            preguntas: {
                required,
                maxLength: maxLength(50)
            },

            fname: {
                required,
                maxLength: maxLength(50)
            },

            email: {
                required,
                maxLength: maxLength(50),
                email
            },

            telefono: {
                required,
                maxLength: maxLength(50),
                numeric
            },

            comentarios: {
                required,
                maxLength: maxLength(2500)
            }
        }
    }
}
</script>