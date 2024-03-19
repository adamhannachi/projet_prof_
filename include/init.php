<?php
 session_start();

require_once('../database/connexion.php');        require_once('../Models/LoginModel.php');   
require_once('../Models/CommentaireModel.php');   require_once('../Models/CrudAnnonce.php');
require_once('../Models/ProfileModel.php');       require_once('../Models/CrudUserModel.php');
 require_once('../Models/ManagCommentaire.php');   require_once('../Models/RegisterModel.php'); 



$_Register = new  RegisterModel();
$_Login = new LoginModel();
$_Commentaire = new CommentaireModel();
$_Afficher_produit = new CrudAnnonce();
$_Profile = new ProfileModel();
$_Utilistauer = new CrudUserModel();
$_ListCommentaire = new ManagCommentaire();

//$_membres = new  CrudModel();


?>