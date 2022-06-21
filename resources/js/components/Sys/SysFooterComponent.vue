<template>
    <v-footer color="" >
        <v-row>
            <v-col xs="12" sm="12" md="3" cols="12">
                <a href="/">
                <v-img class="ml-12" src="/storage/images/logoEmpresa.png" width="140" alt="logo_empresa">
                </v-img>
                </a>

                <v-card max-width="344" class="mx-auto transparent" flat >
                    <v-card-text style="color: #003855">
                        <v-row>
                            <v-col style="padding-top:0px" cols="1" xs="2" sm="1" md="1">
                                <v-icon style="color: #003855">mdi-map-marker</v-icon>
                            </v-col>
                            <v-col style="padding-top:0px" class="ml-2" cols="10" xs="10" sm="10" md="10">
                                {{this.contact.address}}
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col style="padding-top:0px" cols="1" xs="1" sm="1" md="1">
                                <v-icon style="color: #003855">mdi-email-outline</v-icon>
                            </v-col>
                            <v-col style="padding-top:0px" class="ml-2" cols="10" xs="10" sm="10" md="10">
                                {{this.contact.mail}}
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col style="padding-top:0px" cols="1" xs="1" sm="1" md="1">
                                <v-icon style="color: #003855">mdi-whatsapp</v-icon>
                            </v-col>
                            <v-col style="padding-top:0px" class="ml-2" cols="10" xs="10" sm="10" md="10">
                                {{this.contact.phone}}
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col xs="12" sm="12" md="3" cols="12" class="margin-left:10px">
                <iframe :src="contact.maps" width="100%" height="300" class="p-0 m-0"
                    frameborder="0" style="border:0;" allowfullscreen="" arial-hidden="false"
                    tabindex="0">
                </iframe>
            </v-col>

            <v-col xs="12" sm="12" md="3" cols="12" class="pt-10 d-flex align-center justify-center">
                <div class="">
                    <h6 class="text-uppercase font-weight-bold">{{$t('m.subscribe')}}</h6>
                    <v-text-field background-color="white" outlined dense v-model="correo" 
                        style="width:250px" append-icon="mdi-chevron-right-circle-outline"
                        @click:apend="addSuscripcion">
                    </v-text-field>
                    <h6 class="text-uppercase font-weight-bold">{{$t('m.follow')}}</h6>
                    <v-btn icon x-large style="text-decoration:none" href="https://www.facebook.com/swellhigieneylimpieza">
                        <v-icon>mdi-facebook</v-icon>
                    </v-btn>
                    <v-btn icon x-large style="text-decoration:none" href="https://www.instagram.com/swell_higiene_limpieza">
                        <v-icon>mdi-instagram</v-icon>
                    </v-btn>
                </div>
            </v-col>

            <v-col xs="12" sm="12" md="3" cols="12" class="d-flex align-center justify-center">
                <v-row>
                    <v-col cols="5" style="min-height:180px" class="caption mt-10 d-flex flex-column align-end justify-space-between align-items mt-auto">
                        <a class="uppercase--text black--text caption" style="text-decoration:none" href="/category/Productos%20Liquidos">{{$t('m.home') |uppercase}}</a>
                        <a class="uppercase--text black--text" style="text-decoration:none" href="/category/Higiene%20Personal">{{$t('m.hygiene') |uppercase}}</a>
                        <a class="uppercase--text black--text" style="text-decoration:none" href="/category/Productos%20Para%20Ropa">{{$t('m.clothes') |uppercase}}</a>
                        <a class="uppercase--text black--text text-right" style="text-decoration:none" href="/category/mayoristas">{{$t('m.reseller') |uppercase}}</a>
                    </v-col>
                    <v-col cols="1">
                        <v-divider vertical />
                    </v-col>
                    <v-col cols="6" style="min-height:180px" class="uppercase--text caption mt-10 d-flex flex-column align-start justify-space-between align-items mt-auto">
                        <a class="uppercase--text black--text" style="text-decoration:none" href="/envio">{{$t('m.shiping') |uppercase}}</a>
                        <a class="uppercase--text black--text" style="text-decoration:none" href="/faq">{{$t('m.faq') |uppercase}}</a>
                        <a class="uppercase--text black--text" style="text-decoration:none" href="/como-comprar">{{$t('m.how_to_buy') |uppercase}}</a>
                        <a class="uppercase--text black--text" style="text-decoration:none" href="/cobranding">{{$t('m.cobranding') |uppercase}}</a>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="12">
                <span class="text--secondary caption pl-3">Swell 2021 Copyright @ Todos los Derechos Reservados. </span>
            </v-col>     
        </v-row>

        <v-fab-transition>
            <v-btn fab large dark bottom right fixed class="success" :href="this.contact.whatsapp" targe="_blank" style="text-decoration:none">
                <v-icon>mdi-whatsapp</v-icon>
            </v-btn>
        </v-fab-transition>

        <v-snackbar v-model="snackbar" top right :timeout="5000" :color="color" >
            {{ text }}
            <v-btn :color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>
    </v-footer>
</template>


<script>
// import sys-footer from "./Sys/SysFooterComponent.vue"

export default {
     
    data() { 
        return {
            contact: [],
            correo: '',
            text: '',
            color: '',
            snackbar: '',
        }
    },

    created() {
        axios.get('/econtacto')
            .then ( res=> {
                this.contact = res.data;
                this.$session.set('correo_c',this.contact.mail);
                this.$session.set('correo_admin',this.contact.mail_admin);
                this.$session.set('correo_ventas',this.contact.mail_ventas);
                this.$session.set('correo_compras',this.contact.mail_compras);
                this.$session.set('correo_soporte',this.contact.mail_soporte);
            })
    },

    methods: {
        addSuscripcion() {
            const params = {correo: this.correo}

            axios.post('suscripcion', params)
                .then(res=> {
                    this.text = this.$t('m.suscription_success');
                    this.color = 'bg-success';
                    this.snackbar = true;
                })
                .catch(error => {
                    this.text = this.$t('m.suscription_error');
                    this.color = 'bg-danger';
                    this.snackbar = true;
                });
        }
    },
}
</script>

<style scoped>
h4{
    padding: 10px 0 10px 0;
}
</style>