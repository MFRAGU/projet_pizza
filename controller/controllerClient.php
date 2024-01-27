<?php
require_once("model/client.php");
require_once("controller/controllerObjet.php");

class controllerClient extends controllerObjet
{

    protected static string $classe = "client";
    protected static string $identifiant = "id_client";


    protected static $champs = array(
        "login"          => ["text", "identifiant"],
        "mdp_client"     => ["password", "mot de passe"],
        "nom_client"    => ["text", "nom"],
        "prenom_client" => ["text", "prénom"],
        "mail_client"          => ["email", "email"],
        "telephone_client"      => ["text", "téléphone"]
    );
    //appele au formulaire
    public static function displayDefault()
    {
        if(isset($_SESSION["client"])) {
            require_once("view/head.php");
            require_once("view/navbar.php");
            require_once("view/compte.php");
            require_once("view/footer.html");
        }
        else{
            require_once("view/head.php");
            require_once("view/navbar.php");
            require_once("view/client_connection_form.html");
            require_once("view/footer.html");
        }
    }

    public static function connection()
    {
        $classe = static::$classe;
        // Récupère les identifiants depuis la méthode POST
        $login = $_POST["mail_client"] ?? '';
        $mdp_client = $_POST["mdp_client"] ?? '';

        $client = $classe::connection($login, $mdp_client);
        // Vérifie les identifiants avec la méthode checkMDP
        if (isset($client)) {
            // Enregistre le login dans la session
            $_SESSION["client"] = $client;
        } 
        else {
            header("Location: index.php?objet=erreur");
            exit();
        }
    }


    public static function disconnection()
    {
        unset($_SESSION["client"]);
        self::displayDefault();
    }
}