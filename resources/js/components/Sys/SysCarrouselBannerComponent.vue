<template >
    <div>
        <v-carrousel-item v-for="s in sliders" :key="s.id" :src="s.image" :style="{ background: s.color}" :cover="true">
            <v-row class="slider-txt fill-height" :align="s.alig" :justify="s.just" height="100%" color="s.color">
                <div :class="s.class" :style="{
                    textAlign: s.textalign,
                    color: s.colortext,
                    padding: s.pad,
                    margin: s.mar,
                    backgroundColor: s.background_text,     
                    }" style="border-radius:2px;"
                >
                    <div v-if="this.$i18n.locale==='es'" v-html="s.es_text"></div>
                    <div v-esle v-html="s.en_text"></div>
                </div>
            </v-row>
        </v-carrousel-item>
    </div>
</template>

<script>
export default {
    props:  ['sliders', 'pp'],
    
}
</script>

<style scoped>
    .v-sheet {
        border-radius: 0px !important;
    }
    .slide-txt {
        z-index: 1000;
    }
</style>