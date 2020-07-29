<template>
    <div>
        <Navbar class="marg-bottom"/>
        <UsersContainer />
    </div>
</template>

<script>
import Navbar from "./Navbar";
import UsersContainer from "./UsersContainer";
export default {
    name: "App",
    components: {
        Navbar,
        UsersContainer
    },

}
</script>

<style scoped>
.marg-bottom {
    margin-bottom: 25px;
}
</style>
