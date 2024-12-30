<script setup>
import BaseLayout from "../../Layouts/Base.vue"
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3';

const formState = ref({
    email: '',
    password: '',
    confirmPassword: '',
    name: '',
    agreement: false
})
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
                    ref="formRef"
                    :model="formState"
                    layout="vertical"
                    required-mark="optional"
                >
                    <a-form-item
                        name="name"
                        :rules="[{ required: true, message: 'Введите ваше имя' }]"
                    >
                        <a-input
                            v-model:value="formState.name"
                            placeholder="Имя"
                            autocomplete="name"
                        />
                    </a-form-item>

                    <a-form-item
                        name="email"
                        :rules="[{ required: true, type: 'email', message: 'Введите корректный email' }]"
                    >
                        <a-input
                            v-model:value="formState.email"
                            type="email"
                            placeholder="Email"
                            autocomplete="username"
                        />
                    </a-form-item>

                    <a-form-item
                        name="password"
                        :rules="[
                        { required: true, message: 'Введите пароль' },
                        { min: 8, message: 'Пароль должен содержать минимум 8 символов' }
                    ]"
                    >
                        <a-input-password
                            v-model:value="formState.password"
                            placeholder="Пароль"
                            autocomplete="new-password"
                        />
                    </a-form-item>

                    <a-form-item
                        name="confirmPassword"
                        :rules="[
                        { required: true, message: 'Подтвердите пароль' },
                        { validator: validateConfirmPassword }
                    ]"
                    >
                        <a-input-password
                            v-model:value="formState.confirmPassword"
                            placeholder="Подтвердите пароль"
                            autocomplete="new-password"
                        />
                    </a-form-item>

<!--                    <a-form-item-->
<!--                        name="agreement"-->
<!--                        :rules="[{-->
<!--                        validator: (rule, value) => value-->
<!--                            ? Promise.resolve()-->
<!--                            : Promise.reject('Необходимо принять условия'),-->
<!--                    }]"-->
<!--                    >-->
<!--                        <a-checkbox v-model:checked="formState.agreement">-->
<!--                            Я согласен с <a-typography-link href="">условиями использования</a-typography-link>-->
<!--                        </a-checkbox>-->
<!--                    </a-form-item>-->

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
