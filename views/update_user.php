
<?php
require_once('../include/init.php');
//admin

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
    


<?php
require 'navbar.php';
?>

<div class="container">
    <div id ="register">
    <h4 class ="marque "> VOYAGE ISK-VACANCE</h4> 
        <h3 class="text-center text-danger pt-5">Register Form</h3>
        <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6"> 
            <div id="login-form" class="col-md-12">
                <form id="login-form"  class="form" action="" method="post">


         <!-- partie animation text en javascript et icons de reseau de m site --> 
    
         
         <div class="acceuil">

<h2 class="textAnime">isk-vacance</h2>

         
                 <h3 class="txt-center txt-info">Modifier les utilisateur</h3>

                <div class="form-group">

        
                    <label class="text-info" for="pseudo" > Pseudo <small class="text-danger"><?php if(isset($error_pseudo)){echo $error_pseudo;}?></small></label>
                    <input  id="InputRFirstName" class="form-control w-75 " value="<?php if(isset($pseudo)){echo $pseudo;}?>" type="text" name="pseudo"  placeholder="Pseudo ">
                   <p id="error"></p> 
                    
                </p>

                <div class="form-group">
                    <label class="text-info" for="email" >Email <small class="text-danger"><?php if(isset($error_email)){echo $error_email;}?></small> </label>
                    <input id="InputRLastName" class="form-control w-75" value="<?php if(isset($email)){echo $email;}?>" type="email" name="email" placeholder=" Email">
                </div>

                <div class="form-group">
                    <label class="text-info" for="confemail" >Confirmation d'email <small class="text-danger"><?php if(isset($error_confemail)){echo $error_confemail;}?></small> </label>
                    <input id="InputREmail" class="form-control w-75" type="email" value="<?php if(isset($confemail)){echo $confemail;}?>" name="confemail" placeholder="Confirmation d'email">
                   
                </div>

                <div class="form-group">
                    <label class="text-info" for="password" >Password  <small class="text-danger"><?php if(isset($error_password)){echo $error_password;}?></small></label>
                    <input id="InputRAdresse" class="form-control w-75" value="<?php if(isset($password)){echo $password;}?>" type="password" name="password" placeholder="password">
                </div>
               
                <div class="form-group">
                    <label class="text-info" for="confpassword" >Confirmation password <small class="text-danger"><?php if(isset($error_confpassword)){echo $error_confpassword;}?></small></label>
                    <input id="InputREmail" class="form-control w-75" type="password" value="" name="confpassword" placeholder="Confirmation password">
                </div>

                <div class="form-group mt-3 ">
                    <input id="SubmitRegister" class="btn btn-info btn-md" type="submit" name="RegisterSubmit" value="Inscription">
                </div>

                <div id="redirection_link" class="text-right">
                    <a href="" class="txt-info text-dark ">Login here</a>
                </div>
                </form>
            </div>
        </div>

      </div>
      </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>
</html>


   