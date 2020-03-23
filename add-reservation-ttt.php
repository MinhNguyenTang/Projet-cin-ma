<?php

require 'projet_3_php\Manager\ManagerReservation.php';
require 'projet_3_php\Models\model_reservation.php'

if(empty($_POST['email']) || empty($_POST['nb_place']) || empty($_POST['code_reduction']) || empty($_POST['paiement'])){
  echo 'Veuillez remplir les champs';
}
else{
  $client = new ClientReservation([
    'email' => $_POST['email'],
    'nb_place' => $_POST['nb_place'],
    'code_reduction' => $_POST['code_reduction'],
    'paiement' => $_POST['paiement']
  ]);

  $bdd = new PDO('mysql:host=localhost;dbname=projet_cinema;charset=utf8', 'root', '');
  $manager = new ManagerReservation($bdd);
  $manager->getAdd($reservation);
}


 ?>
