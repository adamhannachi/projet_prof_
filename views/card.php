<?php

require_once('../include/init.php');

$req_pro = $_Afficher_produit->show_produit();

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
   <link rel="stylesheet" href="../public/css/styl.css">
   <script defer src="../public/js/main.js"></script>

</head>
<body>


<div  id="cardMargin" class="container  ">



  <div class="row row-cols-3 g-3 mt-5">
    
  <?php  foreach($req_pro as $pr){ ?>
  <div class="col">
    <div class="card">
      <img  style="width:412px; height:300px" src="<?= '../public/upload/image'. $pr['image_name'] ?>" class=" card-img-top"
        alt="Hollywood Sign on The Hill" />
      <div class="card-body">
        <h5 class="card-title text-center text-primary fs-1"><?php  echo $pr['tete']?></h5>
        <p id="description" class="card-text"><?php  echo $pr['description']?></p>
        <p id="destination" class="card-text text-success fs-2"><?php  echo $pr['destination']?></p>
        <p id="prix" class="card-text text-danger fs-4 text-center "><?php echo $pr['prix']?><span>€</span></p>
        <button id="btncard" class="btncard  btn-sm"> plus détails</button>


      </div>
    </div>
  </div>
  <?php } ?>
</div>





 <!-- Card -->
 

</div>


</body>
</html>