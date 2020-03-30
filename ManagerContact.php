<?php

class ManagerContact {

  private $bdd;

  public function __construct($bdd){
    $this->setBdd($bdd);
  }

  public function getAdd(Contact $form){
    $req = $this->_bdd->prepare('INSERT INTO contact (nom, email, message) VALUES (:nom, :email, :message)');
    $req->bindValue(':nom', $form->getNom(), PDO::PARAM_STR);
    $req->bindValue(':email', $form->getEmail(), PDO::PARAM_STR);
    $req->bindValue(':message', $form->getMessage(), PDO::PARAM_STR);
    $req->execute([
      $form->getNom(),
      $form->getEmail(),
      $form->getMessage()
    ]);
  }

  public function getSelect(Contact $form){
    $req = $this->_bdd->prepare('SELECT nom FROM contact WHERE nom = :nom');
    $req->execute();
    $donnee = $req->fetch();
  }

  public function getList(Contact $form){
    $req = $this->_bdd->prepare('SELECT nom, email, message FROM contact ORDER BY id');
  }

  public function getDelete(Contact $form){
    $this->$this->_bdd->prepare('DELETE * FROM contact WHERE id = '.$form->id());
  }

  public function setBdd($bdd){
    $this->_bdd = $bdd;
  }
}


 ?>
