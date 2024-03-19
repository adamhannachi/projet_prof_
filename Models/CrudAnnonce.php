<?php

class CrudAnnonce
{

 private $valid;  private $get_id_product;  private $error_image_size; private $image_size;
 private $req_product;
  
   
//   function afficher produit
public function show_produit(){
global $db;
  
 $req = $db->prepare('SELECT * FROM product ');
 $req->execute();
 $req_pro =  $req->fetchAll();

 return  $req_pro ;

}


// recupere les donne dans input
public function recuperer_donnee_update(){
    global $db;
   
    
   
}

// fucntion update produit//

public function Update_produit($tete , $description, $destination, $prix, $image_name){
    global $db;

   
  
}



// fucntion delete produit//

public function Delete_produit(){
    global $db;

    $id = $_GET['id'];
    $req_delete = $db->prepare('DELETE FROM product  WHERE id = :id');
    $req_delete->bindParam(':id', $id, PDO::PARAM_INT);
    $req_delete->execute();
    
    return $req_delete ;
}


}

?>