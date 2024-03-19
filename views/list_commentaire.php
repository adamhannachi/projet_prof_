<?php
require_once('../include/init.php');


 //$_membres->show_utilisateurs(); 	// afficher les informations de l'utilisateur
 
 $req_commentaire =$_ListCommentaire->showlistcommentaire();



 if(isset($_GET['id'])){
 
  $req_delete = $_ListCommentaire-> Deletecommentaire();
  
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

    <h2 class="text-success text-center mt-5">Boite de commentaires : </h2>
     
    <div class="table-responsive">

  <!--Table-->
  <table class="table">


    <!--Table head-->
    <thead >
      <tr class="text-center">
        <th class="bg-warning ">#ID</th>
        <th class="th-lg bg-warning">Titre</th>
        <th class="th-lg bg-warning">Contenue</th>
        <th class="th-lg bg-warning">Nom d'utilisateur</th>
        <th class="th-lg bg-warning">Date de connexion</th>
        <th class="th-lg bg-warning">Action</th>
       
      </tr>
      
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        
<?php  foreach( $req_commentaire as $commentaire){ ?>
      <tr class="text-center">
        <th scope="row"><?php  echo $commentaire['id']?></th>
        <td><?php  echo $commentaire['titre']?></td>
        <td><?php  echo $commentaire['contenue']?></td>
        <td><a href="membres_user.php?id=<?= $commentaire['id']?>"><?php  echo $commentaire['pseudo']?></a></td>
        <td><?php  echo $commentaire['date_connexion']?></td>

        <td>
        
        <a class="btn btn-danger btn-sm "  name="delete" href="?id=<?= $commentaire['id']?>">DELETE</a>
     
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
