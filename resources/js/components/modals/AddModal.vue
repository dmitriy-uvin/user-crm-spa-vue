<template>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        <i class="fa fa-plus"></i>
                        Добавить пользователя
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name">Имя</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   v-model="name">
                            <small>
                                <strong v-if="errors.name" class="text-danger">
                                    {{ errors.name[0] }}
                                </strong>
                            </small>
                        </div>
                        <div class="col-md-6">
                            <label for="age">Возраст</label>
                            <input type="text" id="age" name="age" class="form-control"
                                   v-model="age">
                            <small>
                                <strong v-if="errors.age" class="text-danger">
                                    {{ errors.age[0] }}
                                </strong>
                            </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                               v-model="email">
                        <small>
                            <strong v-if="errors.email" class="text-danger">
                                {{ errors.email[0] }}
                            </strong>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" class="form-control"
                               v-model="password">
                        <small>
                            <strong v-if="errors.password" class="text-danger">
                                {{ errors.password[0] }}
                            </strong>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Аватар</label>
                        <input type="file" id="avatar" name="avatar" class="form-control"
                               @change="selectFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-success" @click="onAddUser">
                        <i class="fa fa-plus"></i>
                        Добавить
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { apiUsersUrl } from "../../config/api";

export default {
    name: "AddModal",
    data: () => ({
        name: null,
        email: null,
        age: null,
        password: null,
        avatar: null,
        errors: {}
    }),
    methods: {
        selectFile(event) {
            this.avatar = event.target.files[0];
        },
        async onAddUser() {
            const userData = new FormData();
            userData.append('name', this.name);
            userData.append('email', this.email);
            userData.append('age', this.age);
            userData.append('password', this.password);

            if (this.avatar) {
                userData.append('avatar', this.avatar);
            }

            axios.post(apiUsersUrl, userData)
                .then((response) => {
                    console.log(response);
                    this.name = this.email = this.password = this.avatar = this.age = null;
                    this.errors = {};
                    this.$emit('user-added');
                    $("#addModal").modal('hide');
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    }
}
</script>

<style scoped>

</style>
