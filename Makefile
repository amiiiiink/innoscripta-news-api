up:
	docker compose -f docker-compose.yml up -d

down:
	docker compose -f docker-compose.yml down

restart:
	docker compose -f docker-compose.yml restart

bash:
	docker compose -f docker-compose.yml exec laravel_app_innoscripta bash


