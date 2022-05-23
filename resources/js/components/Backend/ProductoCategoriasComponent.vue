<template>
    <div>
        <!-- Alerta -->
        <v-snackbar v-model="snackbar" top right :timeout="3500" :color="color">
            {{ text }}
            <v-btn :color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>
        <!-- Fin Alerta -->


        <v-card class="mt-3 pb-10">
            <v-card-title class="justify-center">Categorías</v-card-title>
            <v-card-text class="text-center">
                <v-row>
                    <v-col cols="12" sm="12" md="12">
                        <v-select v-model.trim="$v.categorias.$model"
                                label="Categorías"
                                :error-messages="catErrors"
                                :items="categorias_full"
                                    item-text="es_name"
                                    item-value="id"
                                
                                sort-by="es_name"
                        ></v-select>
                    </v-col>

                    <v-col cols="12" sm="12" md="12">
                        <v-btn class="mx-15 mt-0 mb-2" @click="agregarCategorias" color="blue" dark>Agregar</v-btn>
                    </v-col>
                    
                    <v-col cols="12" sm="12" md="12">
                        <v-data-table :headers="headers_categorias"
                                      :items="productos_categorias"
                                      sort-by="es_name">
                            <template v-slot:item.action="{item}">
                                <v-icon small @click="deleteItemCategoria(item)" color="red">mdi-delete</v-icon>
                            </template>
                        </v-data-table>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
export default {
    props: {
        prod: { type: String, required: true},
        cate: { type: Array, required:true},
       
    },

    data() {
        return {
            text: '',
            color: '',
            snackbar: false,
            categorias: '',
            categorias_full: [],
            productos_categorias: [],
            headers_categorias: [ { text: '', value: 'cat_es_name', width: '80%'},
                                  { text: '', value: 'action', sortable: false}],
            fichaModal: false,
        }
    },

    created() {
        axios.get('/admin/categorias')
            .then( res => {
                this.categorias_full = res.data
            })
        this.productos_categorias = this.cate
    },

    watch: {
        cate() {
            this.productos_categorias = this.cate
        },
    },

    computed: {
        catErrors() {
            const errors = []
            if ( !this.$v.categorias.$dirty ) return errors
        },
    },

    methods: {
        agregarCategorias() {
            this.$v.categorias.$touch()
            if ( this.$v.categorias.pending || this.$v.categorias.$error ) return
            if (this.categorias == '' ) {
                this.text = 'Debe seleccionar una Categoria'
                this.color = 'bg-danger'
                this.snackbar = true
                return
            } else if ( this.prod == 'new') {
                this.text = 'Se debe crear primero el Producto antes de Agregar Categoria'
                this.color = 'bg-danger'
                this.snackbar = true
                return
            }
            const params = { id: this.prod, categoria: this.categorias }
            axios.post('/admin/producto/add_categoriaproducto', params)
                .then( res => {
                    if ( res.data[0] == 0 ) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        this.productos_categorias = res.data[2]
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un Error General agregando la Categoría'
                    this.color = 'error'
                    this.snackbar = true
                    console.log( error.response )
                })
        },

        deleteItemCategoria(item) {
            const params = {id: item.id }
            axios.post('/admin/producto/del_categoriaproducto', params )
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.text = res.data[1]
                        this.color = 'success'
                        this.snackbar = true
                        this.productos_categorias = res.data[2]
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un Error General al Eliminar la Categoría del Producto'
                    this.color = 'error'
                    this.snackbar = true
                })
        },
    },

    validations: {
        categorias: {},
    }
}
</script>