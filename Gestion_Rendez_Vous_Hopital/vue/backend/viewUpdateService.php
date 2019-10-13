<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Ajout Medecin'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-lg-6">
    <div class="card">
        <div class="card-header">Modification Secretaire</div>
        <div class="card-body">
            <form class="formulaire" action="index.php?action=updateService" method="POST">
                <?php
                    foreach($listeService as $service)
                    {
                        ?>
                        <input type="hidden" name="id_specialite" value="<?= $service['id_specialite']?>"/>
                        <div class="form-group">
                            <label for="nom">Nom Service</label>
                            <input type="text" name="specialite" placeholder="Votre Réponse" value="<?= $service['nom']?>" class="form-control" id="specialite"/>
                            <div class="error-message" ></div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="secretaire">Secretaire</label>
                        <select name="secretaire" class="form-control">
                        <?php
                        foreach($listesSecretaire as $secretaire)
                        {
                        ?>
                            <option name="secretaire" value="<?=$secretaire['id_secretaire']?>">
                                <?=$secretaire['prenom'].' '.$secretaire['nom']?>
                            </option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" style="background-color:#7451EB" type="submit" id="submit" >Modifier</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>