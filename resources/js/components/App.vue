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
export default {
    name: "App",
    components: { AppHeader },
    data() {
        return {
            title: "Boolpress",
        };
    },
};
</script>
