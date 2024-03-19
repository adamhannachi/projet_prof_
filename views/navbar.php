<?php
require_once('../database/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-dark  ">
  <div class="container-fluid ">
    <a class="navbar-brand text-danger ms-5" href="#">ISK-VACANCE</a>
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars bg-white"></i>
    </button>
    <div class="collapse navbar-collapse position-absolute top-2 end-0" id="navbarNav ">
      <ul class="navbar-nav">
       
        <?php if(!isset($_SESSION['id'])){

      ?>
         <li class="nav-item ">
          <a class="nav-link text-light" href="login.php">Connexion</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="register.php">Inscription</a>
        </li>
      <?php
        }else{ ?>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="m_profile.php">Mon profile</a>
        </li>
       
       
         <?php
         if(in_array($_SESSION['role'], [1,2])){?>
        
         <li class="nav-item">
         <a class="nav-link text-light" href="list_produit.php">list annonces</a>
         </li>

         <li class="nav-item">
         <a class="nav-link text-light" href="membres_user.php">Membres</a>
         </li>
         <li class="nav-item">
         <a class="nav-link text-light" href="list_commentaire.php">Commentaires</a>
         </li>


         <?php }?>
      
         <li class="nav-item">
         <a class="nav-link text-light" href="deconnexion.php">Déconnexion</a>
         </li>

      <?php
        }
     
         ?>
        

        <li class="nav-item">
          <a class="nav-link enabled"></a >
        </li>
      </ul>
    </div>
  </div>
</nav>