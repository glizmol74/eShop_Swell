<template>

    <div class="menu">

        <MenuItem 
            v-for="(item, index) in menuTree"
            :key="index"
            :label="item.label"
            :depth="0"
            :data="item.children"
        />

    </div>
</template>

<script>
    
import MenuItem from './MenuItem.vue'
export default {
    name: "recursive-menu",
    data: () => ({
        menuTree: [
            {
                label: "Home",
                children: [
                    {
                        label: "Lever 1.1",
                        children: [
                            {
                                label: "<a href='/category/Gel Clorado'> Level 1.1.1 </a>",
                                children : [
                                    {
                                        label: "Level 1.1.1.1"
                                    }
                                ]
                            }
                        ]
                    },
                    {
                        label: "Leve 1.2"
                    }
                ]
            },
            {
                label: "Setting",

            }
        ]

    }),

    components: {
        MenuItem
    }
}
</script>


<style lang="scss" scoped>
    .menu {
        position: fixed;
        height: 100vh;
        width: 240px;
        left: 0;
        top: 0;
        border-right: 1px solid #ececec;
        transition: all .3s ease;
        overflow: auto;
    }
</style>