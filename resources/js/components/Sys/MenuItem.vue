<template>
    <div class="menu-item" :class="{ opened: expanded}">
        <div 
            class="label"
            @click="toggleMenu()"
            :style="{ paddingLeft: depth * 20 + 20 +'px' }"
        >
            <div class="left">
                <span v-if="showLabel"> {{ label }} </span>
            </div>

            <div v-if="data" class="right" >
                <i  class="expand material-icons" :class="{ opened: expanded}">expand_more</i>
            </div>
            
        </div>
        <div 
            v-show="showChildren"
            :class="{ 'small-menu': smallMenu}"
            class="items-container"
            :style="{ height: containerHeight }"
            ref="container"
            
        >
            <menu-item 
                :class="{ opened: showChildren }"
                v-for="(item, index) in data"
                :key="index"
                :label="item.label"
                :depth="depth + 1"
                :data="item.children"
                :smallMenu="smallMenu" 
            />
        </div>
    </div>
</template>

<script>
export default {
    name: "menu-item",
    data: () => ({
        showChildren : false,
        expanded: false,
        containerHeight: 0,
    }),
    props : {
        label: {
            type: String, 
            required: true
        },
        depth: {
            type: Number,
            required: true
        },
        data: {
            type: Array,
        }, 
        smallMenu: {
            type: Boolean,
        },
    },

    computed: {
        showLabel() {
            return this.smallMenu ? this.depth > 0 : true
        }
    },
    methods: {
        toggleMenu() {
            this.expanded = !this.expanded
            if (!this.showChildren) {
                this.showChildren = true
                this.$nextTick(() => {
                    this.containerHeight = this.$refs["container"].scrollHeight + "px"
                    setTimeout(() => {
                        this.containerHeight = "fit-content"
                        // Configuramos el desbordamiento del contenedor para que sea visible al final de la animación
                        this.$refs["container"].style.overflow = "visible"
                    }, 300)  //Duracion de la Animacion
                })
            } else {
                this.containerHeight = this.$refs["container"].scrollHeight + "px"
                // Configuramos el desbordamiento del contenedor como oculto para evitar la superposición de texto durante la animación
                this.$refs["container"].style.overflow = "hidden"
                // Este truco nos permite reproducir la animación cuando el CSS está bien configurado
                setTimeout(() => {
                    this.containerHeight = 0 + "px"
                }, 10)
                
                setTimeout(() => {
                    this.showChildren = false
                }, 300)   // Duracion de la animacion
                
            }
            //this.$children = !this.$children
        }
    }
}
</script>

<style lang="scss" scoped>
    .menu-item {
        position: relative;
        width: 100%;
        .label {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            white-space: nowrap;
            user-select: none;
            height: 50px;
            padding: 0 20px;
            box-sizing: border-box;
            color: #6a6a6a;
            transition: all .3s ease;
            > div {
                display: flex;
                align-items: center;
                gap: 10px;
            }
            i {
                font-size: 20px;
                transition: all .3s ease;
                color: #6a6a6a;
                &.expand {
                    font-size: 16px;
                    color: #cacaca;
                    &.opened {
                        transform: rotate(180deg);
                    }
                }
            }
        
    
            &.small-item {
                width: fit-content;
            }
            &:hover {
                background: #deedff;
                cursor: pointer;
                
            }
        }
    }

    .items-container {
        width: 100%;
        left: calc(100% + 6px);
        transition: height 0.3s ease;
        overflow: hidden;
        &.small-menu {
            widows: fit-content;
            position: absolute;
            background: #fff;
            box-shadow: 0 0 10px #ebebeb;
            top: 0;
            .label {
                width: 100% !important;
                padding-left: 20px !important;
            }
        }
        //transition: all .3s ease;
    }

</style>