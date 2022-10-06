<template>
    <div class="content">
        <AppHeader :title="title" />
        <main class="container">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import AppHeader from "./AppHeader";
import PostsPage from "./pages/PostsPage";
export default {
    name: "App",
    components: { AppHeader, PostsPage },
    data() {
        return {
            title: "Boolpress",
        };
    },
};
</script>
