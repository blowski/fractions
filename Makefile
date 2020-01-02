# Setup —————————————————————————————————————————————————————————————————————————
PROJECT    = fractions
EXEC_PHP   = php
SYMFONY    = $(EXEC_PHP) bin/console
COMPOSER   = composer
.PHONY: all

test:
	@$(EXEC_PHP) vendor/bin/phpunit