<?php
require_once('../include/init.php');
if(!isset($_SESSION['id'])){
    header('location:login.php');exit;}
    if(isset( $_GET["submit"])) { 
        header('location:login.php');exit;}
    
    
    $get_id_product = (int) $_GET['id'];

    if($get_id_product<= 0){
        header("Location:login.php"); exit;}

    $req = $db->prepare( "SELECT * FROM product WHERE id=?" );
    $req->execute([$get_id_product]);
    $req_product = $req->fetch();
   
    

   
/****** */
if(!empty($_POST)){
    extract($_POST);

    $valid = (boolean) true;
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
        $valid = true;

        $image =rand(0, 100000) .'_' .$image_name;
        move_uploaded_file($image_tmp, "../public/upload/image" . $image_name); 
    }

 if(isset($_POST['submit'])){
        
    if($valid && $req_product !== null){
        $valid = true;

        $valid = true;
        $date_creation= date("Y-m-d H:i:s"); 
         // Récupérer l'id de l'utilisateur qui effectue l'insertion
         // Insérer les données dans la table commentaires avec la jointure utilisateur
         $req = $db->prepare("UPDATE product SET tete= ?, description = ?,
          destination= ?, prix= ?, image_name= ?, date_creation =? WHERE id=?");
                            
         $req->execute(array($tete,  $description, $destination,  $prix, $image_name, $date_creation, $req_product['id']));
       
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script defer src="../public/js/main.js"></script>
   <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>

<?php
require 'navbar.php';
?>

<div class="container">
    <div id ="register">
        <h3 class="text-center text-danger pt-5">formulaire de modification des annonces</h3>
        <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6"> 
            <div id="login-form" class="col-md-12">




                <form id="login-form" enctype="multipart/form-data" class="form" action="" method="POST" >
              
                  
         <div class="acceuil">
  
          <h2 class="textAnime">isk-vacance</h2>
        </div>
         
                 <h3 class="txt-center txt-info"></h3>
   <div class="d-flex gap-4">
                <div class="form-group">
                    <label class="text-info" for="tete" > Entête <small class="text-danger"><?php if(isset( $erreur_formulaire)){echo  $erreur_formulaire;}?></small></label>
                    <input  id="InputRFirstName" class="form-control w-100 " value="<?php if(isset($tete)){echo $tete;} else{ echo $req_product['tete'];}?>" type="text" name="tete"  placeholder="Entête ">
                 </div>   
               
            
                <div class="form-group">
                    <label class="text-info ms-5" for="image" > Inserer image  <small class="text-danger"><?php if(isset( $erreur_formulaire)){echo  $erreur_formulaire;}?></small> </label>
                    <input id="InputRLastName" class="form-control w-100 ms-5" value="<?php if(isset($image_name)){echo $image_name;}else{ echo $req_product['image_name'];}?>" type="file" name="image_name" placeholder="Image">
                </div>
    </div>

    <div class="d-flex gap-4">
                <div class="form-group">
                    <label class="text-info" for="description" >Description  <small class="text-danger"><?php if(isset( $erreur_formulaire)){echo  $erreur_formulaire;}?></small></label>
                    <input id="InputREmail" class="form-control w-100" type="text" value="<?php if(isset($description)){echo $description;}else{ echo $req_product['description'];}?>" name="description" placeholder="Description">
                   
                </div>

                <div class="form-group">
                    <label class="text-info" for="destination" >Destination  <small class="text-danger"><?php if(isset( $erreur_formulaire)){echo  $erreur_formulaire;}?></small></label>
                    <input id="InputRAdresse" class="form-control w-100" value="<?php if(isset($destination)){echo $destination;}else{ echo $req_product['destination'];}?>" type="text" name="destination" placeholder="Destination">
                </div>

     </div>      

     <div class="d-flex gap-4">
               
                <div class="form-group">
                    <label class="text-info" for="prix" >PRIX  <small class="text-danger"><?php if(isset( $erreur_formulaire)){echo  $erreur_formulaire;}?></small></label>
                    <input id="InputREmail" class="form-control w-100" value="<?php if(isset($prix)){echo $prix;}else{ echo $req_product['prix'];}?>" type="text" value="" name="prix" placeholder="PRIX">
                </div>

                <div class="form-group mt-4 w-50 ">

                     <button id="SubmitRegister" class="btn btn-info btn-md w-100 " type="submit" name="submit">Modifier les annonces</button>
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