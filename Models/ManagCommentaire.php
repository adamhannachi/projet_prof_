<?php


class ManagCommentaire{




// function afficher les list des commentaire 
   
public function showlistcommentaire(){

    global $db;

 $req = $db->prepare('SELECT commentaires.id , commentaires.titre , commentaires.contenue , utilisateurs.pseudo, commentaires.date_connexion FROM commentaires 
 INNER JOIN utilisateurs   ON commentaires.id_utilisateurs = utilisateurs.id');
$req->execute();

  $req_commentaire = $req->fetchAll();

  return $req_commentaire;
}



public function Deletecommentaire(){

    global $db;

    $id = $_GET['id'];
    $req_delete = $db->prepare('DELETE FROM commentaires  WHERE id = :id');
    $req_delete->bindParam(':id', $id, PDO::PARAM_INT);
    $req_delete->execute();

    return $req_delete;







}

}
?>