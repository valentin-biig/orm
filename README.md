ORM test library
========================

 ## Install
 
 ` docker-compose build `
 
 ` docker-compose up -d `
 
 ` docker-compose start `
 
 ## Container
 
 `docker-compose exec php bash `
 
 ## Database
 
 ` bin/console do:da:cr `
 
 ` bin/console da:sc:up --force `
 
 ## Fixtures
 
 ` bin/console do:fi:lo `
 
 ## Commands to test ORM behaviour
 
 ` bin/console app:user-create `
 
 ` bin/console app:user-delete {id} `
 
 ## Access to PhpMyAdmin
 
 ` localhost:8081 `