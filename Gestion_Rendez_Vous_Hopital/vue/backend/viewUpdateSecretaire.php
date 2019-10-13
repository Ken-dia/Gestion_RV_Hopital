<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Modification Secretaire'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-lg-6">
    <div class="card">
        <div class="card-header">Modification Secretaire</div>
        <div class="card-body">
            <form class="maformulaire" action="index.php?action=updateSecretaire" method="POST">
            <?php
                foreach($listeSecretaire as $secretaire)
                {
                ?>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="hidden" name="id" value="<?=$secretaire['id_secretaire']?>" class="form-control"/>
                        <input type="text" name="nom" placeholder="Votre Réponse" value="<?=$secretaire['nom']?>" class="form-control" id="nom"/>
                        <div class="error-message" ></div>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" placeholder="Votre Réponse" value="<?=$secretaire['prenom']?>" class="form-control" id="prenom"/>
                        <div class="error-message" ></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Votre Réponse" value="<?=$secretaire['email']?>" class="form-control" id="email"/>
                        <div class="error-message" ></div>
                    </div>
                    <div class="form-group">
                        <label for="tel">N° Telephone</label>
                        <input type="text" name="tel" placeholder="Votre Réponse" value="<?=$secretaire['num_telephone']?>" class="form-control" id="tel"/>
                        <div class="error-message" ></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" style="background-color:#7451EB" type="submit" id="submit" >Modifier</button>
                    </div>
                <?php
                }
            ?>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>