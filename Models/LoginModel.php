<?php

class LoginModel
{
     private $valid;  private $error_email;  private $error_password;
   

    public function verification_connexion( $email, $password){
        global $db;

        $email =htmlspecialchars(filter_var($email , FILTER_VALIDATE_EMAIL));  // On supprime les balises html pour sécuriser
        $password =htmlspecialchars(trim($password, PASSWORD_DEFAULT));

        $this->valid = (boolean) true;  //On suppose que la connexion est valide
     

        if(empty( $email)) { $this->valid =false; $this->error_email =' email  ne peut pas être vide';}
        if(empty( $password)) { $this->valid =false; $this->error_password =' password  ne peut pas être vide';}

       if($this->valid){

         $req= $db->prepare("SELECT password  FROM utilisateurs  WHERE email= ?");

            $req->execute(array($email));

            $req= $req->fetch(PDO::FETCH_ASSOC);

            if(isset($req['password'])){

               if(!password_verify($password ,$req['password']) ){
                   $this->valid = false;
                   $this->error_password='Mot de passe incorrect ';
                die();
               }

            }else{ $this->valide= false; $this->error_email='Vérifier votre saisie'; }
        }
      

        if($this->valid){
            $req= $db->prepare("SELECT * FROM utilisateurs  WHERE email= ?");

            $req->execute(array($email));

            $req_user= $req->fetch(PDO::FETCH_ASSOC);

            if(isset($req_user['id'])){
                $date_connexion = date('Y-m-d H:i:s');
           
                $req= $db->prepare("UPDATE utilisateurs  SET date_connexion =? WHERE id=? ");
                $req->execute(array($date_connexion, $req_user['id']));
                $_SESSION[ 'id' ]=$req_user['id'];
                $_SESSION[ 'pseudo' ]=$req_user['pseudo'];
                $_SESSION[ 'email' ]=$req_user['email'];
                $_SESSION[ 'role' ]=$req_user['role'];
               header('location: index.php');
                 exit;

            }else{
                $this->valid = false;  $this->error_email =  'Cet utilisateurs  n\'existe pas' ;

            }
        }
            
           return [$this->error_email, $this->error_password];
    }
}
?>