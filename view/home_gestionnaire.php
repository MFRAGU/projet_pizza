<section class="gestionnaire-home-section">
    <?php
   if(!empty($alertes)){
    ?>
    <a id="" href="index.php?objet=alerte">Attention, le stock est à réapprovisionner!</a>
<?php } ?>
    <a id="links-pizza-stock" href="index.php?objet=pizza&action=displayStock">Pizza</a>
    <a id="links-stock" href="index.php?objet=stock">Stock</a>
    <a id="links-statistiques" href="index.php?objet=statistiques">Statistiques</a>
</section>
