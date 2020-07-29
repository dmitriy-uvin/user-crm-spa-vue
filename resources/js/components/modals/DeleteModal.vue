<template>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="fa fa-trash"></i>
                        Удалить пользователя
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        Вы уверены, что хотите удалить пользователя <u>{{ user.name }}</u>?
                    </strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-danger" @click="deleteUserById">
                        <i class="fa fa-trash"></i>
                        Удалить
                    </button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {apiUsersUrl} from "../../config/api";

export default {
    name: "DeleteModal",
    props: {
        user: {
            required: true
        }
    },
    methods: {
        async deleteUserById() {
            const response = await axios.delete(apiUsersUrl + this.user.id);
            $('#deleteModal').modal('hide');
            this.$emit('user-deleted');
        }
    }
}
</script>

<style scoped>

</style>
