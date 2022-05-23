<template>
  <v-app id="keep">
    <v-app-bar
      app
      clipped-left
      :color='this.color_html'
      :class="this.color_html_b"
    >

      <!-- <v-img src='storage/images/logoEmpresa.png' width="50px"></v-img>
      <v-img :aspect-ratio="16/9" src="storage/images/logoEmpresa.png"> -->
    <v-avatar tile size="50" class="pointer mr-5 mx-3" @click="gototienda()">
                <v-img
                  src="/storage/images/logoEmpresa.png"
                  size= "20"
                  alt="Avatar"
                >
                </v-img>
    </v-avatar>

      <span class="title ml-3 mr-5">{{this.name_html_strong}} <span class="font-weight-light"> {{this.name_html}} </span></span>
      <v-app-bar-nav-icon v-if="st==1" @click="drawer = !drawer" />
      <!-- <v-text-field
        solo-inverted
        flat
        hide-details
        label="Buscar"
        prepend-inner-icon="mdi-magnify"
      /> -->
     
      <v-spacer />
    <v-avatar color="teal" size="40" @click="perfil()" style="cursor:pointer">
      <span class="white--text text-uppercase">{{ this.avt}} </span>
    </v-avatar>
        <v-btn 
            icon
            :class="this.color_html_b"
            @click="logout()"
            >
        <v-icon>mdi-export</v-icon>
      </v-btn>

    </v-app-bar>

    <v-navigation-drawer
      v-if="st==1"
      v-model="drawer"
      app
      clipped
      color="blue-grey darken-4 lighten-4"
    >
      <v-list
        dense
        class="blue-grey darken-4 lighten-4"
      >
        <template v-for="(item) in items.cabecera">
          <v-row
            align="center" :key="item.id">
           <v-list-item>
            <v-list-item-content>
              <v-list-item-title
                class= 'grey--text text-uppercase pl-4'
              >
                {{ item.men_nombre }}
         
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          </v-row>
          <template v-for="(value) in items.contenido">
            <v-list-item
              :key="value.id"
              v-if="value.men_level === item.id"
              link
              :href="'/'+value.men_link"
            >
            <v-list-item-action>
              <v-icon
                small
                class="text-white"              
              >{{ value.men_icono }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title
                class="text-white"
              >
                {{ value.men_nombre }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>

        <v-divider
          class="mx-4 grey" :key="'d'+item.id"
         ></v-divider>

        </template>
      </v-list>
    </v-navigation-drawer>

    <v-content class="v-content-padding">
      <v-container fluid>
       
        <slot></slot>
      </v-container>

    </v-content>

  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
      items: [],
      avt: '',
      st: 0,
      xx: '2',
      txtData: '',
      formData: [],
    }),
    created (){
        
         axios.get('/perfil/menues')
             .then (res=> {
                this.items= res.data;
                if (res.data.usuario.cli_estado == 0 || res.data.usuario.email_ok == null)
                  this.st = 0
                else
                  this.st = 1
                this.$session.set('valor-e',res.data.usuario.email);
                this.$session.set('u-tipo',res.data.usuario.cli_tipo);
                //this.$session.set('u-st',res.data.usuario.cli_estado);
                this.$session.set('u-st',this.st);
                this.$session.set('u-id',res.data.usuario.id);
                 if (this.st != 1 ) {
                    // window.location.href = "/perfil/data";
                 }else{
                   // window.location.href = "/perfil";
                 }
                //this.avt = res.data.usuario.fr_name.charAt(0)+res.data.usuario.ls_name.charAt(0)
                this.avt = res.data.usuario.name.charAt(0);
                this.xx = this.$session.getAll();
                this.txtData = 'dataform_'+res.data.usurio.id

             })
         },
         
    beforeCreate() {
        if ( !this.$session.exists() ) {
            this.$session.start()
            this.$session.set('idioma','es')
        }else {

            this.$i18n.locale = this.$session.get('idioma')
        }
    },

    mounted() {
      console.log('Montado Menu Top A')
    },


    methods: {
            logout() {
                axios.post('/logout').then(response => {
                    this.$session.remove('valor-e');
                    this.$session.remove('u-tipo');
                    this.$session.remove('u-st');
                    this.$session.set('u-id',0);
                    this.$router.push("/login");
                    localStorage.removeItem('formdata')
                }).catch(error => {
                    location.reload();
                });
            },
            perfil() {
                window.location.href = "/perfil";
            },
            gototienda() {
                window.location.href = "/";
            }
 }, 
         props:  ['name_html', 'name_html_strong', 'color_html', 'color_html_b',] ,


  }
</script>

<style>
#keep .v-navigation-drawer__border {
  display: none
}
.v-content{
  background-color: rgb(245, 245, 245);
}

.pointer{
  cursor:pointer
}
</style>
