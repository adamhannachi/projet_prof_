<?php
require_once('../include/init.php');
if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit;
 }

if(!empty($_POST)){
    extract($_POST);

    $valid = (boolean) true;

    if(isset($_POST['submit'])){
       $tete = htmlspecialchars(trim($tete));
       $description=htmlspecialchars(trim($description)) ;
       $destination=htmlspecialchars(trim($destination)) ;
       $prix=htmlspecialchars(trim($prix)) ;
       
     $image_name =  $_FILES['image_name']['name'];
     $image_tmp  =  $_FILES['image_name']['tmp_name'];
     $image_size =  $_FILES['image_name']['size'];
   
   
    if($image_size > 4194304){
          $valid = false;
          $error_image_size = " L'IMAGE NE PEUT PAS ÊTRE PLUS GRAND QUE 4 MG";
    }

     if(empty( $error_image_size)){
      
        $image =rand(0, 100000) .'_' .$image_name;
        move_uploaded_file($image_tmp, "../public/upload/image" . $image_name);

   }

     if($valid){
        $valid = true;

        $valid = true;
        $date_creation= date("Y-m-d H:i:s"); 
             // Récupérer l'id de l'utilisateur qui effectue l'insertion
             // Insérer les données dans la table commentaires avec la jointure utilisateur
             $req = $db->prepare("INSERT INTO product(tete, description, destination, prix, image_name, date_creation)
                                  VALUE(?,?,?,?,?,?)");
             $req->execute(array($tete,  $description, $destination,  $prix, $image_name, $date_creation,));
        
     }
     }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/
     Dwwykc2MPK8M2HN" crossorigin="anonymous">
     
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
   
   
   
   <script defer src="../public/js/main.js"></script>



   <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>

<?php
require 'navbar.php';
?>

<div class="container">
    <div id ="register">
        <h3 class="text-center text-danger pt-5">formulaire d'insertion des annonces</h3>
        <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6"> 
            <div id="login-form" class="col-md-12">




                <form id="login-form" enctype="multipart/form-data" class="form" action="" method="post" >
         <div class="acceuil">
  
          <h2 class="textAnime">isk-vacance</h2>
        </div>
         
                 <h3 class="txt-center txt-info"></h3>
   <div class="d-flex gap-4">
                <div class="form-group">
                    <label class="text-info" for="tete" > Entête</label>
                    <input  id="InputRFirstName" class="form-control w-100 " value="<?php if(isset($tete)){echo $tete;}?>" type="text" name="tete"  placeholder="Entête ">
                 </div>   
            
                <div class="form-group">
                    <label class="text-info ms-5" for="image" > Inserer image </label>
                    <input id="InputRLastName" class="form-control w-100 ms-5" value="<?php if(isset($image_name)){echo $image_name;}?>" type="file" name="image_name" placeholder="Image">
                </div>
    </div>

    <div class="d-flex gap-4">
                <div class="form-group">
                    <label class="text-info" for="description" >Description</label>
                    <input id="InputREmail" class="form-control w-100" type="text" value="<?php if(isset($description)){echo $description;}?>" name="description" placeholder="Description">
                   
                </div>

                <div class="form-group">
                    <label class="text-info" for="destination" >Destination</label>
                    <input id="InputRAdresse" class="form-control w-100" value="<?php if(isset($destination)){echo $destination;}?>" type="text" name="destination" placeholder="Destination">
                </div>

     </div>      

     <div class="d-flex gap-4">
               
                <div class="form-group">
                    <label class="text-info" for="prix" >PRIX</label>
                    <input id="InputREmail" class="form-control w-100" value="<?php if(isset($prix)){echo $prix;}?>" type="number" value="" name="prix" placeholder="PRIX">
                </div>

                <div class="form-group mt-4 w-50 ">
                    <input id="SubmitRegister" class="btn btn-info btn-md w-100 " type="submit" name="submit" value="Insérer">
                </div>
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