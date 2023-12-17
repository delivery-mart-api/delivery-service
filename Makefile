setup:
	@make copy-env
	@make build
	@make run
	@make composer-setup
	@make database-migrate
	@echo Setup successful, website running on localhost:8080
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
run:
	docker-compose up -d
copy-env:
	copy .env.example .env
	IF NOT EXIST storage mkdir storage
composer-setup:
	docker exec delivery-service-app-1 bash -c "composer install"
database-setup:
	echo Starting database creation
	docker exec -i delivery-service-database-1 bash -c "sleep 10"
	docker exec -i delivery-service-database-1 mysql -u root -e "CREATE DATABASE delivery;"
	docker exec -i delivery-service-database-1 mysql -u root -e "USE delivery;"
	echo Finished database creation
database-migrate:
	echo Starting database migration
	docker exec -i delivery-service-database-1 bash -c "sleep 10"
	docker exec delivery-service-app-1 bash -c "yes | php spark migrate:refresh"
	echo Finished database migration
	echo Starting database seeding
	echo Finished database seeding