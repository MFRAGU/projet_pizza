<?php

abstract class controllerObjet{
    protected static string $classe;
    protected static string $identifiant;
    protected static array $champs;
    // protected static array $tableauSelect;

    public static function displayDefault(){
        $classe = static::$classe;
        $title = ucfirst($classe);
        $objects = $classe::getAll();
        if(isset($_GET["id_pizza"])){
            $id_pizza = $_GET["id_pizza"];
            $object = $classe::getOne($id_pizza);
            $condition = "modifiable = 1";
            $ingredientsPizzaModifiable = $object->getIngredientList($id_pizza, $condition);
            $ingredientsPizzaAll = $object->getIngredientList($id_pizza);
            $ingredientsPizzaAll = implode(", ", $ingredientsPizzaAll);
            $ingredientsModifiable = ingredient::getAll($condition);
            $ingredientsModifiable = array_diff($ingredientsModifiable, $ingredientsPizzaModifiable);
            $allergenesPizza = $classe::getAllergenesList($id_pizza);
            $allergenesPizza = implode(", ", $allergenesPizza);
        }
        require_once("view/head.php");
        require_once("view/popup_edit_commande.php");
        require_once("view/navbar.php");
        require_once("view/products.php");
        require_once("view/cart.php");
        require_once("view/footer.html");
    }

    public static function update(){
        $classe = static::$classe;
        $donnees = array();
        $POST = array_diff_key($_POST, array("action" => ""));
        foreach($POST as $name => $value){
            $donnees[$name] = $value;
        }
        $idRecuperee = $_GET[static::$identifiant];
        $classe::update($donnees, $idRecuperee);
        header("Location: index.php?objet=$classe");
        exit();
    }
    

    // public static function displayOne(){
    //     $classeRecuperee = static::$classe;
    //     $tablesFem = array(
    //         "serie",
    //         "bd",
    //         "categorie",
    //         "nationalite"
    //     );
    //     if(in_array($classeRecuperee, $tablesFem)){
    //         $title = "une $classeRecuperee";
    //     }
    //     else{
    //         $title = "un $classeRecuperee";
    //     }
    //     $idRecuperee = $_GET[static::$identifiant];
    //     require_once("view/debut.php");
    //     require_once("view/menu.html");
    //     $tableau = $classeRecuperee::getOne($idRecuperee);
    //     require_once("view/details.php");
    //     require_once("view/fin.php");
    // }

    // public static function delete(){
    //     $classeRecuperee = static::$classe;
    //     $idRecuperee = $_GET[static::$identifiant];
    //     $classeRecuperee::delete($idRecuperee);
    //     self::displayAll();
    // }

    // public static function displayCreationForm(){
    //     $champs = static::$champs;
    //     $classe = static::$classe;
    //     $identifiant = static::$identifiant;
    //     $title = "création $classe";
    //     require_once("view/debut.php");
    //     require_once("view/menu.html");
    //     require_once("view/formulaireCreation.php");
    //     require_once("view/fin.php");
    // }

    // public static function create(){
    //     $champs = static::$champs;
    //     $classe = static::$classe;
    //     $donnees = array();
    //     $GET = array_diff_key($_GET, array("objet" => "", "action" => ""));
    //     foreach($GET as $key => $element){
    //         $donnees[$key] = $element;
    //     }
    //     $classe::create($donnees);
    //     self::displayAll();
    // }

}

?>