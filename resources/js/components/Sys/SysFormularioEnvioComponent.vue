<template>
    <v-card elevation="0" :disabled="form_checkout_shipping">
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-row>
                <v-col cols="12" md="12" sm="12">
                    <v-text-field v-model="datosC.address"
                            dense
                            outlined
                            :label="this.$t('m.street')"
                            disabled
                    ></v-text-field>
                </v-col>
            </v-row>
        </v-form>
    </v-card>
</template>

<script>
import { maxLength } from 'vuelidate/lib/validators'

export default {
    data() {
        return {
            datosC: {},
            valid: true,
        }
        
    },

    created() {
        this.datosC = JSON.parse(localStorage.getItem('formdata'))
    },

    computed: {
        form_checkout_id() {
            return this.$store.state.form_checkout_id
        },

        form_checkout_shipping() {
            return this.$store.state.form_checkout_shipping
        },
    },
}
</script>
