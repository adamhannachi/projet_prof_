<?php
require_once('../include/init.php');

 if(isset($_SESSION['id'])) { // si la variable $_SESSION['id']
    header('location: /');
    exit;}

     
if(!empty($_POST)){
 extract($_POST);


    if(isset($_POST['LoginSubmit'])) {
        
        [ $error_email, $error_password
               ]= $_Login->verification_connexion($email , $password);// class de connexion
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
   <link rel="stylesheet" href="../public/css/style.css"> 
   <script defer src="../public/js/main.js"></script>
</head>
<body>
    
</body>
</html>
<?php
require 'navbar.php';
?>
<div class="container">
    
    <div id = "login" >
       <h4 class ="marque ">VOYAGE ISK-VACANCE</h4> 
        <h3 id ="login-form"  class="text-center text-danger pt-5">Login Form</h3>
        <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6"> 
            <div id="login-form" class="col-md-12">

                <form id="login-form"  class="form" action="" method="post">
          <!-- partie animation text en javascript et icons de reseau de m site --> 
    
         
<div class="acceuil">

<h2 class="textAnime">isk-vacance</h2>

<h4 class="textPAnime">vacance en tout tranquillité</h4>

<div class="reseauSocieux">
<div class="text-center md-2"><a href="" class="linkR">isk_vacance_fr@gmail.com</a><img src="../public/image/facebook.png" class="imgRs"></div>
<div class="text-center md-2"><a href="" class="linkR">isk_vacance_fr.twitter.com</a><img src="../public/image/twitter.png" class="imgRs"></div>
</div>
</div>

             <div> 
                 <h3 class="txt-center txt-info">LOGIN</h3>

                <div class="form-group">
                    <label class="text-info" for="email" >Email</label>
                    <input class="form-control w-75" type="email" name="email" placeholder="Email">
                </div>
               

                <div class="form-group">
                    <label class="text-info" for="password" >Password</label>
                    <input class="form-control w-75" type="password" name="password" placeholder="password">
                </div>

                <div class="form-group mt-3 ">
                    <input class="btn btn-info btn-md" type="submit" name="LoginSubmit" value="connexion">
                </div>

                <div id="redirection_link" class="text-right">
                    <a href="" class="txt-info  text-dark">Register here!</a>
                </div>
            
                </form>
            </div>
        </div>

      </div>
        </div>
        </div>
    </div>

    <?php

require 'footer.php';

?>
    </body>
</html>