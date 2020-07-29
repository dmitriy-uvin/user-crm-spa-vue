<template>
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">
                        <i class="fa fa-user"></i>
                        {{ user.name }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>

                    </button>
                </div>
                <div class="modal-body">
                    <img :src="user.avatar" alt="" class="user-avatar mb-3">
                    <p>
                        <strong>Name: </strong> {{ user.name }}
                    </p>
                    <p>
                        <strong>E-mail: </strong> {{ user.email }}
                    </p>
                    <p>
                        <strong>Age: </strong> {{ user.age }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ViewModal",
    props: {
        user: {
            required: true,
            type: Object
        }
    }
}
</script>

<style scoped>
.user-avatar {
    width: 100%;
    height: 100%;
    max-height: 315px;
    max-width: 315px;
}
.modal-body {
    text-align: center;
}
</style>
