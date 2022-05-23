<template >
    <v-app id="inspire">
        <v-container>
           
            <h2 class="text-center my-10">{{$t('m.leave_message')}}</h2>
            <syscontactof />
        </v-container>
        
    </v-app>
</template>

<script>
export default {
 
    scrollToTop: true,
    props: {
        source: String
    },

    data: () => ({
      windowWidth: ''
    }),

    created() {
        this.windowWidth = window.innerWidth
    },

    mounted() {
        let form = window.location.hash.substr(1)
        
        console.log(form)
        form = document.getElementById(form)
        
        this.$store.state.menu_select = 'contacto'
        this.$store.commit('changeMenu')
        this.fx = this.$store.state
        if (form != undefined ) {
            form.scrollIntoView()
        }
    },
}
</script>

<style>
    .azul--text {
        color: #003b55;
    }

    .contacto {
        position: absolute;
        right: 5%;
        top: 35 px;
        z-index: 1000;
    }

</style>