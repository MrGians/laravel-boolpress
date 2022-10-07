<template>
    <div
        class="`alert fade show"
        :class="[`alert-${type}`, { 'alert-dismissible': dismissible }]"
        role="alert"
    >
        <slot></slot>
        <button @click="$emit('close')" type="button" class="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
export default {
    name: "AppError",
    props: {
        dismissible: {
            type: Boolean,
            default: false,
        },
        type: {
            type: String,
            default: "info",
        },
    },
};
</script>
