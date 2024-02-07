<?php
    foreach($alertes as $alerte){
        echo "<tr>";
        echo "<td>" .$alerte['date_alerte']. "</td>";
        echo "<td>" .$alerte['message_alerte']. "</td>";
        echo "<td>" .$alerte['nom_stock']. "</td>";
    }
?>