.PHONY: docker_start docker_stop

this_container := $(shell pwd)

docker_start:
	@echo "Starting PHP/Apache container..."
	cd $(this_container) && sudo docker-compose up -d
	@echo
	@echo "----"
	@echo "Webserver running on https://localhost/"
	@echo "----"
	@echo "I'm up to no good..."
	@echo

docker_stop:
	@echo
	@echo "----"
	@echo "Stopping all containers..."
	cd $(this_container) && sudo docker-compose down
	@echo "----"
	@echo "...mischief managed."
	@echo

compile_css:
	@echo
	@echo "----"
	@echo "Creating CSS"
	npx tailwindcss -c ./tailwindcss-config.js -i ./tailwindcss.css -o ./public_html/assets/css/style.min.css --minify
	@echo "----"
	@echo

