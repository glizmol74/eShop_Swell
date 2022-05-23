<template>
    <div>
        <v-container>
            <h2 class="mt-10">Co-branding</h2>
            <v-row>
                <v-col cols="12" class="text-justify">
                    <p> {{$t('m.cobranding_l1')}}</p>
                    <p> {{$t('m.cobranding_l2')}}</p>
                    <p> {{$t('m.cobranding_l3')}}</p>
                    <p> {{$t('m.cobranding_l4')}}</p>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="12" class="text-justify elevation-0">
                    <div>
                        <v-carousel cycle>
                            <v-carousel-item v-for="(item,i) in image" :key="i" :src="item.src"></v-carousel-item>
                        </v-carousel>
                    </div>
                </v-col>
            </v-row>
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
        axios.get('/imgc/3')
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