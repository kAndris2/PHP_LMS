<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-for="user in this.users" :key="user.id">
                    {{user.name}}
                    {{user.email}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                users:{}
            }
        },
        methods:{
            loadAll(){
                axios.get('api/users').then(({ data }) => (this.users = data));
            }
        },
        created() {
            this.loadAll();
        }
    }
</script>
