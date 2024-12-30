<script setup>
import BaseLayout from "../../Layouts/Base.vue"
import {ref} from 'vue'
import { Link } from '@inertiajs/vue3';

const formState = ref({
    email: ''
})
</script>

<template>
    <BaseLayout>
        <section class="forgot-password-section">
            <div class="container">
                <div class="header">
                    <a-typography-title class="title">Восстановление пароля</a-typography-title>
                    <a-typography-text class="text-secondary">
                        Введите email, указанный при регистрации. Мы отправим вам инструкции по восстановлению пароля.
                    </a-typography-text>
                </div>

                <a-form
                    ref="formRef"
                    :model="formState"
                    layout="vertical"
                    required-mark="optional"
                >
                    <a-form-item
                        name="email"
                        :rules="[{ required: true, type: 'email', message: 'Введите ваш email' }]"
                    >
                        <a-input
                            v-model:value="formState.email"
                            type="email"
                            placeholder="Email"
                            autocomplete="username"
                        />
                    </a-form-item>

                    <a-form-item class="no-margin">
                        <a-button
                            block
                            type="primary"
                            html-type="submit"
                        >
                            Отправить инструкции
                        </a-button>
                        <div class="footer">
                            <a-typography-text class="text-secondary">
                                Вспомнили пароль?
                            </a-typography-text>
                            <Link href="/login">Войти</Link>
                        </div>
                    </a-form-item>
                </a-form>
            </div>
        </section>
    </BaseLayout>
</template>

<style scoped>
.forgot-password-section {
    align-items: center;
    display: flex;
    padding: 48px 0;
}

.container {
    margin: 0 auto;
    padding: 24px;
    width: 380px;
}

.header {
    margin-bottom: 24px;
}

.title {
    font-size: 30px;
}

.footer {
    margin-top: 16px;
    text-align: center;
    width: 100%;
}

.no-margin {
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .forgot-password-section {
        padding: 0;
    }

    .container {
        padding: 48px 16px;
    }

    .title {
        font-size: 24px;
    }
}
</style>
