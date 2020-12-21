<template>
    <div class="lk__offset">
    <component :is="layout" />
<!--        <login/>-->
    </div>
</template>

<script>
    import MainLayout from './layouts/MainLayout'
    import Login from './auth/Login'
    export default {
        data: ()=> {
            return {
            }
        },
        mounted() {
        },
        created(){
        },
        methods: {

        },
        computed: {
            layout() {
                return (this.$route.meta.layout || 'main') + '-layout'
            },
        },
        components: {
            Login,
            MainLayout
        }
    }
</script>
