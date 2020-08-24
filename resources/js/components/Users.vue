<template>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
            </tr>

            <tr v-for="user in this.users" :key="user.id">
                <td>{{user.id}}</td>
                <td>
                    <router-link :to="{name : 'wtf', params: {id: user.id}}" >
                        {{user.name}}
                    </router-link>
                </td>
                <td>{{user.email}}</td>
            </tr>
        </table>
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
