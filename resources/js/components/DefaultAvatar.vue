<template>
    <div>
        {{ userName[0] }}
    </div>
</template>

<script>
    export default {
        name: "DefaultAvatar",
        props: {
            userName: {
                required: true
            }
        }
    }
</script>

<style scoped>
div {
    width: 36px;
    height: 36px;
    background: orange;
    color: #fff;
    border-radius: 50%;
    padding: 2px 0;
    text-align: center;
    font-weight: bold;
    font-size: 20px;
}
</style>
