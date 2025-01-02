<script setup>
import BaseLayout from "../../Layouts/Base.vue"
import { Link, useForm } from '@inertiajs/vue3'

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <BaseLayout>
        <section class="login-section">
            <div class="container">
                <div class="header">
                    <a-typography-title class="title">Войти</a-typography-title>
                    <a-typography-text class="text-secondary">
                        Пожалуйста, введите ваши данные для входа.
                    </a-typography-text>
                </div>

                <a-form
                    layout="vertical"
                    required-mark="optional"
                    @submit.prevent="submit"
                    novalidate
                >
                    <a-form-item>
                        <a-input
                            v-model:value="form.email"
                            type="email"
                            placeholder="Email"
                            autocomplete="username"
                        />
                        <div v-if="form.errors.email" class="ant-form-item-explain-error">
                            {{ form.errors.email }}
                        </div>
                    </a-form-item>

                    <a-form-item>
                        <a-input-password
                            v-model:value="form.password"
                            placeholder="Пароль"
                            autocomplete="current-password"
                        />
                        <div v-if="form.errors.password" class="ant-form-item-explain-error">
                            {{ form.errors.password }}
                        </div>
                    </a-form-item>

                    <a-form-item>
                        <div class="flex-between">
                            <a-checkbox v-model:value="form.remember">
                                Запомнить меня
                            </a-checkbox>
                            <Link href="/forgot" class="forgot-password">Забыли пароль?</Link>
                        </div>
                    </a-form-item>

                    <a-form-item class="no-margin">
                        <a-button
                            block
                            type="primary"
                            html-type="submit"
                        >
                            Войти
                        </a-button>
                        <div class="footer">
                            <a-typography-text class="text-secondary">
                                Нет аккаунта?
                            </a-typography-text>
                            <Link href="/register">Зарегистрироваться</Link>
                        </div>
                    </a-form-item>
                </a-form>
            </div>
        </section>
    </BaseLayout>
</template>

<style scoped>
.login-section {
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

.flex-between {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.forgot-password {
    float: right;
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
    .login-section {
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
