ORM test library
========================

 ## Overview
 
 * Docker (nginx, php-fpm, mysql, phpmyadmin)
 * Entities (User, Post) with OneToMany association
 * Fixtures (doctrine fixtures, alice)
 * Commands (to test the cascade remove)

 ## Install
 
 ` docker-compose build `
 
 ` docker-compose up -d `
 
 ` docker-compose start `
 
 #### Container
 
 `docker-compose exec php bash `
 
 #### Database
 
 ` bin/console do:da:cr `
 
 ` bin/console da:sc:up --force `
 
 #### Fixtures
 
 ` bin/console do:fi:lo `
 
 ## Commands to test ORM behaviour
 
 ` bin/console app:user-create `
 
 ` bin/console app:user-delete {id} `
 
 ## Access to PhpMyAdmin
 
 ` localhost:8081 `
 
 ## Configuration
 
 ```
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
  
  ```
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