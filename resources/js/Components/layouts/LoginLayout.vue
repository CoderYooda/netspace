<template>
    <div class="wrapper">
        <div class="login-bg"></div>
        <router-view />
    </div>
</template>

<script>
    import Menu from '../views/Menu'
    export default {
        data: ()=> {
            return {
                isDark: false,
            }
        },
        created(){
        },

        methods: {

        },
        components: {
            Menu
        }
    }
</script>
