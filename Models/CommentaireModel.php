<?php

class CommentaireModel
{

    private $valid; private $error_contenue; private $error_titre;

    public function verification_commentaire($titre, $contenue)
    {
        global $db;  $titre = trim($titre); $contenue = trim($contenue);

        $this->valid = (boolean) true;
        $this->error_titre = $this->verification_titre($titre);
        $this->error_contenue = $this->verification_contenue($contenue);

        if ($this->valid) {
            $valid = true;
            $date_connexion = date("Y-m-d H:i:s");            
            // Récupérer l'id de l'utilisateur qui effectue l'insertion
            $id_utilisateur = $_SESSION['id'];
            // Insérer les données dans la table commentaires avec la jointure utilisateur
            $req = $db->prepare("INSERT INTO commentaires(titre, contenue, date_connexion, id_utilisateurs) VALUE(?,?,?,?)");
            $req->execute(array($titre, $contenue, $date_connexion, $id_utilisateur));
        } else {
            echo ' NO valid';
            return [$this->error_contenue, $this->error_titre];
        }
    }

    // Verification titre
    public function verification_titre($titre)
    {
        if (empty($titre)) {
            $this->valid = false;
            $this->error_titre = " Veuillez remplir le titre";
        }

        return [$this->error_titre];
    }

    // verification contenue   
    public function verification_contenue($contenue)
    {
        if (empty($contenue)) {
            $this->valid = false;
            $this->error_contenue = " Veuillez remplir contenue";
        }

        return [$this->error_contenue];
    }
}