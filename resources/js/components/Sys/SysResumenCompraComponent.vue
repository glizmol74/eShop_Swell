<template>
   <v-card class="mt-3 pb-10">
       <v-card-text>
           <v-data-table v-if="$i18n.locale == 'es'" class="elevation-1"
                        :headers="headers_es"
                        :items="items"
                        >
                <template v-slot:item.precio="{item}">
                    {{ item.precio | round 2 | dollar}}
                </template>
                
                <template v-slot:item.ftotal="{item}">
                    {{ (item.total + (item.total * item.tax / 100 ) ) | round 2 | dollar}}
                </template>

                <template v-slot:item.total="{item}">
                    {{ item.total  | round 2 | dollar}}
                </template>

                <template v-slot:item.es_name="{item}">
                    {{ item.es_name }} X {{ item.attr_es_name}}
                </template>

                <template v-slot:item.image="{item}">
                    <span v-if="item.image!=null">
                        <v-img width="80px" :src="item.image"></v-img>
                    </span>
                </template>
            </v-data-table>
            <v-card-table v-else class="elevation-1"
                        :headers="headers_en"
                        :itemid="items">
                <template v-slot:item.ftotal="{item}">
                    {{ item.total + (item.total * item.tax / 100 ) | dollar}}
                </template>

                <template v-slot:item.en_name="{item}">
                    {{ item.en_name }} X {{ item.attr_en_name}}
                </template>

                <template v-slot:item.image="{item}">
                    <span v-if="item.image!=null">
                        <v-img width="100px" :src="item.image"></v-img>
                    </span>
                </template>
            </v-card-table>
       </v-card-text>
   </v-card>
</template>

<script>
import { mapState } from 'vuex'

export default {
    data() {
        return {
            datosC: {},
            valid: true,
            id_user: '',
            txtForm: '',
            search: '',
            items: [],
            headers_es: [ { text: 'Artículo', value: 'image' },
                         { text: 'Descripción', value: 'es_name' },
                         { text: 'Cantidad', value: 'cantidad' },
                         { text: 'Unitario', value: 'precio', align: 'end' },
                         { text: 'Importe', value: 'total', align: 'end' },
                         { text: 'Iva (%)', value: 'tax', align: 'center' },
                         { text: 'Final Price', value: 'ftotal', align: 'end', sortable: false }],
            headers_en: [ { text: 'Article', value: 'image' },
                         { text: 'Description', value: 'en_name' },
                         { text: 'quantilies', value: 'cantidad' },
                         { text: 'Unitary', value: 'precio' },
                         { text: 'Amount', value: 'total' },
                         { text: 'Iva (%)', value: 'tax' },
                         { text: 'Final Price', value: 'ftotal', sortable: false }],
            idioma: '',
            
        }

    },

    created() {
        this.$i18n.locale = this.$session.get('idioma')
        this.id_user = this.$session.get('u-id')
        this.txtForm = 'newform_'+this.id_user
        this.items = JSON.parse(localStorage.getItem(this.txtForm))
        this.idioma = this.$i18n.locale
    },

    computed: mapState(['descuento_porcentual', 'descuento_valor', 'subtotal', 'total', 'costo_envio', 'cantidad']),
}
</script>

<style scoped>
    .border-black {
        border: 1px solid black;
    }
</style>
