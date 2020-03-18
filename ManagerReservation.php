<?php

require 'projet_3_php\Models\model_reservation.php';

class ManagerReservation {

  private $_bdd;

  public function __construct($bdd){
    $this->setBdd($bdd);
  }

  public function getAdd(Reservation $reservation){
    $req = $this->_bdd->prepare('INSERT INTO client_reservation (email, nb_place, code_reduction, paiement) VALUES (:nb_place, :code_reduction, :paiement)');
    $req->bindValue(':email', $reservation->getEmail(), PDO::PARAM_STR);
    $req->bindValue(':nb_place', $reservation->getNbPlace(), PDO::PARAM_INT);
    $req->bindValue(':code_reduction', $reservation->getCodeReduction(), PDO::PARAM_INT);
    $req->bindValue(':paiement', $reservation->getPaiement(), PDO::PARAM_INT);
    $req->execute([
      $reservation->getEmail(),
      $reservation->getNbPlace(),
      $reservation->getCodeReduction(),
      $reduction->getPaiement()
    ]);
  }

  public function getUpdate(Reservation $reservation){
    $req = $this->_bdd->prepare('UPDATE client_reservation SET email = :email, nb_place = :nb_place, code_reduction = :code_reduction, paiement = :paiement');
    $req->bindValue(':email', $reservation->getEmail(), PDO::PARAM_STR);
    $req->bindValue(':nb_place', $reservation->getNbPlace(), PDO::PARAM_INT);
    $req->bindValue(':code_reduction', $reservation->getCodeReduction(), PDO::PARAM_INT);
    $req->bindValue(':paiement', $reservation->getPaiement(), PDO::PARAM_INT);
    $req->execute([
      $reservation->getEmail(),
      $reservation->getNbPlace(),
      $reservation->getCodeReduction(),
      $reservation->getPaiement()
    ]);
  }

  public function getList(Reservation $reservation){
    $req = $this->_bdd->prepare('SELECT id, email FROM connexion WHERE id = :id AND email = :email');
    $req->execute();
    $donnee = $req->fetch();
  }

  public function getDelete(Reservation $reservation){
    $this->_bdd->execute('DELETE FROM client_reservation WHERE id = '.$reservation->id());
  }

  public function setBdd($bdd){
    $this->_bdd = $bdd;
  }
}


 ?>
