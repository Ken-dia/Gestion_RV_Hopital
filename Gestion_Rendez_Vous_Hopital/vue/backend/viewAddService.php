<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Ajout Secretaires'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-lg-6">
    <div class="card">
        <div class="card-header"> Ajout d'un service</div>
        <div class="card-body">
            <form class="formulaire" action="index.php?action=addService" method="POST">
                <div class="form-group">
                    <label for="nom">Specialite</label>
                    <input type="text" name="specialite" id="specialite" placeholder="Votre Réponse" class="form-control" >
                    <div class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="secretaire">Secretaire</label>
                    <select name="secretaire" class="form-control" id="secretaire">
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
                    <button class="btn btn-primary btn-block" style="background-color:#7451EB" type="submit" id="ok" >Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>