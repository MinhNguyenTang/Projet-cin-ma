<?php

if(empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['message'])){
  $error = 'Veuillez remplir les champs';
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
