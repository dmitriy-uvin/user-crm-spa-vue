<template>
    <div class="loader-block">
        <div class="spinner-border text-success" role="status" style="width: 5rem; height: 5rem;">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Loader"
    }
</script>

<style scoped>
.loader-block {
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    position: absolute;
    top: 0;
    left: 0;
    z-index: 10;
}
.loader-block > div {
    position: absolute;
    top: 50%;
    left: 50%;
}
</style>
