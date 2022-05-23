<template >
    <v-row class="masonry-grid">
        <v-col v-for="(c,i) in grid" :key="i" sm="12" :md="c.col" cols="12" class="masonry-column">
            <a v-for="(g,i2) in c.vert" :key="i2"  style="text-decoration:nono" :href="g.cat">
                <v-hover v-slot:default="{ hover }">
                    <v-img :src="g.image" aspect-ratio="1" :class="g.class" :style="g.marg">
                        <v-expand-transition>
                            <div v-if="hover" :style="{color: g.colortext, backgroundColor: g.color}"
                                    class="d-flex scale-transition title text-uppercase font-weight-medium v-card--reveal text-center"
                                    style="height:100%;"
                            >
                                <div v-if="$i18n.locale==='es'">{{ g.es_text }}</div>
                                <div v-else>{{ g.en_text }}</div>
                            </div>
                        </v-expand-transition>
                    </v-img>
                </v-hover>
            </a>
        </v-col>
    </v-row>
</template>

<script>
export default {
    name: 'SysGridCategorias',
    data: () => ({
      windowWidth: '',
      grid: [{
          vert: {
              image: '',
              background_text: '',
              en_text: '',
              es_text: '',
              class: null,
              colortext: '',
              color: '',
              cat: null,
              pos: '',
              src: '',
              marg: null,
              col: '',
          }
      }]  
    }),

    created() {
        this.windowWidth = window.innerWidth
        axios.get('/grid/2')
            .then ( res => {
                this.grid = res.data;
            })
    },
}
</script>

<style scoped>
    .masonry-column {
        padding: 20px 5px 0px 5px;
    }

    .masonry-column-grid > div .thumbnail {
        margin: 10px 10px;
    }

    .category_v {
        height: 695px;
    }

    .category_h {
        height: 342.5px;
    }

    .category_f {
        height: 360px;
    }

    .v-card--reveal {
        align-items: center;
        bottom: 0;
        justify-content: center;
        position: absolute;
        width: 100%;
    }

    @media only screen and (max-width:960px) {
        .category_v {
            height: 32vh;
        }
        .category_h {
            height: 32vh;
        }
        .category_f {
            height: 32vh;
            width: 'auto';
        }
    }
</style>