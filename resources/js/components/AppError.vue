<template>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ error }}</strong>
        <button @click="error = null" type="button" class="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
export default {
    name: "AppError",
    props: {
        error: {
            type: String,
            default: "Error",
        },
    },
};
</script>
