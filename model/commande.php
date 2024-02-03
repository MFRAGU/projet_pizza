<?php

require_once("objet.php");

class commande extends objet
{
    protected static string $identifiant = "id_commande";

    protected static string $classe = "commande";

    protected $id_commande;
    protected $date_heure_commande;
    protected $montant_total;
    protected $id_client;
    protected $id_type_paiement;
    protected $id_caissier;
    protected $id_etat;
    protected $id_livreur;
    protected $id_pizzaiolo;

    public function __construct(
        $id_commande = NULL,
        $date_heure_commande = NULL,
        $montant_total = NULL,
        $id_client = NULL,
        $id_type_paiement = NULL,
        $id_caissier = NULL,
        $id_etat = NULL,
        $id_livreur = NULL,
        $id_pizzaiolo = NULL,
    ){
        if(!is_null($id_commande)){
            $this->id_commande = $id_commande;
            $this->date_heure_commande = $date_heure_commande;
            $this->montant_total = $montant_total;
            $this->id_client = $id_client;
            $this->id_type_paiement = $id_type_paiement;
            $this->id_caissier = $id_caissier;
            $this->id_etat = $id_etat;
            $this->id_livreur = $id_livreur;
            $this->id_pizzaiolo = $id_pizzaiolo;
        }
    }

    public function __toString(): string{
        return strval($this->montant_total);
    }

    public static function getCommand_Day(){
        $requete = "SELECT * FROM StatCommand_Day";
        $resultat = connexion::pdo()->prepare($requete);
        try{
            $resultat->execute();
            $result = $resultat->fetchAll(pdo::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getCommand_Month(){
        $requete = "SELECT * FROM StatCommand_Month";
        $resultat = connexion::pdo()->prepare($requete);
        try{
            $resultat->execute();
            $result = $resultat->fetchAll(pdo::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getCommand_Year(){
        $requete = "SELECT * FROM StatCommand_Year";
        $resultat = connexion::pdo()->prepare($requete);
        try{
            $resultat->execute();
            $result = $resultat->fetchAll(pdo::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        }
    
}
