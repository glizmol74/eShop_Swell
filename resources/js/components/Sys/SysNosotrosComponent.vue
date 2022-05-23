<template >
    <div>
        <div>
            <v-container>
                <h2 class="mt-10"> {{ $t('m.about_as') }} </h2>
                <v-row>
                    <v-col cols="12" md="6" class="d-flex align-center">
                        <video width="100%" height="300px" autoplay loop muted>
                            <source src="storage/video/video.mp4" type="video/mp4">
                             Your browser does not support the video tag.
                        </video>
                    </v-col>
                    <v-col>
                        <p><strong>Grupo Jac</strong> {{ $t('m.about_l1') }} </p>
                        <p> {{ $t('m.about_l2') }} </p>
                        <p> {{ $t('m.about_l3') }} </p>
                        <p> {{ $t('m.about_l4') }} </p>
                        <p> {{ $t('m.about_l5') }} </p>
                        <p> {{ $t('m.about_l6') }} </p>
                    </v-col>
                </v-row>
            </v-container>
        </div>
    </div>
</template>

<script>


export default {
    mounted() {
        this.$store.state.menu_select = 'nosotros'
        this.$store.commit('changeMenu')
    },
}
</script>
