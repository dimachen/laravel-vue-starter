serve: ## Запустить локальный сервер разработки
	php artisan serve

cache-clear: ## Очистить только кеш приложения
	php artisan cache:clear

migrate: ## Запустить миграции
	php artisan migrate

install: ## Установить зависимости проекта
	composer install
	npm install
	cp .env.example .env
	php artisan key:generate
