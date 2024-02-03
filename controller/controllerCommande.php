<?php
require_once("model/commande.php");
require_once("controller/controllerObjet.php");

class controllerCommande extends controllerObjet
{
    protected static string $classe = "commande";
    protected static string $identifiant = "id_commande";

    
    public static function displayDefault(){
       //if(isset($_SESSION["gestionnaire"])){
        require_once("view/head.php");
        $classe = static::$classe;
        $stat_Day = $classe::getCommand_Day();
        $stat_Month = $classe::getCommand_Month();
        $stat_Year = $classe::getCommand_Year();
            require_once("view/navbar.php");
            require_once("view/stat_Day.php");
            require_once("view/stat_Month.php");
            require_once("view/stat_Year.php");
            require_once("view/footer.html");
      //  }
     /*   else{
           header("Location: index.php?objet=gestionnaire");
           exit();
        }*/
    }



}
