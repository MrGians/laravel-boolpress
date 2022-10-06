<template>
    <div class="card mb-3">
        <img :src="post.thumb" class="card-img-top" :alt="post.title" />
        <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.content }}</p>
            <p class="card-text">
                <small class="text-muted"
                    >Pubblicato da <strong>{{ post.author.name }}</strong> il:
                    {{ publishedAt }}</small
                >
            </p>
            <div class="actions">
                <router-link
                    class="btn btn-warning"
                    v-if="$route.name !== 'post-detail'"
                    :to="{ name: 'post-detail', params: { slug: post.slug } }"
                >
                    Vedi Post
                </router-link>
                <button class="btn btn-warning" v-else @click="$router.back()">
                    Torna Indietro
                </button>
            </div>
        </div>
        <div
            class="card-footer d-flex align-items-center justify-content-between"
        >
            <div>
                <h6>Categoria</h6>
                <span
                    :class="`badge badge-${
                        post.category ? post.category.color : 'secondary'
                    }`"
                >
                    {{ post.category ? post.category.label : "Nessuna" }}
                </span>
            </div>
            <div>
                <h6>Tags</h6>
                <div v-if="post.tags.length">
                    <span
                        v-for="tag in post.tags"
                        :key="tag.id"
                        class="badge badge-pill text-white"
                        :style="`background-color: ${tag.color}`"
                        >{{ tag.label }}</span
                    >
                </div>
                <span class="badge badge-pill text-white bg-dark" v-else
                    >N/D</span
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: {
        post: Object,
    },
    computed: {
        publishedAt() {
            const postDate = new Date(this.post.updated_at);
            let day = postDate.getDate();
            let month = postDate.getMonth() + 1;
            let year = postDate.getFullYear();

            if (day < 10) day = "0" + day;
            if (month < 10) month = "0" + month;

            return `${day}-${month}-${year}`;
        },
    },
};
</script>

<style scoped lang="scss">
.card {
    height: calc(100% - 1rem);

    & .actions {
        position: absolute;
        top: 10px;
        right: 10px;
    }
}
</style>
