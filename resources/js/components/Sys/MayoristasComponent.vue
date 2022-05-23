<template>
    <div>
        <v-container>
            <h2 class="mt-10">{{$t('m.reseller')}}</h2>
            <v-row>
                <v-col cols="12" class="body-1">
                    <p>{{$t('m.welcome_l1')}}</p>
                    <p>{{$t('m.welcome_l2')}} <a href="/login">{{$t('m.welcome_l22')}} </a></p>
                    <p>{{$t('m.welcome_l3')}}</p>
                    <p><i>{{$t('m.welcome_l4')}}</i></p>
                </v-col>
            </v-row>
           <sys-register />
        </v-container>
    </div>
</template>

<script>
export default {
    data() {
        
    },
     beforeCreate() {
        if ( !this.$session.exists() ) {
            this.$session.start()
            this.$session.set('idioma','es')
            this.$i18n.locale = 'es'
        }else {

            this.$i18n.locale = this.$session.get('idioma')
             
        }
    },

    mounted(){
    
    },
}
</script>