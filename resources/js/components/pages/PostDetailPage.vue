<template>
    <div id="post-detail-page">
        <AppLoader v-if="isLoading" />
        <AppError v-if="error" />
        <h2 class="text-center my-4">Dettaglio Post</h2>
        <div class="row justify-content-center">
            <div class="col-9">
                <PostCard v-if="!isLoading && post" :post="post" />
            </div>
        </div>
    </div>
</template>

<script>
import PostCard from "../posts/PostCard";
import AppLoader from "../AppLoader";
import AppError from "../AppError";
export default {
    name: "PostDetailPage",
    components: { PostCard, AppLoader, AppError },
    data() {
        return {
            post: null,
            api: {
                endpoint: "http://127.0.0.1:8000/api/posts/",
            },
            isLoading: false,
            error: null,
        };
    },
    methods: {
        fetchPostDetail() {
            this.isLoading = true;
            const { endpoint } = this.api;

            axios
                .get(`${endpoint}${this.$route.params.slug}`)
                .then((res) => {
                    this.post = res.data;
                })
                .catch((err) => {
                    this.error = "Fetch Post Detail Error";
                })
                .then(() => {
                    this.isLoading = false;
                    console.log("Chiamata terminata");
                });
        },
    },
    mounted() {
        this.fetchPostDetail();
    },
};
</script>
