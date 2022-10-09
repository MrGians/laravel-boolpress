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
    name: "AppAlert",
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

<style scoped>
div.alert-dismissible {
    position: relative;
    padding: 0.5rem 1rem;
}
button.close {
    padding: 0;
    height: 100%;
    width: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
