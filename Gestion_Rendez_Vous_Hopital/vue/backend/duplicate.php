<?php $title='Liste des Secretaires'?>

<?php ob_start(); ?>
<div id="inscription">
    <img src="public/image/fond.png" alt="image_de_fond"/>
</div>
    <div class="formulaire col-lg-6">
        <h2>Ajouté(e) un secretaire</h2>
        <form action="duplicate.php" method="POST">
            <p><label for="nom">Heure</label></br>
            <input type="time" name="heure" placeholder="Votre Réponse"/>
            </p>
            <p><label for="prenom">Prénom</label></br>
            <input type="date" name="date_RV" placeholder="Votre Réponse"/>
            </p>
            
            <p><input class="btn" type="submit" name="valider" value="Ajouter"/></p>
        </form>
    </div>
    <?php
    if(isset($_POST['valider']))
    {
        var_dump($_POST['heure']).'</br>';
        var_dump($_POST['date_RV']);
    }
    ?>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>