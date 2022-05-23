<template>
    <div>
        
        <div v-if="banner != ''"   class="banner-category" :style="{ backgroundColor: banner.color}">
        
            <v-img v-if="banner.image != null" :src="banner.image" cover position="absolute">
                <div :style="{ color: banner.colortext,}"
                        class="d-flex title-uppercase font-weigt-medium v-card--reveal black--text text-center"
                        style="height: 100%;"
                 > <!-- {{ banner.text }} --> </div>
            </v-img>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        category: {type: String, required: false}
    },

    data: () => ({
      banner: [],
      windowWidth: '',
      categoria: ''
    }),

    mounted() {
        if (this.category != "")
            axios.get(`/banner/${this.category}`)
                .then( (res) => {
                    this.banner = res.data
                })
    },

    watch: {
        category(){
            axios.get(`/banner/${this.category}`)
                .then( (res) => {
                    this.banner = res.data
                })
        }
    },

    created() {
        this.windowWidth = window.innerWidth;
    }
}
</script>


<style scoped>
    .banner-category {
        height: 100%;
    }

    .v-card--leveal {
        align-items: center;
        bottom: 0;
        justify-content: center;
        position: absolute;
        width: 100;
    }

@media only screen and (max-width: 960px) {
    .banner-category {
        height: 100%;
    }
}
</style>