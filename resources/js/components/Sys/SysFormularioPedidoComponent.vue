<template>
    <v-card elevation="0" :disabled="form_checkout_id">
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-row>
                <v-col cols="12" md="4" sm="12">
                    <v-text-field v-model="datosC.cuit"
                            dense
                            outlined
                            :label="this.$t('m.cuit')"
                            disabled
                    ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12" md="8">
                    <v-text-field v-model="datosC.razon"
                            dense
                            outlined
                            :label="this.$t('m.full_name')"
                            disabled
                    ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12" md="3">
                    <v-text-field v-model="datosC.telefono"
                            dense
                            outlined
                            :label="this.$t('m.celphone')"
                            disabled
                    ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12" md="4">
                    <v-text-field v-model="datosC.correo"
                            dense
                            outlined
                            :label="this.$t('m.email')"
                            disabled
                    ></v-text-field>
                </v-col>
                
                <v-col cols="12" sm="6" md="5">
                    <v-dialog ref="dialog" v-model="menu"
                                :return-value.sync="date"
                                persistent
                                width="290px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field v-model="date"
                                        :label="$t('m.date_delivery')"
                                        prepend-icon="mdi-calendar"
                                        outlined
                                        v-bind="attrs"
                                        v-on="on"
                                        readonly
                                        
                            ></v-text-field>
                        </template>
                        <v-date-picker v-model="date" 
                                    scrollable
                                    :max="enddate"
                                    :min="mindate">
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu = false">{{$t('m.cancel')}}</v-btn>
                            <v-btn text color="primary" @click="addS(date)">Ok</v-btn>
                        </v-date-picker>
                        
                    </v-dialog>
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
            date: new Date().toISOString().slice(0,10),
            menu: false,
            mindate: '',
            fechaEntrega: '',
            datemodal: false,
            enddate: '',
            old: '',
            dialog: '',
            pickerDate: null,
        }
        
    },

    created() {
        this.datosC = JSON.parse(localStorage.getItem('formdata'))
        this.fechaEntrega = this.datosC.fecEntrega
        this.mindate = this.fechaEntrega
        this.date = this.fechaEntrega
        this.enddate = new Date(this.date.getFullYear(), this.date.getMonth(), this.date.getDate()+33).toISOString().slice(0,10)
        this.old = this.fechaEntrega
    },

    computed: {
        form_checkout_id() {
            return this.$store.state.form_checkout_id
        },

        form_checkout_shipping() {
            return this.$store.state.form_checkout_shipping
        },

        getEndDate() {
            var endDate = new Date(this.date.getFullYear(), this.date.getMonth(), this.date.getDate()+33);
            return endDate.toISOString().slice(0,10)
        },

    },

    methods: {
        addS(fecha) {
            this.old = fecha
            this.$refs.dialog.save(fecha)
            this.fechaEntrega = fecha
        },
    },
}
</script>
