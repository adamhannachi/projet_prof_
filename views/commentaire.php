<?php
require_once('../include/init.php');


if(!empty($_POST)){
    extract($_POST);
     
    $valid = (boolean) true;

    if(isset($_POST['submit'])){
     
        [$error_contenue,  $error_titre]=$_Commentaire->verification_commentaire($titre, $contenue);
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
   
<h3  class="text-dark text-center ">créer votre commentaire</h3>

<form  method="POST" class="formCommentaire " >
    <div class="mb-3 ms-5 ">
        <label class="form-label " for="titre">titre <small class="text-danger"><?php if(isset($error_titre)){echo'<div>'.$error_titre.'</div>' ;}?></small></label>
        <input id="inputcommentaire" class="form-control w-100 " value="<?php if(isset($titre)){echo $titre;} ?>" type="text" id="" name="titre" placeholder="Titre">
       
    </div>

    <div class="mb-3 ms-5 "id="#inputcommentaire ">
        <label id="bgtext" class="form-label" for=contenue""> votre comentaire <small class="text-danger"><?php if(isset($error_contenue)){echo'<div>'.$error_contenue.'</div>' ;}?></small></label>
        <textarea class="form-control  "  value="<?php if(isset($contenue)){echo $contenue;} ?>"  name="contenue" id="" cols="20" rows="5" placeholder="commentaire"></textarea>
       
    </div>

    

    <div class="mb-3 ms-5 w-100">
     <input  class="btn btn-primary w-50 "type="submit" name="submit" value =" poster">
    </div>
   </form>

 
</body>
</html>