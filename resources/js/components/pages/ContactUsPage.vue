<template>
    <div id="contact-page">
        <h2 class="text-center my-4">Contact Us</h2>
        <AppLoader v-if="isLoading" />
        <div v-else>
            <AppAlert
                v-if="hasErrors || alertMessage"
                :type="hasErrors ? 'danger' : 'success'"
                :dismissible="true"
                @close="resetAlertAndErrors"
            >
                <ul v-if="hasErrors">
                    <li v-for="(error, key) in errors" :key="key">
                        {{ error }}
                    </li>
                </ul>
                <div v-if="alertMessage">{{ alertMessage }}</div>
            </AppAlert>
            <form @submit.prevent="sendForm" novalidate>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">La tua Email</label>
                    <input
                        type="email"
                        class="form-control"
                        :class="{ 'is-invalid': errors.email }"
                        id="email"
                        v-model.trim="form.email"
                        required
                    />
                    <div v-if="errors.email" class="invalid-feedback">
                        {{ errors.email }}
                    </div>
                </div>
                <!-- Textarea -->
                <div class="form-group">
                    <label for="message">Il tuo Messaggio</label>
                    <textarea
                        class="form-control"
                        :class="{ 'is-invalid': errors.message }"
                        id="message"
                        rows="10"
                        v-model.trim="form.message"
                    ></textarea>
                    <div v-if="errors.message" class="invalid-feedback">
                        {{ errors.message }}
                    </div>
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
        hasErrors() {
            return Object.keys(this.errors).length;
        },
    },
    methods: {
        resetAlertAndErrors() {
            this.errors = {};
            this.alertMessage = null;
        },
        validateForm() {
            const errors = {};

            if (!this.form.email) errors.email = "L'email è obbligatoria";
            if (
                this.form.email &&
                !this.form.email.match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                )
            )
                errors.email = "Il campo Email deve contenere un'email valida";
            if (!this.form.message)
                errors.message = "Il Messaggio è obbligatorio";

            this.errors = errors;
        },
        sendForm() {
            this.errors = {};

            this.validateForm();

            if (!this.hasErrors) this.sendEmail();
        },
        sendEmail() {
            this.isLoading = true;

            axios
                .post("http://localhost:8000/api/contact_us", this.form)
                .then((res) => {
                    if (res.data.errors) {
                        const errors = {};

                        const { email, message } = res.data.errors;
                        if (email) errors.email = email[0];
                        if (message) errors.message = message[0];

                        this.errors = errors;
                    } else {
                        this.form.email = "";
                        this.form.message = "";
                        this.alertMessage = "Messaggio Inviato con successo!";
                    }
                })
                .catch((err) => {
                    this.errors = { http: "Si è verificato un errore" };
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
    },
};
</script>
