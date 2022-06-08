<template>
    <v-col :key="item.id" cols="12" md="4">
        <v-hover v-slot:default="{ hover }">
            <v-card transition="scale-transition"
                    origin="center center"
                    min-width="100%"
                    elevation="0"
                    :href="`/products/${item.id}?tipo=${tuser}`"
                    style="text-decoration:none">
                <v-img :src="item.image" contain transition="scale-transition" :alt="item.es_name" @click="verMas(item)" max-height="300px">
                    <div v-if="hover" style="height: 100%;"></div>
                </v-img>

                <div :class="item.tag_fontsiza" :style="{ color: item.tag_colortext, background: item.tag_backgroung }"
                        class="font-weight-black px-3" style="border-radius:5em; position: absolute; top: -15px; left: 20px">
                    {{ item.tag_text }}
                </div>

                <v-card-text class="my-0 py-0 font-weight-bol d-flex justify-center align-center" style="min-height: 90px">
                    <div class="py-2 text-center d-flex flex-column text-uppercase font-weight-light">
                        <div v-if="$i18n.locale==='es'"> {{ item.es_name }}</div>
                        <div v-else>{{item.en_name}}</div>

                        <div v-if="tuser > 0 && st == 1">
                            <div style="width:100% text-decoration: line-through" class="text-success" >
                              <b> {{$t('m.from')}} {{ item.precio | dollar }} + IVA </b>
                            </div>
                        </div>                        
                    </div>
                </v-card-text>
            </v-card>
        </v-hover>
    </v-col>
</template>

<script>
import { mapState } from 'vuex';

export default {
    props : {
        item: { type: Object, require: true },
        tuser: { type: String},
        st: { type: Number},
    },

    data: () => ({
      isActive: false,
      new_price: 0,
    }),

    computed: mapState( ['descuento_porcentual']),

    

    created() {
        if (this.descuento_porcentual > 0)
            this.new_price = parseFloat(this.item.precio) - (parseFloat(this.item,precio)* parseFloat(this.descuento_porcentual)/100)

    },


    methods: {
        verMas(i) {
            this.$emit('select', i)
        },

        addItem(i) {
            this.$emit('add', i)
        },

    },
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