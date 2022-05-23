<template>
<div>
  <v-carousel cycle>
    <v-carousel-item
      v-for="(item,i) in items"
      :key="i"
      :src="item.src"
      reverse-transition="fade-transition"
      transition="fade-transition"
      
    ></v-carousel-item>
  </v-carousel>
  {{$t('m.send')}}
</div>

</template>

<script>
  export default {
    data () {
      return {
        items: [
          {
            src: '/storage/sliders/Limpieza_m.jpeg',
          },
          {
            src: '/storage/sliders/Informacion.jpeg',
          },
          {
            src: '/storage/sliders/Higiene.jpeg',
          },
          {
            src: '/storage/sliders/industria.jpg',
          },

        ],
      }
    },
  }
</script>
