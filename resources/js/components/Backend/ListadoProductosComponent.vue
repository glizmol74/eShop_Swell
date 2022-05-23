<template>
    <div class="container">
        <!-- Alerta -->
        <v-snackbar v-model="snackbar" top right :timeout="5000" :color="color">
            {{ text }}
            <v-btn :color="color" small dark elevation="0" @click="snackbar = false">
                <v-icon small>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>
        <!-- Fin Alerta -->

        <!-- Eliminar -->
        <v-row justify="center">
            <v-dialog v-model="eliminarModal" persistent max-width="580">
                <v-card>
                    <v-card-title class="headline">Seguro  que desea darle de Baja a este Producto : ( {{producto.es_name}} )</v-card-title>
                    <v-card-text>Esta acción puede deshacerse</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="eliminarModal = false"> {{this.$t('m.cancel')}} </v-btn>
                        <v-btn color="green darken-1" text @click="eliminarProducto()"> {{this.$t('m.acept')}} </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- Fin eliminar -->

        <!-- Titulo -->
        <v-card class="d-lg-flex justify-space-between mb-2 mt-5">
            <v-card-title class="headline d-flex start text-truncate">Administración de Productos</v-card-title>
            <v-breadcrumbs v-if="$i18n.locales === 'es'" :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs>
            <v-breadcrumbs v-else :items="breadmenu" class="d-flex end hidden-sm-down"></v-breadcrumbs> 
        </v-card>
        <!-- Fin Titulo -->

        <!-- Tabla de Productos -->
        <v-card class="mt-3 pb-10">
            <v-card-title>
                Listado de Productos  
                <v-spacer></v-spacer>
                <v-text-field v-model="search" append-icon="mdi-magnify"
                                :label="this.$t('m.search')" single-line hide-details
                ></v-text-field>
                <v-spacer></v-spacer>
            </v-card-title>

            <v-card-text>
                <v-btn color="primary" dark class="mb-2" @click="nuevo()">Nuevo Producto</v-btn>
            </v-card-text>

            <v-data-table :headers="headers" :items="productos" :items-per-page="10" :search="search" class="elevations-1 mr-5 ml-5">
                <template v-slot:item.url="{item}">
                    <span v-if="item.url!=null">
                        <v-img width="80px" :src="item.url"></v-img>
                    </span>
                </template>

                <template v-slot:item.estado="{ item }">
                    <v-switch v-if="item.estado <2" v-model="item.estado" @change="cambiarEstado(item.id)"></v-switch>
                    <v-chip v-if="item.estado == 2" color="pink" text-color="white" >{{estado(item.estado)}} </v-chip>
                </template>

                <template v-slot:item.destacado="{item}">
                    <v-btn small icon dark @click="cambiarDestacado(item.id)">
                        <v-icon v-if="item.destacado == 1" small color="pink">mdi-heart</v-icon>
                        <v-icon v-else small color="grey">mdi-heart</v-icon>
                    </v-btn>
                </template>

                <template v-slot:item.edit="{item}">
                    <v-btn color="green" small dark @click="editar(item.id)">
                        <v-icon small>mdi-pencil</v-icon>
                    </v-btn>
                </template>

                <template v-slot:item.delet="{item}">
                    <v-btn color="red" small dark @click="eliminar(item)">
                        <v-icon small>mdi-delete</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script>

export default {
    data() {
        return {
            eliminarModal: false,
            productos: [],
            producto: {id: '', es_name: '', destacado: ''},
            search: [],
            text: '',
            snackbar: false,
            color: '',
            headers: [ { text: 'Id', value: 'id'},
                       { text: 'Nombre', value: 'es_name'},
                       { text: 'Descripción', value: 'es_descripcion'},
                       { text: 'Principal', value: 'url'},
                       { text: 'Estado', value: 'estado'},
                       { text: 'Destacado', align: 'center', value: 'destacado'},
                       { text: 'Editar', value: 'edit'},
                       { text: 'Eliminar', value: 'delet'}],
            breadmenu: [ { text: 'Swell', disabled: false, href: '/'},
                         { text: 'Dashboard', disabled: false, href: '/admin/dashboard'},
                         { text: 'Productos', disabled: true, href: '/admin/productos'}]
        }
    },

    created() {
        axios.get('/admin/listado_productos')
            .then( res => {
                this.productos = res.data
            })
    },

    methods: {
        estado( st ) {
            if( st == 1)
                return "Actvo"
            else if ( st == 0)
                return "Inactivo"
            else
                return "Baja"
        },

        nuevo() {
            window.location.href= '/admin/producto/new'
        },

        editar( id ) {
            window.location.href = `/admin/producto/${id}`
        },

        cambiarDestacado( id ) {
            axios.post(`/admin/destacado/${id}`)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        const index = this.productos.findIndex( item => item.id === id)
                        this.productos[index].destacado = res.data[2]
                        this.color = 'success'
                        this.text = 'Se Cambio el producto destacado'
                        this.snackbar = true
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General al realizar el cambio'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        },

        cambiarEstado( id ) {
            axios.post(`/admin/producto/estado/${id}`)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        const index = this.productos.findIndex( item => item.id === id)
                        this.productos[index].destacado = res.data[2]
                        this.color = 'success'
                        this.text = 'Se Cambio el estado del producto'
                        this.snackbar = true
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General al realizar el cambio de Estado'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        },

        eliminar(item) {
            this.producto.id = item.id
            this.producto.es_name = item.es_name
            this.producto.destacato = item.destacado
            this.eliminarModal = true
        },

        eliminarProducto() {
            axios.post(`/admin/productos/baja_producto/${this.producto.id}`)
                .then( res => {
                    if ( res.data[0] == 0) {
                        this.text = res.data[1]
                        this.color = 'bg-danger'
                        this.snackbar = true
                    } else {
                        this.productos = res.data[2]
                        this.color = 'success'
                        this.text = 'Se dio de Baja el producto'
                        this.snackbar = true
                        this.eliminarModal = false
                    }
                })
                .catch( error => {
                    this.text = 'Hubo un error General al darle de Baja al Producto'
                    this.color = 'bg-danger'
                    this.snackbar = true
                })
        },
    },
}
</script>
