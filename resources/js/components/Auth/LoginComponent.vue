<template>

  <v-app id="inspire">
    
    <v-content>
      <v-row justify="center">
          <v-dialog v-model="resetpasswordModal" persistent max-width="600">
          <v-card>
              <div class="float-right"><v-btn icon  @click="resetpasswordModal = false"><v-icon small>mdi-close</v-icon></v-btn></div>
            <v-card-title class="headline">Escriba su dirección de correo electrónico.
            </v-card-title>

              <v-card-actions>
                  <v-spacer></v-spacer>
                          <v-container>
                                  <v-row>
                                      <v-col cols="12">
                                          <v-text-field
                                                  v-model.trim="$v.correoReset.$model"
                                                  label="Correo"
                                                  :error-messages="crerrors"
                                                  @blur="correoResetErrors()"
                                                  type="mail"
                                                  prepend-icon="mail"
                                                  :loading='loading'
                                              >
                                              </v-text-field>  
                                      </v-col>
                                  </v-row>
                          </v-container>
              </v-card-actions>
              <v-card-actions>
              <v-card-text>
                  <div class="">
                  <v-alert 
                      v-if="this.aReset"  
                      color="teal"
                      icon="mdi-clock-fast"
                      border="left"
                      transition="scale-transition"
                      dense
                      text>
                      {{ this.resetText }}
                  </v-alert>
                  </div>
                </v-card-text>

                  <v-spacer></v-spacer>
                              <v-btn color="red darken-1" text @click="resetpasswordModal = false">Cancelar</v-btn>
                              <v-btn color="green darken-1" text @click="resetPassword()">Enviar</v-btn>
              </v-card-actions>
          </v-card>
          </v-dialog>
      </v-row> 

      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center" >
          <v-col cols="12" sm="8" md="4">
            <v-card class="elevation-12" @keyup.enter="loginUsuario()">
              <v-toolbar :color='this.color_html' :class="this.color_html_b" flat>
                <v-toolbar-title><span class="title ml-3 mr-5"> {{this.name_html_strong}} <span class="font-weight-light"> {{this.name_html}} </span></span></v-toolbar-title>
                  <v-spacer />
              </v-toolbar>

              <v-card-text class="mt-4">
                <v-form>
                  <v-text-field
                      v-model.trim="$v.usuario.correo.$model"
                      label="Correo"
                      :error-messages="cerrors"
                      @blur="correoErrors()"
                      type="text"
                      class="m-2"
                      prepend-icon="person"
                  />

                  <v-text-field
                      v-model.trim="$v.usuario.password.$model"
                      label="Contraseña"
                      :error-messages="lpasswordErrors"
                      @input="$v.usuario.password.$touch()"
                      @blur="$v.usuario.password.$touch()"
                      type="password"
                      class="m-2"
                      prepend-icon="lock"
                  />
                </v-form>
              </v-card-text>

              <v-card-text>
                <div class="">
                  <v-alert type="error" v-if="this.error"  class="alertError" dense outlined transition="scale-transition">
                      {{ this.errorText }}
                  </v-alert>
                </div>
              </v-card-text>

              <v-card-actions>
                <v-spacer />
                <v-btn color="primary mr-4"
                      @click="loginUsuario()"
                      >Ingresar</v-btn>
              </v-card-actions>

              <div class="d-flex justify-space-between">
                <div class="text-left subtitle-2 font-weight-light font-italic ml-6">
                  <a link href="/">Volver a la tienda</a>
                </div>
                <div class="text-right subtitle-2 font-weight-light font-italic mr-6">
                  <a link @click="resetpasswordModal = true">Olvidó su contraseña?</a>
                </div>
              </div>

              <v-divider class="mx-4 grey lighten-2"></v-divider>
              <!--Desabilitado momentaneamente el registro de Usuarios desde la web-->
              <!-- <v-card-text>
                <div class="subtitle-1 font-weight-light">
                    <p>¿No tenés un usuario?&nbsp;
                        <span class="font-italic text-danger">
                          <a class="text-danger" href="/clientes">Creá tu cuenta
                          </a>
                        </span>
                    </p>
                </div>
              </v-card-text>  -->
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>

import { required, email } from 'vuelidate/lib/validators' 
     

export default {
          data (){
            return {
                    error: false,
                    resetpasswordModal: false,
                    resetText: '',
                    aReset: false,
                    spinnerReset: false,
                    correoReset: '',
                    loading: false,
                    usuario: {correo: '', password: ''},
                    errorText: 'El usuario o la clave es incorrecta',
                    cerrors: [],
                    crerrors: [],
                    idioma: '',
                    }
                  },
        computed: {
            lpasswordErrors () {
                const errors = []
               if (!this.$v.usuario.password.$dirty) return errors
                !this.$v.usuario.password.required && errors.push('Ingrese su clave.')
                return errors

            },
            
        },

        

        beforeCreate() {
        if ( !this.$session.exists() ) {
            this.$session.start()
            this.$session.set('idioma','es')
            this.$session.set('u-id', 0)
        }else {

            this.$idioma = this.$session.get('idioma'),
            this.$i18n.locale = this.$idioma
        }
    },

        methods: {
            correoResetErrors () {
                this.crerrors = [];
                if (!this.$v.correoReset.$dirty) return this.crerrors
                !this.$v.correoReset.required && this.crerrors.push('Ingrese su correo.')
                !this.$v.correoReset.email && this.crerrors.push('El usuario debe ser un correo electrónico.')
                return this.crerrors
            },
            correoErrors () {
                this.cerrors = [];
                if (!this.$v.usuario.correo.$dirty) return this.cerrors
                !this.$v.usuario.correo.required && this.cerrors.push('Ingrese su correo.')
                !this.$v.usuario.correo.email && this.cerrors.push('El usuario debe ser un correo electrónico.')
                return this.cerrors
                


            },

            loginUsuario(){
                this.$v.usuario.$touch();
                if (this.$v.usuario.$pending || this.$v.usuario.$error) return;
                const params = {email: this.usuario.correo, password: this.usuario.password}
                axios.post('/login', params)
                      .then ((res)=> {
                        window.location.href = "/perfil";
                        
                    })
                    .catch(error => {
                        this.errorText= 'El usuario o la contraseña es incorrecta';
                        //this.errorText = error;
                        this.error = true;
                        setTimeout(() => this.error=false, 5000);

                    });
                },
            resetPassword(){
                this.aReset = false;
                this.$v.correoReset.$touch();
                if (this.$v.correoReset.$pending || this.$v.correoReset.$error) return;
                const params = {email: this.correoReset}
                this.loading =  true

                axios.post('/password/email', params)
                    .then ((res)=> {
                        this.loading= false,
                        this.resetText= 'Se envió un correo electrónico con instrucciones. No olvide revisar su papelera de correo no deseado (SPAM)';
                        this.aReset = true;
                        setTimeout(()=>this.aReset = false, 3000)
                        setTimeout(()=>this.resetpasswordModal = false, 3500)

                    })
                    .catch(error => {
                        this.correoReset = '';
                        this.loading= false,
                        this.resetText= 'No se detectó su correo';
                        this.aReset = true;

                    });
                },
        },
        validations: {
                usuario: {
                    correo: {
                        required,
                        email,
                    },
                    password: {
                        required,
                    }
                },
                correoReset: {
                    required,
                    email
                }
            },

        props:  ['name_html', 'name_html_strong', 'color_html', 'color_html_b',] ,
              
  }
</script>
       
