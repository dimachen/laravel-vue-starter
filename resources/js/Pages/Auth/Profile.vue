<script setup>
import BaseLayout from "../../Layouts/Base.vue"
import { Link, useForm, usePage } from '@inertiajs/vue3'

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    current_password: '',
    password: '',
    password_confirmation: ''
});

const submit = () => {
    // Создаем копию данных формы
    const formData = {};

    // Всегда отправляем name и email
    formData.name = form.name;
    formData.email = form.email;

    // Добавляем поля пароля только если введен новый пароль
    if (form.password) {
        formData.current_password = form.current_password;
        formData.password = form.password;
        formData.password_confirmation = form.password_confirmation;
    }

    form.patch(route('profile.update'), {
        data: formData,
        onFinish: () => form.reset('current_password', 'password', 'password_confirmation'),
    });
};
</script>

<template>
    <BaseLayout>
        <section class="profile-section">
            <div class="container">
                <div class="header">
                    <a-typography-title class="title">Профиль</a-typography-title>
                    <a-typography-text class="text-secondary">
                        Управление настройками вашего профиля
                    </a-typography-text>
                </div>

                <a-form
                    layout="vertical"
                    @submit.prevent="submit"
                    novalidate
                >
                    <a-form-item>
                        <template #label>Имя</template>
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
                        <template #label>Email</template>
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

                    <div class="password-section">
                        <a-typography-title :level="5">Изменение пароля</a-typography-title>

                        <a-form-item>
                            <template #label>Текущий пароль</template>
                            <a-input-password
                                v-model:value="form.current_password"
                                placeholder="Текущий пароль"
                                autocomplete="current-password"
                            />
                            <div v-if="form.errors.current_password" class="ant-form-item-explain-error">
                                {{ form.errors.current_password }}
                            </div>
                        </a-form-item>

                        <a-form-item>
                            <template #label>Новый пароль</template>
                            <a-input-password
                                v-model:value="form.password"
                                placeholder="Новый пароль"
                                autocomplete="new-password"
                            />
                            <div v-if="form.errors.password" class="ant-form-item-explain-error">
                                {{ form.errors.password }}
                            </div>
                        </a-form-item>

                        <a-form-item>
                            <template #label>Подтверждение пароля</template>
                            <a-input-password
                                v-model:value="form.password_confirmation"
                                placeholder="Подтвердите пароль"
                                autocomplete="new-password"
                            />
                        </a-form-item>
                    </div>

                    <a-form-item class="no-margin">
                        <a-button
                            block
                            type="primary"
                            html-type="submit"
                            :loading="form.processing"
                        >
                            Сохранить изменения
                        </a-button>
                    </a-form-item>
                </a-form>
            </div>
        </section>
    </BaseLayout>
</template>

<style scoped>
.profile-section {
    align-items: center;
    display: flex;
    padding: 48px 0;
}

.container {
    margin: 0 auto;
    padding: 24px;
    width: 480px;
}

.header {
    margin-bottom: 24px;
}

.title {
    font-size: 30px;
}

.password-section {
    margin: 32px 0 24px;
}

.no-margin {
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .profile-section {
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
