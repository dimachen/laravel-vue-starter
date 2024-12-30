<script setup>
import BaseLayout from "../Layouts/Base.vue"
import { ref } from 'vue'

const features = ref([
    {
        title: 'Удобное управление',
        description: 'Интуитивно понятный интерфейс для эффективной работы с системой',
        icon: 'control'
    },
    {
        title: 'Безопасность',
        description: 'Современные технологии шифрования для защиты ваших данных',
        icon: 'safety'
    },
    {
        title: 'Аналитика',
        description: 'Детальная статистика и отчеты для принятия решений',
        icon: 'bar-chart'
    }
])
</script>

<template>
    <BaseLayout>
        <!-- Hero секция -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <a-typography-title class="hero-title">
                        Добро пожаловать в нашу систему
                    </a-typography-title>
                    <a-typography-paragraph class="hero-description">
                        Профессиональное решение для управления вашим бизнесом.
                        Оптимизируйте процессы и повышайте эффективность работы.
                    </a-typography-paragraph>
                    <div class="hero-buttons">
                        <a-button type="primary" size="large">
                            Начать работу
                        </a-button>
                        <a-button size="large">
                            Узнать больше
                        </a-button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Секция с преимуществами -->
        <section class="features-section">
            <div class="container">
                <a-typography-title level="2" class="section-title">
                    Наши преимущества
                </a-typography-title>

                <div class="features-grid">
                    <div v-for="feature in features" :key="feature.title" class="feature-card">
                        <a-card>
                            <template #cover>
                                <div class="feature-icon">
                                    <a-icon :type="feature.icon" />
                                </div>
                            </template>
                            <a-card-meta :title="feature.title">
                                <template #description>
                                    {{ feature.description }}
                                </template>
                            </a-card-meta>
                        </a-card>
                    </div>
                </div>
            </div>
        </section>

        <!-- Секция с призывом к действию -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <a-typography-title level="2">
                        Готовы начать?
                    </a-typography-title>
                    <a-typography-paragraph>
                        Присоединяйтесь к тысячам компаний, которые уже используют нашу систему
                    </a-typography-paragraph>
                    <a-button type="primary" size="large">
                        Зарегистрироваться
                    </a-button>
                </div>
            </div>
        </section>
    </BaseLayout>
</template>

<style scoped>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Hero секция */
.hero-section {
    padding: 80px 0;
    background-color: #fafafa;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.hero-title {
    font-size: 48px !important;
    margin-bottom: 24px !important;
}

.hero-description {
    font-size: 18px;
    margin-bottom: 32px;
}

.hero-buttons {
    display: flex;
    gap: 16px;
    justify-content: center;
}

/* Секция с преимуществами */
.features-section {
    padding: 80px 0;
}

.section-title {
    text-align: center;
    margin-bottom: 48px !important;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin: 0 auto;
    max-width: 1200px;
}

.feature-card {
    text-align: center;
}

.feature-icon {
    font-size: 36px;
    padding: 24px 0;
    background-color: #fafafa;
}

/* Секция с призывом к действию */
.cta-section {
    padding: 80px 0;
    background-color: #f0f2f5;
}

.cta-content {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
}

/* Медиа-запросы для адаптивности */
@media (max-width: 768px) {
    .hero-section {
        padding: 40px 0;
    }

    .hero-title {
        font-size: 32px !important;
    }

    .hero-description {
        font-size: 16px;
    }

    .features-section,
    .cta-section {
        padding: 40px 0;
    }

    .features-grid {
        grid-template-columns: 1fr;
    }

    .hero-buttons {
        flex-direction: column;
        gap: 12px;
    }

    .container {
        padding: 0 16px;
    }
}
</style>
