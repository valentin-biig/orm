ORM test library
========================

 ## Overview
 
 * Docker (nginx, php-fpm, mysql, phpmyadmin)
 * Entities (User, Post) with OneToMany association
 * Symfony 3.4
 * Fixtures (doctrine fixtures, alice)
 * Commands (to test the cascade remove)

 ## Install
 
 Create a ` .env ` file with the configuration in ` .env.dist `
 
 ` docker-compose build `
 
 ` docker-compose up -d `
 
 ` docker-compose start `
 
 #### Container
 
 `docker-compose exec php bash `
 
 #### Database
 
 ` bin/console do:da:cr `
 
 ` bin/console da:sc:up --force `
 
 #### Fixtures (optional)
 
 ` bin/console do:fi:lo `
 
 ```yml
 AppBundle\Entity\User:
     Toto:
         name: 'Toto'
 
     Yolo:
         name : 'Yolo'
 ```
 
 ```yml
 AppBundle\Entity\Post:
     Post1:
         label: 'Blabla'
         user: '@Toto'
 
     Post2:
         label: 'Bloublou'
         user: '@Toto'
 
     Post3:
         label: 'Bloblo'
         user: '@Yolo'
 ```
 
 ## Commands to test ORM behaviour
 
 ` bin/console app:user-create `
 
 ` bin/console app:user-delete {id} `
 
 ## Access to PhpMyAdmin
 
 ` localhost:8081 `
 
 ## Configuration
 
 ```php
 class User
 {
     ...
     
     /**
      * @var Collection
      *
      * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="user", cascade={"persist", "remove"})
      */
     private $posts;
     
     ...
  ```
  
  ```php
  class Post
  {
      ...
      
      /**
       * @var User
       *
       * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="posts")
       */
      private $user;
      
      ...
 ``` 