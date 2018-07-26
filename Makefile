cs:
	vendor/bin/php-cs-fixer fix src/ --using-cache=no --verbose --diff
	vendor/bin/php-cs-fixer fix tests/ --using-cache=no --verbose --diff

