<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">{{ title }}</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <router-link
                    class="nav-link"
                    v-for="link in links"
                    :key="link.route_name"
                    :to="{ name: link.route_name }"
                    :exact="link.route_name === 'home'"
                    >{{ link.page_name }}</router-link
                >
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "AppHeader",
    data() {
        return {
            links: [
                { route_name: "home", page_name: "Home" },
                { route_name: "posts", page_name: "Posts" },
                { route_name: "about", page_name: "About" },
            ],
        };
    },
    props: {
        title: String,
    },
};
</script>

<style scoped lang="scss"></style>
