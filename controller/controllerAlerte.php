<?php
require_once("model/alerte.php");
require_once("controller/controllerObjet.php");

class controllerAlerte extends controllerObjet{
    protected static string $classe = "alerte";
    protected static string $identifiant = "id_alerte";

    public static function displayDefault(){
        if (isset($_SESSION["gestionnaire"])) {
            $classe = static::$classe;
            $identifiant = static::$identifiant;
            $alertes = $classe::getAll();
            require_once("view/alerte.php");
        }else{
            header("Location: index.php?objet=gestionnaire");
            exit();
        }
    }
}
?>