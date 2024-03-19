<?php
require_once('../include/init.php');

//$_membres->show_utilisateurs(); 	// afficher les informations de l'utilisateur

$req = $db->prepare('SELECT * FROM product ');
$req->execute();
$req_pro =  $req->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
   integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
   crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script defer src="../public/js/main.js"></script>
   <link rel="stylesheet" href="../public/css/styl.css">

  
   <!----><script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" 
   integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</head>
<body>

    <div class="container">
        <div class="row">
        <div class="col">

        <div class="lignes">
            <div class="l1 text-danger"> Commencer votre rêve </div>
            <div class="l2 text-danger"> chez ISK-vacance</div>
        </div>

        <div class="container-first">
            <h1>
                <span class="span">You </span> <span class="span">Need </span> <span class="span">some </span> <span class="span">rest </span>   
            </h1>
        <div class="btn">
            <button class="btn-first b1">Discover</button>
            <button class="btn-first b2">Contact</button>
        </div>

        <img src="../public/image/log.webp" alt="" class="log">
        <ul class="medias">
            <li>
               <li class="bull"><img src="../public/image/facebook.svg" alt="" class="logo-midias"></li>
               <li class="bull"><img src="../public/image/github.svg" alt="" class="logo-midias"></li>
               <li class="bull"><img src="../public/image/youtube.svg" alt="" class="logo-midias"></li>
               <li class="bull"><img src="../public/image/instagram.svg" alt="" class="logo-midias"></li>
            </li>
        </ul>

        </div>
        </div>
    </div>

<!--<?php //require 'footer.php';?>-->


</body>
</html>