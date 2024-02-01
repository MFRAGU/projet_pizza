<?php
    $isPizzaClass = $class == "pizza";
    ?>
    <div id="popup-overlay">
        <div class="popup-container popup-container-edit-command">
            <button class="bi bi-x"></button>
            <h2> Créer <?=$class?></h2>
            <form class="popup-form" method="post" autocomplete="off">
            <input type="hidden" name="action"value="<?=$action?>">
                <?php
                    foreach($champs as $champ => $details) {
                        echo "<div>";
                        echo '<label for='.$champ.'">'.$details[1].'</label>';
                        if($champ != $identifiant)
                            echo '<input type="'.$details[0] .'" name="'.$champ .'" placeholder="'.$details[1] .'" required>';
                        else 
                            echo "<label>".$id."</label>";
                        echo "</div>";
                    }
                    if($isPizzaClass){
                        displayCheckbox($ingredients);
                        displayCheckbox($allergenes);
                    }
                ?>
                <button type="submit">Créer</button>
            </form>
        </div>
    </div>
<?php

function displayCheckbox($arrayObject){
    $label = $arrayObject[0];
    echo '<div class="popup-create-div-checkbox">';
    foreach($arrayObject as $obj){
        $idObj = $obj->get("id_ingredient"); 
        echo '<label for="'.$idObj.'">'.ucfirst($label).'s</label>';
        echo '<input type="checkbox" id="'.$idObj.'" name="'.$obj.'"[]" value="'.$idObj.'">';
    }
    echo "</div>";
}
?>