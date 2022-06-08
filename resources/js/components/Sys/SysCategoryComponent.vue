<template>
    <div> 
        
        <sys-banner-superior :category="this.categoria_ppal" />

        <v-breadcrumbs v-if="this.$i18n.locale==='en' " class="" style="padding-left:50px" :items="bread_en" large>
            <template v-slot:divider>
                <v-icon>mdi-forward</v-icon>
            </template>
        </v-breadcrumbs>
        <v-breadcrumbs v-else class="" style="padding-left:50px" :items="bread" large>
            <template v-slot:divider>
                <v-icon>mdi-forward</v-icon>
            </template>
        </v-breadcrumbs>

        <v-row>
            <v-col md="12" sm="12">
                <v-container>
                    <v-row>
                        <template v-for="i in filtro_items">
                            <sys-items :key="i.id" :item="i" :tuser="pp" :st="st" />
                        </template>
                    </v-row>
                </v-container>
            </v-col>
        </v-row>
    </div>
</template>

<script>

export default {
    
    props: {
        source: String
    },
    data: () => ({
      filtro_items: [],
      catselect: [],
      bread: [{id:0, text:'Swell', disabled: false, href: '/'}],
      bread_en: [{id:0, text:'Swell', disabled: false, href: '/'}],
      items: [],
      categoria_ppal: '', 
      text: '',
      t_user: '',
      pp: 'a',
      st: 0,
      nivel: 0,
    }), 

    beforeCreate() {
            this.$i18n.locale = this.$session.get('idioma')
            this.pp =  this.$session.get('idioma')
    },

    created() {
        
        this.pp = this.$session.get('u-tipo');
        this.st = this.$session.get('u-st');
        if ( !this.pp ) this.pp = 0
        let category = window.location.pathname
        category= category.split('/')
        this.nivel = category.length
        axios.get(`/productos?category=${category[this.nivel-1]}&tipo=${this.pp}`)
        //axios.get(`/productos`)
            .then( (res) => {
                this.filtro_items = res.data.articulos
            })

        axios.get(`/categorias/${category[this.nivel-1]}`)
            .then ( (res) => {
                this.items = res.data.categories
                
                if ( res.data.categories.parents[0] == null){
                    this.categoria_ppal = res.data.categories.es_name
                    let elp = [];
                    let elpn = [];
                    
                    elp['text'] = res.data.categories.es_name.charAt(0).toUpperCase()+ res.data.categories.es_name.slice(1)
                    elp['href'] = `/category/${res.data.categories.es_name}`
                    this.bread.push(elp)
                    elpn['text'] = res.data.categories.en_name.charAt(0).toUpperCase()+ res.data.categorie.en_name.slice(1)
                    elpn['href'] = `/category/${res.data.categories.en_name}`
                    this.bread_en.push(elpn)
                }else {
                    this.categoria_ppal = res.data.categories.parents[0].es_name
                    res.data.categories.parents.forEach( (element, i) => {
                        let ele = [];
                        let elen = [];
                        ele['text'] = element.es_name.charAt(0).toUpperCase() + element.es_name.slice(1);
                        ele['href'] = `/category/${element.es_name}`;
                        
                        this.bread.push(ele);
                        elen['text'] = element.en_name.charAt(0).toUpperCase() + element.en_name.slice(1);
                        elen['href'] = `/category/${element.en_name}`;
                        this.bread_en.push(elen);
                    });
                    let el = [];
                    let eln = [];
                    el['text'] = res.data.categories.es_name.charAt(0).toUpperCase()+ res.data.categories.es_name.slice(1)
                    el['href'] = `/category/${res.data.categories.es_name}`
                    el['disabled'] = true;
                    this.bread.push(el)
                    eln['text'] = res.data.categories.en_name.charAt(0).toUpperCase()+ res.data.categories.en_name.slice(1)
                    eln['href'] = `/category/${res.data.categories.en_name}`
                    eln['disabled'] = true;
                    this.bread_en.push(eln)

                }
                

            this.$store.state.menu_select = this.categoria_ppal
            this.$store.commit('changeMenu')
            })
        
    }
}
</script>