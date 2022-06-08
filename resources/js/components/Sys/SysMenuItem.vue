<template>
    <div v-if="ca.children !='' ">

            <v-expansion-panel>
            <v-expansion-panel-header v-if="$i18n.locale === 'es'" class="subtitle-1" style="width:100%"><strong> {{ca.es_name}}</strong></v-expansion-panel-header>
            <v-expansion-panel-header v-else class="subtitle-1" style="width:100%"><strong> {{ca.en_name}}</strong></v-expansion-panel-header>
            <v-expansion-panel-content>
                <div class="mt-3 subtitle-1">
                    <Menu-items 
                        v-for="(item,index) in ca.children" 
                        :key="index" 
                        :ca="item" 
                    />
                    <!--<div v-for="(c,id4) in ca.children" :key="id4">
                        <div class="drop-ecom subtitle-1">
                            <a v-if="$i18n.locale === 'es'" class="nav-link" :href="`/category/${c.es_name}`">{{c.es_name}}</a>
                            <a v-else class="nav-link" :href="`/category/${c.es_name}`">{{c.en_name}}</a>
                        </div>  
                    </div> -->
                </div> 
            </v-expansion-panel-content>
        </v-expansion-panel>


    </div>
    <div v-else>
        <div class="navbar-nav drop-ecom subtitle-1 mt-3">
            <a v-if="$i18n.locale === 'es'" class="nav-link" :href="`/category/${ca.es_name}`">{{ca.es_name}}</a>
            <a v-else class="nav-link" :href="`/category/${ca.es_name}`">{{ca.en_name}}</a>
        </div>
    </div>
</template>

<script>


export default {

    name: "Menu-items",
    data: () => ({
        
    }),

    props : {
        ca: {
            type: Object,
            required: true
        }
    },
}
</script>


<style>
.drop-ecom{
    padding: 0px 10px;
    margin: 0px!important;

    }
    .drop-ecom-2{
    padding: 0px 5px;
    margin: 0px!important;

    }

    .v-expansion-panel-header{
    padding: 0px 10px;
    margin: 0px 0px 0px 0px!important;

    }

     .nav-link{
    color:black!important
    
    }
    .nav-ecom{
    width:100%;
    display: flex;
    justify-content: space-around;
    }
</style>