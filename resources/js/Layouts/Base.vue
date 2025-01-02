<script setup>
import {Layout} from 'ant-design-vue'
import {ref} from 'vue'
import {MenuUnfoldOutlined, MenuFoldOutlined, UserOutlined} from '@ant-design/icons-vue'
import {Link, usePage, router} from '@inertiajs/vue3'

const {Header, Footer, Content} = Layout
const collapsed = ref(false)

const toggleCollapsed = () => {
    collapsed.value = !collapsed.value
}

const user = usePage().props.auth.user; // Получаем данные пользователя из Inertia

const logout = () => {
    router.post('/logout')
}

</script>

<template>
    <a-layout class="layout">
        <a-layout-header class="header">
            <div class="header-content">
                <div class="logo">
                    <a href="/">
                        <svg
                            viewBox="0 0 100 32"
                            width="100"
                            height="32"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M16 0L32 16L16 32L0 16L16 0Z"
                                fill="#1890ff"
                            />
                            <path
                                d="M16 6L26 16L16 26L6 16L16 6Z"
                                fill="white"
                            />
                            <text
                                x="40"
                                y="22"
                                fill="#000"
                                font-family="Arial"
                                font-size="18"
                                font-weight="bold"
                            >
                                LOGO
                            </text>
                        </svg>
                    </a>
                </div>

                <!-- Десктопное меню -->
                <a-menu
                    v-if="!collapsed"
                    mode="horizontal"
                    :selected-keys="['1']"
                    class="menu desktop-menu"
                >
                    <a-menu-item key="1">Главная</a-menu-item>
                </a-menu>

                <!-- Кнопка бургер-меню -->
                <div class="mobile-menu-trigger">
                    <a-button type="text" @click="toggleCollapsed">
                        <menu-unfold-outlined v-if="collapsed"/>
                        <menu-fold-outlined v-else/>
                    </a-button>
                </div>

                <div class="auth-buttons desktop-only">
                    <template v-if="user">
                        <a-dropdown>
                            <a class="user-dropdown-link" @click.prevent>
                                <a-space>
                                    <UserOutlined/>
                                    {{ user.name }}
                                </a-space>
                            </a>
                            <template #overlay>
                                <a-menu>
                                    <a-menu-item key="profile">
                                        <Link href="/profile">Профиль</Link>
                                    </a-menu-item>
                                    <a-menu-item key="logout" @click="logout">
                                        Выйти
                                    </a-menu-item>
                                </a-menu>
                            </template>
                        </a-dropdown>
                    </template>
                    <template v-else>
                        <Link href="/login">
                            <a-button type="link" class="login-btn">Войти</a-button>
                        </Link>
                        <Link href="/register">
                            <a-button type="primary">Регистрация</a-button>
                        </Link>
                    </template>
                </div>

                <!-- Мобильное меню -->
                <a-drawer
                    v-model:visible="collapsed"
                    placement="left"
                    :closable="false"
                    class="mobile-menu-drawer"
                >
                    <a-menu
                        mode="inline"
                        :selected-keys="['1']"
                        class="mobile-menu"
                    >
                        <a-menu-item key="1">Главная</a-menu-item>
                        <a-menu-item key="mobile-login">
                            <a-button type="link" block>Войти</a-button>
                        </a-menu-item>
                        <a-menu-item key="mobile-register">
                            <a-button type="primary" block>Регистрация</a-button>
                        </a-menu-item>
                    </a-menu>
                </a-drawer>
            </div>
        </a-layout-header>

        <a-layout-content class="content">
            <slot/>
        </a-layout-content>

        <a-layout-footer class="footer">
            <div class="copyright">
                <a-typography-text>© 2024 Company Name. Все права защищены.</a-typography-text>
            </div>
        </a-layout-footer>
    </a-layout>
</template>

<style scoped>
.layout {
    min-height: 100vh;
    background: #fff !important;
}

.header {
    position: fixed;
    width: 100%;
    z-index: 1;
    padding: 0;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

.header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    align-items: center;
}

.logo {
    margin-right: 48px;
}

.logo a {
    display: flex;
}

.menu {
    flex: 1;
    border: none;
}

.mobile-menu-trigger {
    display: none;
}

.content {
    margin-top: 64px;
    min-height: calc(100vh - 64px - 240px);
}

.footer {
    background: #f5f5f5;
    padding: 24px 0 24px;
}

.copyright {
    text-align: center;
}

.auth-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
}

@media (min-width: 769px) {
    .desktop-only {
        display: flex !important;
    }
}

.login-btn {
    padding: 4px 15px;
}

@media (max-width: 768px) {
    .header-content {
        padding: 0 16px;
    }

    .logo {
        margin-right: 24px;
    }

    .desktop-menu {
        display: none;
    }

    .mobile-menu-trigger {
        display: block;
        margin-left: auto;
    }

    .desktop-only {
        display: none;
    }

    .auth-buttons {
        gap: 4px;
    }

    .auth-buttons .ant-btn {
        padding: 4px 12px;
        font-size: 14px;
    }

    .footer {
        padding: 16px 0 16px;
    }
}

/* Стили для мобильного меню в drawer */
:deep(.mobile-menu-drawer .ant-drawer-body) {
    padding: 0;
}

:deep(.mobile-menu .ant-menu-item) {
    height: auto;
    line-height: 1.5;
    padding: 12px 16px;
}
</style>
