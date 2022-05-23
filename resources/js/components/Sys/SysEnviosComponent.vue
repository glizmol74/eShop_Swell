<template>
    <div>
        <v-container>
            <h2 class="mt-10"> {{$t('m.shipping')}} </h2>
            <v-row>
                <v-col cols="12" md="5" class="text-justify">
                    <p> {{$t('m.shipping_l1')}} </p>
                    <p> {{$t('m.shipping_l2')}} </p>
                    <p> {{$t('m.shipping_l3')}} </p>
                    <p> {{$t('m.shipping_l4')}} </p>
                    <p> {{$t('m.shipping_l5')}} </p>
                </v-col>

                <v-col cols="12" md="7" class="d-flex align-center">
                    <v-img
                        src="/storage/images/cobranding/envio.png"
                        max-height="225"
                        contain
                        style="margin-top:10px"
                    ></v-img>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    
}
</script>