<template>
    <div class="container">
        <Loader v-if="isLoading"/>
        <div class="row">
            <div class="col-md-2">
                <div>
                    <strong>Поиск</strong>
                    <input type="text" v-model="search" class="form-control">
                </div>
                <div class="mt-3">
                    <strong>Фильтры</strong>
                    <div>
                        <u>Возраст</u>
                    </div>
                    <ul>
                        <li>
                            <input type="checkbox" id="less_18" v-model="less_18">
                            <label for="less_18">До 18</label>
                        </li>
                        <li>
                            <input type="checkbox" id="more_18" v-model="more_18">
                            <label for="more_18">После 18</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in filteredUsers" :key="user.id">
                        <th scope="row">{{ user.id }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.age }}</td>
                        <td>
                            <img v-if="user.avatar" :src="user.avatar" alt="" class="user-avatar">
                            <DefaultAvatar :userName="user.name" v-else/>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger"
                                    data-toggle="modal" data-target="#deleteModal"
                                    @click="onSelectUser(user)">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-warning"
                                    data-toggle="modal" data-target="#editModal"
                                    @click="onSelectUser(user, 'edit')">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-info"
                                    data-toggle="modal" data-target="#viewModal"
                                    @click="onSelectUser(user)">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2">
                <h4>Новый пользователь</h4>
                <button type="button" class="btn btn-primary"
                        data-toggle="modal" data-target="#addModal">
                    <i class="fa fa-plus"></i>
                    Добавить
                </button>
            </div>
        </div>

        <DeleteModal :user="selectedUser" @user-deleted="updateUsers"/>
        <AddModal @user-added="updateUsers"/>
        <EditModal :user="selectedUser" @user-updated="updateUsers" v-if="isEditUserModalActive"/>
        <ViewModal :user="selectedUser"/>
    </div>
</template>

<script>
import Loader from "./Loader";
import DeleteModal from "./modals/DeleteModal";
import AddModal from "./modals/AddModal";
import DefaultAvatar from "./DefaultAvatar";
import ViewModal from "./modals/ViewModal";
import EditModal from "./modals/EditModal";
import { apiUsersUrl } from "../config/api";

export default {
    name: "UsersContainer",
    components: {
        Loader,
        DeleteModal,
        DefaultAvatar,
        AddModal,
        ViewModal,
        EditModal
    },
    data: () => ({
        isEditUserModalActive: false,
        isLoading: true,
        users: [],
        selectedUser: {},
        search: '',
        less_18: false,
        more_18: false
    }),
    async mounted() {
        await this.updateUsers();
    },
    methods: {
        async onSelectUser(user, type = null) {
            this.selectedUser = user;

            if (type) {
                this.isEditUserModalActive = true;
            }
        },
        async updateUsers() {
            this.isEditUserModalActive = false;
            const response = await axios.get(apiUsersUrl);
            this.users = response.data.users;
            this.isLoading = false;
        }
    },
    computed: {
        searchedUsers() {
            return this.users.filter(user => {
                return (user.name.toLowerCase().includes(this.search.toLowerCase()) ||
                user.email.toLowerCase().includes(this.search.toLowerCase()))
            })
        },
        filteredUsers() {
            if (this.less_18 && this.more_18 || !this.less_18 && !this.more_18) {
                return this.searchedUsers;
            } else if (this.less_18) {
                return this.searchedUsers.filter(user => {
                    return user.age <= 18;
                });
            }else if(this.more_18){
                return this.searchedUsers.filter(user => {
                    return user.age > 18;
                });
            }
        }
    }
}
</script>

<style scoped>
.user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
}
ul {
    list-style: none;
    padding-inline-start: 0;
}
</style>
