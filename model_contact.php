<?php

class MembreContact{

protected $id;
protected $nom;
protected $email;
protected $message;

public function __construct(array $donnees){
  $this->hydrate($donnees);
}

public function hydrate(array $donnees){
  foreach($donnees as $key => $value){
    $method = 'set'.ucfirst($key);

    if(method_exists($this, $method)){
      $this->$method($value);
    }
  }
}

public function getId() {return $this->id;}
public function getNom() {return $this->nom;}
public function getEmail() {return $this->email;}
public function getMessage() {return $this->message;}


public function setId($id){
  if ($id > 0 && $id < 5){
    trigger_error('L\'id du client doit être un entier', E_USER_WARNING);
    return;
  }
  $this->id = $id;
}

public function setNom($nom){
  if(is_str($nom) && strlen($nom)<=255){
    trigger_error('Le nom doit être une chaine de caractère', E_USER_WARNING);
    return;
  }
  $this->nom = $nom;
}

public function setEmail($email){
  if(is_str($email) && strlen($email)<=255){
    trigger_error('L\'email ne doit pas dépasser 255 caractères', E_USER_WARNING);
    return;
  }
  $this->email = $email;
}

public function setMessage($message){
  $this->message = $message;
}

}
 ?>
