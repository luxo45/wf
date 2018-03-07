<?php

spl_autoload_register(
    function($namespace){
        $filename = sprintf('%s/src/%s.php',__DIR__,str_replace('\\', '/', $classname));
        
        if(is_file($filename)){
            require_once $filename;
            
        }
    }
);
// model\User, person and role are in src, model

use Model\Role;
use Model\User;
use Model\person;

$user = new User(); //create a new user
$role = new Role(Role::Role_User);

$user->setPassword('myPassword')
       ->setRoles([$role])
       ->setSalt ('mySalt')
       ->setUsername('myUsername');

$person = new Person();
$person->setFirstname('Eric')
      ->setLastname('Montecalvo')
      ->setEmails(['eric.montecalvo@example.org']);

       