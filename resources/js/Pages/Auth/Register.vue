<script setup>
import BaseLayout from "../../Layouts/Base.vue"
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    agreement: false
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <BaseLayout>
        <section class="register-section">
            <div class="container">
                <div class="header">
                    <a-typography-title class="title">Регистрация</a-typography-title>
                    <a-typography-text class="text-secondary">
                        Пожалуйста, заполните форму для создания аккаунта.
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
                            v-model:value="form.name"
                            placeholder="Имя"
                            autocomplete="name"
                        />
                        <div v-if="form.errors.name" class="ant-form-item-explain-error">
                            {{ form.errors.name }}
                        </div>
                    </a-form-item>

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
                            autocomplete="new-password"
                        />
                        <div v-if="form.errors.password" class="ant-form-item-explain-error">
                            {{ form.errors.password }}
                        </div>
                    </a-form-item>

                    <a-form-item>
                        <a-input-password
                            v-model:value="form.password_confirmation"
                            placeholder="Подтвердите пароль"
                            autocomplete="new-password"
                        />
                        <div v-if="form.errors.password_confirmation" class="ant-form-item-explain-error">
                            {{ form.errors.password_confirmation }}
                        </div>
                    </a-form-item>

                    <a-form-item>
                        <a-checkbox v-model:value="form.agreement">
                            Я согласен с <a-typography-link href="">условиями использования</a-typography-link>
                        </a-checkbox>
                        <div v-if="form.errors.agreement" class="ant-form-item-explain-error">
                            {{ form.errors.agreement }}
                        </div>
                    </a-form-item>

                    <a-form-item class="no-margin">
                        <a-button
                            block
                            type="primary"
                            html-type="submit"
                        >
                            Создать аккаунт
                        </a-button>
                        <div class="footer">
                            <a-typography-text class="text-secondary">
                                Уже есть аккаунт?
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
.register-section {
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
    .register-section {
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
