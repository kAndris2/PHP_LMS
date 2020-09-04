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
        <button type="button" class="btn btn-info" @click='editModal'>Edit</button>

        <!-- Modal -->
      <div class="modal fade" id="addNew" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Módosítás</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form @submit.prevent=" updateUser">
              <div class="modal-body">
                <!-- Felhasználónév -->
                <div class="form-group">
                  <label>Felhasználónév</label>
                  <input v-model="user.name" type="text" name="name"
                    placeholder="Név"
                    class="form-control">
                </div>
                <!-- Email -->
                <div class="form-group">
                  <label>E-mail</label>
                  <input v-model="user.email" type="email" name="email"
                    placeholder="E-mail"
                    class="form-control">
                </div>

                <!-- Pass -->
                <div class="form-group">
                  <label>Jelszó</label>
                  <input v-model="user.password" type="password" name="password" id="password"
                    placeholder="Jelszó"
                    required
                    class="form-control">
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Mégse</button>
                <button type="submit" class="btn btn-success">Frissít</button>
              </div>
          </form>

          </div>
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
            },
            editModal() {
                $('#addNew').modal('show');
            },
            updateUser() {
                axios.put('api/users/' + this.user.id, this.user);
            }
        },
        mounted() {
            axios.get('api/users').then(this.handleUsersResponse);
        }
    }
</script>
