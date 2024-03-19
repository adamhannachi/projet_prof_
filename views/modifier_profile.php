<?php
require_once('../include/init.php');
 if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit;
 }
 //function recupere les donnee

 $req = $db->prepare("SELECT * FROM utilisateurs  WHERE id = ?");
  
      $req->execute([$_SESSION['id']]);

            $req_profile =  $req->fetch( );
  


         if(!empty($_POST)){
        extract($_POST);
   
      if(isset($_POST['modifier1'])) {

        $valid = true;
        $pseudo =htmlspecialchars(trim($pseudo));
        $email =htmlspecialchars(filter_var($email , FILTER_VALIDATE_EMAIL)); 

        if($email == $_SESSION['email'] && $pseudo == $_SESSION['pseudo']){

            $valid = false;

        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && htmlspecialchars($pseudo)){
            $valid= false;
             $error_email = 'Vous devez saisir une adresse email';
             $error_pseudo = 'Vous devez saisir une adresse pseudo';

        }else{
            $req =$db->prepare(" SELECT * FROM utilisateurs  WHERE pseudo =? AND email = ? ");
            $req->execute(array($pseudo,$email));
            $req = $req->fetch();
        

            if(isset($req['id'])){
                $valid = false;
                 $error_pseudo ="Ce pseudo est déja utilisé";
                 $error_email="Cet e-mail est déja utilisé";
            }
           
        }
      
        if($valid){
            $req= $db->prepare("UPDATE utilisateurs  SET pseudo =?, email=? WHERE id=?");
            $req->execute([$pseudo, $email, $_SESSION["id"] ]);
              
            $_SESSION['email'] = 'email';
            $_SESSION['pseudo'] = 'pseudo';
            echo "Modification réussie";
            header('location:modifier_profile.php');
            exit;
        }
        
           
      }elseif (isset($_POST['modifier2'])) {
            

        $oldpassword = (string) trim($oldpassword);
        $password = (string) trim($password);
        $confpassword = (string)trim($confpassword);

        if(!isset($oldpassword)){
            $valid = false;
            $error_password = ' Le mot de passe actuel ne peut pas être vide ';

        }else{

            $req= $db->prepare("SELECT password  FROM utilistauers  WHERE id= ?");

            $req->execute(array($_SESSION['id']));

            $req= $req->fetch(PDO::FETCH_ASSOC);

            if(isset($req['password'])){

               if(!password_verify($oldpassword ,$req['password']) ){
                   $valid = false;
                   $error_password='L\'incien Mot de passe incorrect ';
                die();
               }

            }else{ $valide= false; $error_password='Vérifier votre saisie'; }
        }

        if($valid){
            if(empty( $password)) { $valid =false; $error_password =' password  ne peut pas être vide';}

            elseif($password <> $confpassword ){
               $valid= false;
               $error_password=' Le password doivent correspondre ';
              
            }
        }

        

        if($valid){
            $crypt_password= password_hash($password,  PASSWORD_ARGON2ID);
            $req= $db->prepare("UPDATE utilisateurs SET password =?  WHERE id=?");
            $req->execute([$crypt_password, $_SESSION["id"] ]);
         
              
            header('location:modifier_profile.php');
           exit;
        }


        } 

   }
   if(!isset($pseudo)){ $pseudo= $req_profile['pseudo']; }
   if(!isset($email)){ $email = $req_profile['email']; }
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script defer src="../public/js/main.js"></script>
   <link rel="stylesheet" href="../public/css/styles.css">
   
</head>
<body>
<?php require 'navbar.php';?>

   <h3 class="text-success mt-2 text-center">Modifier le profile</h3>
    <div class="container">
        <div class="grid col-9">
    <h6 class="text-info">Modifier mes informations</h6>        
 <form  method="post">
 <div class="d-flex">
 <div class="form-group w-50 ">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control"  name ="pseudo"   placeholder="Pseudo " value="<?=$pseudo?>" >
    <label for="email">Email </label>
    <input type="email" class="form-control " name ="email"  placeholder=" email" value="<?= $email ?>" >
</div>

  <div class="mt-4">
  <input type="submit"  name="modifier1" value="Modifier" class="btn btn-primary w-100 ms-3">
  </div>
  </div>
  </form>
  


  <form action="" method="post">
  <div class="d-flex">
  <div class="form-group w-50 ">
    <label for="">Password actuel</label>
    <input type="password" class="form-control" name ="oldpassword"   placeholder="Password actuel">
    <label for="">Nouveau Password</label>
    <input type="password" class="form-control" name ="password" placeholder="Nouveau password">
    <label for="">Confirmer nouveau Password</label>
    <input type="password" class="form-control" name ="confpassword"   placeholder="Confirmer password">
  </div>
  <div class="mt-4">
  <input type="submit"  name="modifier2"  class="btn btn-primary w-100 ms-3" value= "modifier" >
  </div>
  </div>
</form>
  
 

     
</div>
    </div>
<?php require 'footer.php';?>
    
</body>
</html>





 

