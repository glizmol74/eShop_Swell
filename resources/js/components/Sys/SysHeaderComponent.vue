<template>
    <v-app id="inspire">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="/" class="d-flex align-center">
                <v-img
                    src="/storage/images/logoEmpresa.png" 
                    class="logo"
                    contain
                    alt="logo_empresa"
                />
            </a>

            <button class="navbar-toggler" type="utton" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto nav-ecom">
                    <li class="nav-item subtitle-1" id="nosotros">
                        <a class="nav-link text-uppercase" href="/nosotros"> {{$t('m.about')}}</a>
                    </li>
                    <div v-for="(mcat,index) in hmenus" :key="index" >
                        <div v-if="hmenus[index].categories.children  != ''"> 
                            <div>
                                <li class="nav-item dropdown subtitle-1">
                                    <v-menu offset-y :close-on-content-click="false" elevation="0">
                                        <template v-slot:activator="{ on, attrs }">
                                            <a v-if="$i18n.locale === 'es'" v-bind="attrs"  v-on="on" class="nav-link dropdown-toggle text-uppercase" href="#" :id="`${mcat.categories.es_name}`">
                                                    {{mcat.categories.es_name}}
                                            </a>
                                            <a v-else v-bind="attrs"  v-on="on" class="nav-link dropdown-toggle text-uppercase" href="#" :id="`${mcat.categories.es_name}`">
                                                    {{mcat.categories.en_name}}
                                            </a>
                                        </template>
                                        <v-card width="300px" color=#f8f9fa elevation="0" style="border: 1px solid #cdcdcd;">
                                            <div v-for="(cat,id2) in mcat.categories.children" :key="id2">
                                                <div v-if="cat.children !='' ">
                                                    <v-expansion-panels accordion flat>
                                                        <v-expansion-panel style="backgroung:#f8f9fa">
                                                            <v-expansion-panel-header v-if="$i18n.locale === 'es'" class="subtitle-2">{{cat.es_name}}</v-expansion-panel-header>
                                                            <v-expansion-panel-header v-else class="subtitle-2">{{cat.en_name}}</v-expansion-panel-header>
                                                            <v-expansion-panel-content>
                                                                <div v-for="(ca, id3) in cat.children" :key="id3">
                                                                    <div v-if="ca.children !='' ">
                                                                        <div class="mt-3 subtitle-2">
                                                                            <div v-if="$i18n.locale === 'es'" class="drop-ecom-2" style="width:100%"><strong> {{ca.es_name}}</strong></div>
                                                                            <div v-else class="drop-ecom-2" style="width:100%"><strong> {{ca.en_name}}</strong></div>
                                                                            <div v-for="(c,id4) in ca.children" :key="id4">
                                                                                <div class="drop-ecom subtitle-2">
                                                                                    <a v-if="$i18n.locale === 'es'" class="nav-link" :href="`/category/${c.es_name}`">{{c.es_name}}</a>
                                                                                    <a v-else class="nav-link" :href="`/category/${c.es_name}`">{{c.en_name}}</a>
                                                                                </div> 
                                                                            </div> 
                                                                        </div>
                                                                    </div>
                                                                    <div v-else>
                                                                        <div class="navbar-nav drop-ecom-2 subtitle-2 mt-3">
                                                                                <a v-if="$i18n.locale === 'es'" class="nav-link" :href="`/category/${ca.es_name}`">{{ca.es_name}}</a>
                                                                                <a v-else class="nav-link" :href="`/category/${ca.es_name}`">{{ca.en_name}}</a>
                                                                            </div>
                                                                    </div>
                                                                </div> 
                                                            </v-expansion-panel-content>
                                                        </v-expansion-panel>
                                                    </v-expansion-panels>
                                                </div>
                                                <div v-else>
                                                        <a v-if="$i18n.locale === 'es'" class="nav-link" :href="`/category/${cat.es_name}`">{{cat.es_name}}</a>
                                                        <a v-else class="nav-link" :href="`/category/${cat.es_name}`">{{cat.en_name}}</a>
                                                </div>
                                            </div>
                                        </v-card>
                                    </v-menu> 
                                </li>  
                            </div>
                        </div>
                        <div v-else>
                            <li class="nav-item subtitle-1" :id="`${index}`"> 
                                <a v-if="$i18n.locale === 'es'" class="nav-link text-uppercase" :href="`/category/${index}`">{{mcat.categories.es_name}}</a>
                                <a v-else class="nav-link text-uppercase" :href="`/category/${index}`">{{mcat.categories.en_name}}</a>
                            </li> 
                        </div>
                    </div>
                  <!--  <li class="nav-item subtitle-1" id="mayoristas">
                        <a class="nav-link text-uppercase" href="/mayoristas">{{$t('m.reseller')}}</a>
                    </li> -->
                    <li class="nav-item subtitle-1" id="contacto">
                        <a class="nav-link text-uppercase" href="/contacto">{{$t('m.contact')}}  </a>
                    </li>

                </ul>

                <v-spacer></v-spacer>
                

                <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <v-btn icon color="" id="cart-btn" large style="cursor:pointer" @click="drawer = !drawer">
                        <v-icon>mdi-cart</v-icon>
                    </v-btn><br>
                </li>
                <li class="nav-item">
                    <v-btn icon :color="`${xcolor}`" large style="cursor:pointer; text-decoration:none" href="/login">
                    <v-icon>mdi-account</v-icon>
                    </v-btn>
                </li>
                <li class="nav-item">
                    <v-avatar tile size="32" class="mt-1 mr-3 flag" @click="selectLang('en')">
                        <img
                            src="/storage/images/usa.svg"
                            alt="usa flag"
                        >
                    </v-avatar>
                </li>
                <li class="nav-item">
                    <v-avatar tile size="32" class="mt-1 flag" @click="selectLang('es')">
                        <img
                            src="/storage/images/arg.svg"
                            alt="argentine flag"
                        >
                    </v-avatar>
                </li>

                
                </ul>
               
            </div>
            
        </nav>

        <sys-cart :verDrawer="this.drawer" @closeDrawer="changeDrawer" />
        <v-content class="v-content-padding white">
            <slot></slot>
        </v-content>
        
    </v-app>
</template>


<script>


export default {
    props: {
      source: String,
      xcolor: String,
      
    },
    data() {
        return {
            hmenus: [],
            drawer: false,
            items: [],
            buscador: [],
            items_buscador: false,
            ver_buscador: false,
            fav: true,
            message: false,
            hints: true,
            idioma: '',

            ltemp: '',
        }
    },

    
    created() {
        
        this.$idioma = this.$session.get('idioma'),
        this.$i18n.locale = this.$session.get('idioma'),
        axios.get('/mcategorias/all')
            .then((res) => {
                this.hmenus = res.data
            })
       
    },
    mounted() {
        // this.ltemp = this.$session.getAll() 
        
         if ( this.xcolor == 'red') {
            this.$session.remove('valor-e')
            this.$session.remove('u-tipo')
            this.$session.remove('u-st')
            this.$session.set('u-id',0)
            localStorage.removeItem('formdata')
        }
       // this.ltemp = this.$session.getAll() 
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
        changeDrawer(id) {
            this.drawer = id;
        },

        selectLang(lang) {
            this.$session.set('idioma',lang)
            localStorage.setItem('ecomerce-locale', lang)
            this.$i18n.locale =  this.$session.get('idioma')
           //this.$i18n.locale = lang
           this.$idioma = this.$session.get('idioma')
        }
    },

    props: ['xcolor'],
}
</script>

<style scoped>
    .drop-ecom{
    padding: 0px 20px;
    margin: 0px!important;

    }
    .drop-ecom-2{
    padding: 0px 10px;
    margin: 0px!important;

    }
    .drop-ecom>a{
    padding-left: 0px!important;
    margin-left: 0px!important;

    }
    .v-expansion-panel-header{
    padding: 0px 20px;
    margin: 0px 0px 0px 0px!important;

    }
    .dropdown-submenu {
    position: relative;
    }

    .dropdown-submenu>a:after {
    content: "\f0da";
    float: right;
    border: none;
    font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: 0px;
    margin-left: 0px;
    }
    .logo {
    height:120px;
    width:120px;
    }

    .nav-link{
    color:black!important
    
    }
    .nav-ecom{
    width:100%;
    display: flex;
    justify-content: space-around;
    }

    .buscador{
    position:absolute;
    width: 300px;
    cursor:pointer;
    bottom: 0;
    right: 11%;
    }
    .tabla-totales{
    position: absolute; 
    right:20px;
    bottom:0px;
    font-size: 0.625rem;
    cursor:pointer;
    }
    v-content-padding{
    margin: 0 0 106px 16px;
    } 

    .flag{
    cursor:pointer;

    }
    @media only screen and (max-width: 960px) {
        .logo {
        height:60px;
        width:60px;
        }

        .tabla-totales{
        position: absolute; 
        right:120px;
        bottom:10px;
        font-size: 0.625rem;
        }
        .buscador{
        position:initial;
        width: 100%;
        cursor:pointer;
        bottom: 0;
        right: 11%;
        }
    }
</style>