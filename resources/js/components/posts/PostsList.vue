<template>
    <section id="post-list">
        <h2 class="text-center my-4">Lista dei Post</h2>
        <AppLoader v-if="isLoading" />
        <div v-else-if="error">
            <AppError type="danger" :dismissible="true" />
        </div>
        <div v-else>
            <div v-if="postsList && postsList.length">
                <div class="row">
                    <div class="col-6" v-for="post in postsList" :key="post.id">
                        <PostCard :post="post" />
                    </div>
                </div>
            </div>
            <h4 class="text-center my-3" v-else>Non è presente nessun Post</h4>
            <AppPagination :pagination="pagination" @change-page="fetchPosts" />
        </div>
    </section>
</template>

<script>
import axios from "axios";
import AppLoader from "./../AppLoader.vue";
import AppError from "./../AppError.vue";
import PostCard from "./PostCard.vue";
import AppPagination from "../AppPagination.vue";
export default {
    name: "PostPage",
    components: { AppLoader, PostCard, AppError, AppPagination },
    data() {
        return {
            api: {
                endpoint: "http://127.0.0.1:8000/api/posts",
            },
            postsList: [],
            pagination: {
                last: null,
                current: null,
            },
            isLoading: false,
            error: null,
        };
    },
    methods: {
        fetchPosts(page = 1) {
            this.isLoading = true;

            const { endpoint } = this.api;

            axios
                .get(`${endpoint}?page=${page}`)
                .then((res) => {
                    const result = res.data;
                    console.log(res.data);
                    this.postsList = result.data;
                    this.pagination.current = result.meta.current_page;
                    this.pagination.last = result.meta.last_page;
                })
                .catch((err) => {
                    this.error = "Fetch Posts Error";
                })
                .then(() => {
                    this.isLoading = false;
                    console.log("Chiamata terminata");
                });
        },
    },
    mounted() {
        this.fetchPosts();
    },
};
</script>
