<?php
include("view/head.php");
include("view/navbar.php");
echo '<h2 style="padding: 16px;">Hello bienvenue sur notre site !</h2>';
foreach($pizza_Moment as $pizza){
    echo "<h3>Le hot du moment " .$pizza['nom_pizza']. "</h3>";
    echo $pizza['prix_pizza'];
}
include("view/footer.html");


?>

