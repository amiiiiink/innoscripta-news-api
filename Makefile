up:
	docker compose -f docker-compose.yml up -d

down:
	docker compose -f docker-compose.yml down

restart:
	docker compose -f docker-compose.yml restart

bash:
	docker compose -f docker-compose.yml exec app bash

pint:
	docker compose -f docker-compose.yml exec app ./vendor/bin/pint
