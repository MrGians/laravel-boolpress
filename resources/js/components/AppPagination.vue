<template>
    <nav aria-label="Page navigation my-3">
        <ul class="pagination justify-content-center">
            <!-- Previous Page -->
            <li
                v-if="pagination.current > 1"
                class="page-item"
                role="button"
                @click="changePage(pagination.current - 1)"
            >
                <span class="page-link">Prev</span>
            </li>
            <!-- Pages -->
            <li
                role="button"
                class="page-item"
                :key="page"
                v-for="page in pagination.last"
                :class="{ active: page === pagination.current }"
                @click="changePage(page)"
            >
                <span class="page-link">{{ page }}</span>
            </li>
            <!-- Next page -->
            <li
                v-if="pagination.current !== pagination.last"
                role="button"
                class="page-item"
                @click="changePage(pagination.current + 1)"
            >
                <span class="page-link">Next</span>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "AppPagination",
    props: {
        pagination: Object,
    },
    methods: {
        changePage(page) {
            this.$emit("change-page", page);
        },
    },
};
</script>
