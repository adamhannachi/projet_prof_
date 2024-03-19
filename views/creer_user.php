
<?php
require_once('../include/init.php');
 // si la variable $_SESSION['id']
 if(!isset($_SESSION['id'])) { 
    header('location: /');
     exit;
 }

if(!empty($_POST)){
    extract($_POST);
   
    if(isset($_POST['creationSubmit'])) {

        [$error_pseudo, $error_email, $error_confemail, $error_password,  $error_confpassword,

            ]=$_Register->verification_inscription($pseudo, $email, $confemail, $password, $confpassword, $role);
            header('location:membres_user.php');
            exit;

       }
    }
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
   <link rel="stylesheet" href="../public/css/styles.css">
   <script defer src="../public/js/main.js"></script>
</head>
<body>
    
<?php require 'navbar.php';?>
<div class="container  col-6 ">
    <div class="grid">

      <h3 id="btncreer" class="mt-4 ">Creation d'un utilisateur: </h3><br>
 <form id="login-form"  class="form" action="" method="post">




                <div class="form-group">
                    <label class="text-info" for="pseudo" > Pseudo </label>
                    <input  id="InputRFirstName" class="form-control w-100 " value="<?php if(isset($pseudo)){echo $pseudo;}?>" type="text" name="pseudo"  placeholder="Pseudo ">
                    </div>
                    
                <div class="form-group">
                    <label class="text-info" for="email" >Email  </label>
                    <input id="InputRLastName" class="form-control w-100 " value="<?php if(isset($email)){echo $email;}?>" type="email" name="email" placeholder=" Email">
                </div>
  
 
                <div class="form-group">
                    <label class="text-info" for="confemail" >Confirmation d'email  </label>
                    <input id="InputREmail" class="form-control w-100 " type="email" value="<?php if(isset($confemail)){echo $confemail;}?>" name="confemail" placeholder="Confirmation d'email">
                </div>

                <div class="form-group">
                    <label class="text-info" for="password" >Password  </label>
                    <input id="InputRAdresse" class="form-control w-100 " value="<?php if(isset($password)){echo $password;}?>" type="password" name="password" placeholder="Password">
                </div>
 
               
           
                <div class="form-group">
                    <label class="text-info" for="confpassword" >Confirmation password </label>
                    <input id="InputREmail" class="form-control w-100 " type="password" value="" name="confpassword" placeholder="Confirmation password">
                </div>  
                
                
                <div class="form-group">
                    <label class="text-info" for="role" >Role  </label>
                    <input id="InputRAdresse" class="form-control w-100 " value="<?php if(isset($role)){echo $role;}?>" type="number" name="role" placeholder="Role">
                </div>
                 

                <div class="form-group mt-4 ">
                    <input id="SubmitRegister" class="btn btn-info btn-md w-25 " type="submit" name="creationSubmit" value="creation">
                </div>   
               
         </form>
         

    </div>
</div>



<?php require 'footer.php';?>

   
</body>
</html>


   

