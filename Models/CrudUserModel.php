<?php

class CrudUserModel{

    public function showlist(){
        global $db;

        $req = $db->prepare('SELECT * FROM utilisateurs ');
        $req->execute();
        $req_membre = $req->fetchAll(PDO::FETCH_ASSOC);

         return  $req_membre; 
    }

    public function delete_user(){
        global $db;
        $id = $_GET['id'];
        $req_delete = $db->prepare('DELETE FROM utilisateurs  WHERE id = :id');
        $req_delete->bindParam(':id', $id, PDO::PARAM_INT);
        $req_delete->execute();

        return $req_delete;}
}
?>