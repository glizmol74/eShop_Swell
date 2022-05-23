<template >
    <div>
        <v-carousel
            cycle
            hide-delimiter-background
            show-arrows-on-hover
            height="auto"
        >
            <v-carousel-item v-for="s in sli_h" :key="s.id" :src="s.image" :style="{ background: s.color}" :cover="true">
                <v-row class="slider-txt fill-height" :align="s.alig" :justify="s.just" height="100%" color="s.color">
                    <div v-if="idioma =='es'" :class="s.class" :style="{
                        textAlign: s.textalign,
                        color: s.colortext,
                        padding: s.pad,
                        margin: s.mar,
                        backgroundColor: s.background_text,     
                        }" style="border-radius:2px;"
                    >
                    
                        <h3> {{ s.es_text }}</h3>
                    </div>
                    <div v-else :class="s.class" :style="{
                        textAlign: s.textalign,
                        color: s.colortext,
                        padding: s.pad,
                        margin: s.mar,
                        backgroundColor: s.background_text,     
                        }" style="border-radius:2px;"
                    >
                    
                        <h3>{{ s.en_text }}</h3>
                    </div>

                </v-row>
            </v-carousel-item>
        </v-carousel>
        

       
        <sysgridhome> </sysgridhome>>

        <v-card flat class="d-flex justify-start align-center py-4">
            <v-card-title id="articulos" class="text-left text-uppercase font-weight-black subtitle-1 mt-4 mx-4">
                {{ $t('m.most_wanted') }}
            </v-card-title>
        </v-card>
        <v-row v-if="this.full_items!=''" class="d-flex justify-space-around">
            <template v-for="i in this.full_items">
                 <sys-items-destacados :item="i" @add="addForm" :key="i.id" /> 
            </template>
        </v-row>
    </div>
</template>

<script>
export default {
    name: '',
    props: {
        source: String
    },

    data () {
        return {
            itemInfo: false,
            tituloCategoria: 'Listado de Articulos',
            color: 'green',
            snackbar: 'false',
            verart: {id: '', nombre: '', descripcion: '', imagen: ''},
            full_items: [],
            sliders: [],
            sli_h: [],
            sli_m: [],
            windowWidth: '',
            
        }
    },

    created() {
        axios.get('product/destacados')
            .then( (res) => {
                this.full_items = res.data.articulos
            })
        axios.get('sliders')
            .then (res => {
                this.sliders = res.data ;
                this.sli_h = res.data.sliders;
            })
        this.windowWidth = window.innerWidth;
    },

    
    computed: {
        idioma: {
            get: function() {
            return this.$i18n.locale
            }
        }
    },

    methods: {
        setEstado(id) {
            this.itemInfo = id
        },

        addForm(id) {
            let form = []
            let items = []

            if ( localStorage.form === '') {
                localStorage.form = id
            }else {
                form.push(localStorage.form)
                form = form[0].split(',')
                items = form.find((element) => element == id)
                if ( !items ) {
                    form.push(id)
                    localStorage.form = form
                }
                this.snackbar = true
            }
        },
    }
}
</script>

<style scoped>
    .contacto {
        position: absolute;
        right: 5%;
        top: 35px;
        z-index: 1000;
    }

    .carrousel-home {
        height: 660px;
    }

    .v-sheet {
        border-radius: 0px !important;
    }
    .slide-txt {
        z-index: 1000;
    }

    @media only screen and (max-width: 960px) {

    }
</style>