<template>
    <div id="posts-page">
        <PostsList />
    </div>
</template>

<script>
import PostsList from "../posts/PostsList";
export default {
    name: "PostsPage",
    components: { PostsList },
};
</script>
