<template>
    <v-col :key="item.id" sm="12" md="2">
        <v-lazy v-model="isActive" :options="{threshold: 0.5}" min-width="200" transition="fade-transition">
            <v-hover v-slot:default="{ hover }">
                <v-card transition="scale-transition" origin="center center" width="99%" elevation="0" :href="`/products/${item.id}`">
                    <v-img :src="item.image" contain transition="scale-transition" origin='center center' :alt="item.es_name" @click="verMAs(item)">
                        <v-expand-transition v-if="$i18n.locale === 'es'">
                            <div v-if="hover" style="height:100%;"
                                    class="d-flex transition-fastin-fast-out grey darken-2 subtitle-1 text-uppercase font-weight-medium v-card--reveal white--text text-center">
                                {{ item.es_name}}
                            </div>
                        </v-expand-transition>
                        <v-expand-transition v-else>
                            <div v-if="hover" style="height:100%;"
                                    class="d-flex transition-fastin-fast-out grey darken-2 subtitle-1 text-uppercase font-weight-medium v-card--reveal white--text text-center">
                                {{ item.en_name}}
                            </div>
                        </v-expand-transition>
                    </v-img>

                    <div class="font-weight-black px-3" style="border-radius:5em; position: absolute; top: -15px; left:10px;">
                        {{ ''}} <!-- titulo destacados  -->
                    </div>
                </v-card>
            </v-hover>
        </v-lazy>
    </v-col>
</template>

<script>
export default {
    props: {
        item: {}
    },

    data: () => ({
      isActive: false  
    }),

    methods: {
        verMas(i) {
            this.$emit('select', i)
        },

        addItem(i) {
            this.$emit('add', i)
        }
    }
}
</script>

<style scoped>
    .v-card--reveal {
        align-items: center;
        bottom: 0;
        justify-content: center;
        opacity: 0.8;
        position: absolute;
        width: 100%;
    }

    .label {
        height: 20px;
    }

</style>