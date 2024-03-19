<?php
require_once('../include/init.php');

 $req_pro = $_Afficher_produit->show_produit();

 if(isset($_GET['id'])){
 
  $_Afficher_produit->Delete_produit();

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
   <script defer src="../public/js/main.js"></script>
   <link rel="stylesheet" href="../public/css/styles.css">
   
</head>
<body>
<?php require 'navbar.php';?>


   <div class="container">
   
   <div class="grid">

    <h2 class="text-success text-center mt-5">Liste des annonces : </h2>
     
    <div class="table-responsive">
     <a id="btncreer" class="btn btn-bark btn-sm" href="creation_product.php"> créer un nouveau annonce</a>
  <!--Table-->
  <table class="table">


    <!--Table head-->
    <thead >
      <tr class="text-center">
        <th class="bg-warning ">#ID</th>
        <th class="th-lg bg-warning">Image</th>
        <th class="th-lg bg-warning">Entête</th>
        <th class="th-lg bg-warning">Description</th>
        <th class="th-lg bg-warning">Destination</th>
        <th class="th-lg bg-warning">Prix</th>
        <th class="th-lg bg-warning">Date de creation</th>
        <th class="th-lg bg-warning">Action</th>
      </tr>
      
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        
<?php  foreach($req_pro as $pr){ ?>
      <tr class="text-center">
        <th scope="row"><?php  echo $pr['id']?></th>
        <td><img style="width:80px" src="<?= '../public/upload/image'. $pr['image_name'] ?>"/></td>
        <td><?php  echo $pr['tete']?></td>
        <td><?php  echo $pr['description']?></td>
        <td><?php  echo $pr['destination']?></td>
        <td class="text-danger"><?php echo $pr['prix']?>€</td>
        <td><?php  echo $pr['date_creation']?></td>
        <td>
        <a class="btn btn-success btn-sm " href="update_product.php?id=<?= $pr['id']?>">MODIFIER</a>
        
        <a class="btn btn-danger btn-sm "  name="delete" href="?id=<?= $pr['id']?>">DELETE</a>
     
      </td>
     
      </tr>
      <?php } ?>
    </tbody>
    <!--Table body-->

  </table>
  <!--Table-->

</div>
 

   </div>

   </div>


<?php require 'footer.php';?>
    
</body>
</html>
