# Laravel + Inertia + Vue Стартовый шаблон

Базовый шаблон для быстрого старта разработки веб-приложений на стеке Laravel + Inertia + Vue.

## Требования

- PHP 8.1+
- Node.js 18+
- Composer 2+
- MySQL 8.0+

## Функционал

- Аутентификация пользователей
    - Вход
    - Регистрация
    - Восстановление пароля
    - Профиль пользователя
- Базовый UI
    - Адаптивная верстка
    - Шапка сайта
    - Футер
    - Главная страница

## Установка

1. Клонируйте репозиторий:
```bash
git clone <repository-url>
cd <project-name>
\```

2. Установите PHP зависимости:
\```bash
composer install
\```

3. Установите JavaScript зависимости:
\```bash
npm install
\```

4. Скопируйте файл конфигурации:
\```bash
cp .env.example .env
\```

5. Сгенерируйте ключ приложения:
\```bash
php artisan key:generate
\```

6. Настройте подключение к базе данных в файле .env:
\```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
\```

7. Выполните миграции:
\```bash
php artisan migrate
\```

## Разработка

1. Запустите сервер разработки Laravel:
\```bash
php artisan serve
\```

2. Запустите сборку фронтенда:
\```bash
npm run dev
\```

## Структура проекта

\```
├── app/                # PHP код приложения
├── resources/         
│   ├── js/            # Vue компоненты и логика
│   │   ├── Components # Общие компоненты
│   │   ├── Layouts    # Шаблоны страниц
│   │   ├── Pages      # Страницы приложения
│   ├── views/         # Blade шаблоны
├── routes/            # Маршруты приложения
└── database/          # Миграции и сиды
\```

## Деплой

1. Установите зависимости для продакшена:
\```bash
composer install --no-dev
npm ci
\```

2. Скомпилируйте фронтенд:
\```bash
npm run build
\```

3. Настройте веб-сервер на папку public/

## Лицензия

MIT

## Поддержка

При возникновении проблем создавайте issue в репозитории проекта.
