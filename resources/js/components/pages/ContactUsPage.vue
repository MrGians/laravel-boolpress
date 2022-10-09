<template>
    <div id="contact-page">
        <h2 class="text-center my-4">Contact Us</h2>
        <AppLoader v-if="isLoading" />
        <div v-else>
            <AppAlert
                v-if="alertMessage"
                :type="hasError ? 'danger' : 'success'"
                dismissible="true"
                @close="errors = {}"
            >
            </AppAlert>
            <form @submit.prevent="sendEmail" novalidate>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">La tua Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        v-model.trim="form.email"
                        required
                    />
                </div>
                <!-- Textarea -->
                <div class="form-group">
                    <label for="message">Il tuo Messaggio</label>
                    <textarea
                        class="form-control"
                        id="message"
                        rows="10"
                        v-model.trim="form.message"
                    ></textarea>
                </div>
                <!-- Action -->
                <button class="btn btn-success" type="submit">Invia</button>
            </form>
        </div>
    </div>
</template>

<script>
import AppLoader from "./../AppLoader.vue";
import AppAlert from "./../AppAlert.vue";
export default {
    name: "ContactUs",
    components: { AppAlert, AppLoader },
    data() {
        return {
            form: {
                email: "",
                message: "",
            },
            errors: {},
            alertMessage: null,
            isLoading: false,
        };
    },
    computed: {
        hasError() {
            return true;
        },
    },
    methods: {
        sendEmail() {
            this.isLoading = true;

            axios
                .post("http://localhost:8000/api/contact_us", this.form)
                .then((res) => {
                    this.form.email = "";
                    this.form.message = "";
                    this.alertMessage = "Messaggio Inviato con successo!";
                })
                .catch((err) => {
                    const { email, message } = err.errors;
                    if (email) this.errors.email = email;
                    if (message) this.errors.message = message;
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
    },
};
</script>
