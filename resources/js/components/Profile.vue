<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>ID: {{this.user.id}}</p>
                <p>Name: {{this.user.name}}</p>
                <p>E-mail: {{this.user.email}}</p>
                <p>Role: {{this.user.type}}</p>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                userID : window.location.href.split('/').pop(),
                user : undefined
            }
        },
        methods:{
            handleUsersResponse(response){
                response.data.map(user => {
                    if (user.id == this.userID)
                        this.user = user;
                });
            }
        },
        mounted() {
            axios.get('api/users').then(this.handleUsersResponse);
        }
    }
</script>
