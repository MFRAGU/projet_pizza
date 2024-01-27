<?php
require_once("model/gestionnaire.php");
require_once("controller/controllerObjet.php");

class controllerGestionnaire extends controllerObjet
{

    protected static string $classe = "gestionnaire";
    protected static string $identifiant = "id_gestionnaire";

    //appele au formulaire
    public static function displayDefault()
    {
        if(isset($_SESSION["gestionnaire"])) {
            require_once("view/head.php");
            require_once("view/navbar.php");
            require_once("view/compte.php");
            require_once("view/footer.html");
        }
        else{
            require_once("view/head.php");
            require_once("view/navbar.php");
            require_once("view/gestionnaire_connection_form.html");
            require_once("view/footer.html");
        }
    }

    public static function connection()
    {
        $classe = static::$classe;

        $login = $_POST["mail_gestionnaire"] ?? '';
        $mdp_gestionnaire = $_POST["mdp_gestionnaire"] ?? '';

        $gestionnaire = $classe::connection($login, $mdp_gestionnaire);

        if (isset($gestionnaire)) {
            $_SESSION["gestionnaire"] = $gestionnaire;
        } 
        else {
            header("Location: index.php?objet=erreur");
            exit();
        }
    }


    public static function disconnection()
    {
        unset($_SESSION["gestionnaire"]);
        self::displayDefault();
    }
}