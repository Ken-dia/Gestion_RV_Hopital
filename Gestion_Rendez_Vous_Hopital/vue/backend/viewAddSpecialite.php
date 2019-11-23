<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Ajout Specialite'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-lg-6">
    <div class="card">
        <div class="card-header"> Ajout d'une Spécialité</div>
        <div class="card-body">
            <form class="formulaire" action="index.php?action=addSpecialite" method="POST">
                <div class="form-group">
                    <label for="nom">Specialite</label>
                    <input type="text" name="nom_specialite" id="specialite" placeholder="Votre Réponse" class="form-control" >
                    <div class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="service">Service</label>
                    <select name="service" class="form-control" id="service">
                        <?php
                    
                            foreach($listesService as $service)
                            {
                            ?>
                                <option name="service" value="<?=$service['id_specialite']?>">
                                    <?=$service['nom']?>
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