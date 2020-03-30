<?php

if(empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['message'])){
  $error = 'Veuillez remplir les champs';
}
if(empty($_POST['nom'])){
  $error = 'Veuillez indiquer votre nom';
}
if(empty($_POST['email'])){
  $error = 'Veuillez indiquer votre adresse e-mail';
}
if(empty($_POST['message'])){
  $error = 'Veuillez indiquer un message';
}
else{
  $contact = new MembreContact([
    'nom' => $_POST['nom'],
    'email' => $_POST['email'],
    'message' => $_POST['message']
  ]);

  $bdd = new PDO('mysql:host=localhost;dbname=projet_cinema;charset=utf8', 'root', '');
  $manager = new ManagerContact($bdd);
  $manager->getAdd($form);
}

 ?>
