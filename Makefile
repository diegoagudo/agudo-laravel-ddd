help:                 ## Show this help.
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

first-time:           ## Execute the first start of the project
	@docker network create -d bridge agudo-laravel-ddd-network
	@cp -pR ./www/.env.example ./www/.env
	@docker-compose -f ./docker-compose.yml up --build -d
	@docker-compose -f ./docker-compose.yml exec web sh -c 'composer install'
	@echo "Creating and populating tables..."
	@sleep 4 && docker-compose -f ./docker-compose.yml exec web sh -c 'php artisan migrate && php artisan db:seed && php artisan test'

ps:                   ## List all containers
	@docker-compose -f ./docker-compose.yml ps

up:                   ## Up all containers
	@docker-compose -f ./docker-compose.yml up -d

down:                 ## Down all containers
	@docker-compose -f ./docker-compose.yml down