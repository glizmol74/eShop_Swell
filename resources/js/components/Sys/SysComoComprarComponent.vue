<template>
    <div>
        <v-container>
            <h2 class="mt-10">{{$t('m.howbuy')}}</h2>
            
            <v-carousel height="700">
                <v-carousel-item v-for="(item,i) in image" :key="i" :src="item.src" contain></v-carousel-item>
            </v-carousel>
            
        </v-container>
    </div>
</template>

<script>

export default {
    data() {
        return {
            image: []
        }
        
    },

    created() {
        axios.get('/imgc/4')
            .then( (res) => {
                this.image = res.data
            })
    },

    mounted() {
        document.body.scrollTop = 0  //for Safari
        document.documentElement.scrollTop = 0 //For Chrome, Firefox, IE and opera
    }
}
</script>