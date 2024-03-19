<?php
require_once('../include/init.php');
 if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit;
 }
 [$req_profile , $role, ]= $_Profile->Profile();

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
  <div class="row">
    <div class="col">



<h3 class="text-success mt-2 text-center">Profile Utilisateur</h3>

<section class="vh-100 " style="background-color: #9de2ff;">

                 <div class="position-relative"> 
                  <div class="position-absolute top-0 end-0 w-50 pe-5  mt-5 mr-5">
                  <?php require_once ('commentaire.php')?>
                  </div>
                
                 </div>
  <div class="container py-4 h-100  flex-column ">
                     
    <div class=" ">
      <div class="col col-md-9 col-lg-7 col-xl-5">
        <div id ="fontcard" class="card mt-5" style="border-radius: 15px;">
         
          <div class="card-body p-4 ">
        
            <div class="d-flex text-black ">
              <div class="flex-shrink-0">
                
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
             
                  alt="Generic placeholder image" class="img-fluid"
                  style="width: 180px; border-radius: 10px;">
                  <p class="ms-2 text-center">  role: <?= $role?></p>
              </div>
                
                
              <h4 class="ms-2 text-center">  Bonjour <?= $req_profile['pseudo']?></h4>
              <div class="flex-grow-1 ms-3">
            
                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                  style="background-color: #efefef;">
               
                  <div>
                    <div class="text-dark">Email:  <span class="text-info"><?= $req_profile['email']?></span></div>
                  
                  </div>
                </div>
                <div class="d-flex pt-2">
                  <button id="btnMessageP" type="button" class=" me-1 flex-grow-1">Message</button>
                
                </div>
                <div class="mt-4">
                <div class=""> date de connexion:<br><span class="text-danger"><?= $req_profile['date_connexion']?></span></div>
              
                  </div>
           
              </div>
           
            </div>
          </div>
          <div class="d-flex justify-content-center  mb-1 ">
           <a  class = "text-light btn btn-dark" href="modifier_profile.php">Modifier M profile</a>
         </div>
        
         
        </div>
       
      </div>
      
    </div>
  </div>
  <!--flex-->
</div>
</section>

</div>
  </div>
</div>

<?php require 'footer.php';?>
    
</body>
</html>





 

