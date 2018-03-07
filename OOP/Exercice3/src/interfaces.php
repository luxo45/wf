<?php

//I want an interface that is a child of countable and ArrayAccess
//I want a class implementing this interfaces

interface ArrayInterface extends ArrayAccess, Countable //dans l'interface, on va retrouver tout ce qu'il y a dans arrayaccess et count, on ne doit pas l'écrire
//se mettre sur le mot ctrl + click droit pour voir ce qu'il y a
{
    abstract public function count();
   
    abstract public function offsetExists ($offset);

    abstract public function offsetGet ($offset);
  
    abstract public function offsetSet ($offset, $value);
  
    abstract public function offsetUnset ($offset);
    
}

class ArrayElement implements ArrayInterface
{
    private $internal = [];
    public function offsetGet($offset){
        return $this->internal[$offset];
    }
    public function offsetSet($offset, $value){
        $this->internal[$offset] = $value;
    }
    public function offsetExist($offset){
        return isset($this->internal[$offset]);
    }
    public function offsetUnset($offset){
        unset($this->internal[$offset]);
    }
    public function count(){
        return count($this->internal);
    }
}

$array = new ArrayElement();
$array->offsetSet(1,2);
echo count($array);//1

interface UserInterface {
    public function getId();
    public function getRoles();
    public function getPassword();
    public function getSalt();
    public function getUsername();
    public function setRoles(array $roles);
    public function addRoles(Role $role);
    public function setPassword($password);
    public function setSalt ($salt);
    public function setUsername($username);
    public function eraseCredentials();
    
    
    
}