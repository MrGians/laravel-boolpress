<template>
    <div class="loader">
        <div class="spinner-border text-info" role="status">
            <span class="sr-only">Caricamento...</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppLoader",
};
</script>

<style scoped lang="scss">
.loader {
    background-color: rgba(128, 128, 128, 0.65);
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    & > .spinner-border {
        height: 100px;
        width: 100px;
    }
}
</style>
