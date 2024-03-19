<?php

class RegisterModel{

      
      private $valid; private $error_pseudo; private $error_email; private $error_confemail;
      private $error_password;private $error_confpassword;

     public function verification_inscription($pseudo, $email, $confemail, $password, $confpassword){

             global $db;
             $pseudo =htmlspecialchars(trim($pseudo));
             $email =htmlspecialchars(filter_var($email , FILTER_VALIDATE_EMAIL));  // On supprime les balises html pour sécuriser
             $confemail =htmlspecialchars(filter_var($confemail , FILTER_VALIDATE_EMAIL)); 
             $password =htmlspecialchars(trim($password, PASSWORD_DEFAULT));
             $confpassword =htmlspecialchars(trim($confpassword, PASSWORD_DEFAULT));

             $this->valid = (boolean) true;

             
             [$this->error_pseudo]=$this->verification_pseudo($pseudo); // function verification pseudo

             [ $this->error_email, $this->error_confemail]=$this->verification_email($email,$confemail); // function verification pseudo

             [$this->error_password, $this->error_confpassword]= $this->verification_password($password,$confpassword);


             if($this->valid){
                 //$crypt_password = crypt($password, '$6$rounds=1000000$NJy4rIPjpOaU$0ACEYGg/');
                 $crypt_password= password_hash($password,  PASSWORD_ARGON2ID);
                 $date_creation = date('Y-m-d H:i:s');
                
               $req= $db->prepare("INSERT INTO utilisateurs ( pseudo, email, password, date_creation, date_connexion)VALUES (?,?,?,?,?)");
               $req->execute(array($pseudo,$email, $crypt_password, $date_creation ,$date_creation  ));
               header('location: login.php');
              
             }else{echo 'non valider'; }

               return [$this->error_pseudo, $this->error_email, $this->error_confemail, $this->error_password, $this->error_confpassword];
           }


         public function verification_pseudo($pseudo){
               global $db;
            if(empty( $pseudo)) { $this->valid =false; $this->error_pseudo =' Pseudo  ne peut pas être vide'; }else{
                $req= $db->prepare("SELECT id FROM  utilisateurs   WHERE pseudo = ?");
                $req->execute(array($pseudo));
                $req= $req->fetch(PDO::FETCH_ASSOC);

                if(isset($req['id'])){ $this->valid= false; $this->error_pseudo=" Ce pseudo est déjà utilisé";}
               
            } 
            return [$this->error_pseudo];
        } 
       
           // function verification email
           public function verification_email($email, $confemail){
           
            global $db;
            if(empty( $email)) { $this->valid =false; $this->error_email =' email  ne peut pas être vide';}
            elseif($email <> $confemail ){
               $this->valid= false;
               $this->error_email=' L\'email doivent correspondre ';
              
            }else{
               $req= $db->prepare("SELECT id FROM utilisateurs   WHERE email= ?");
               $req->execute(array($email));
               $req= $req->fetch(PDO::FETCH_ASSOC);

               if(isset($req['id'])){
                   $this->valid= false;
                   $this->error_email=" Ce email est déjà utilisé";
               }
           }
        
           if(empty( $confemail)) { $this->valid =false;  $this->error_confemail =' confirmation d\'email  ne peut pas être vide';}
             
           return [$this->error_email ,  $this->error_confemail];
    
           }


           //function verification  password

           public function verification_password($password, $confpassword){
            global $db;

            if(empty( $password)) { $this->valid =false; $this->error_password =' password  ne peut pas être vide';}
            elseif($password <> $confpassword ){
               $this->valid= false;
               $this->error_password=' Le password doivent correspondre ';
              
            } else{
               $req= $db->prepare("SELECT id FROM  utilisateurs   WHERE password = ?");
               $req->execute(array($password));
               $req= $req->fetch(PDO::FETCH_ASSOC);

               if(isset($req['id'])){
                   $this->valid= false;
                   $this->error_password=" Ce password est déjà utilisé";
               }
           }

           if(empty( $confpassword)) { $this->valid =false; $this->error_confpassword =' confirmation password  ne peut pas être vide';}

           return [$this->error_password ,  $this->error_confpassword];
    
           }
           
           
          
}
?>