<?php


class ProfileModel
{

        public function Profile(){
       global $db;

       $req = $db->prepare("SELECT * FROM utilisateurs  WHERE id = ?");
  
       $req->execute([$_SESSION['id']]);
        
      $req_profile =  $req->fetch( );
   
    // role
    switch($req_profile['role']){
    case 0;
        $role = 'utilisateurs ';
        break;
    case 1;
       $role = 'Administrateur';
       break;
      
       
     
   
    }
    return  [$req_profile, $role];

    }





    public function updateEmailPseudo(){
        global $db;

        
       
             

              
    }


    public function updatePassword(){

        
    

    }

   // recupere donnee profile
    public function recupererDonneProfile(){
       
       global $db;
      
        
      


    }

}
?>