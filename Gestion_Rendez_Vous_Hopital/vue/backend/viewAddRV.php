<?php
require_once('lib/security.php');
require_once('lib/roleSecretaire.php');
?>
<?php $title='Ajout un RV'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-md-6">
        <div class="card">
            <div class="card-header bg-color">Ajouter Rendez-vous </div>
            <div class="card-body">
                <form class="formulaire" action="index.php?action=addRV" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="date_RV">Date RV</label>
                        <input type="date" name="date_RV" id="date_RV" placeholder="Votre Réponse" class="form-control" >
                        <div class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="heure_RV">Heure RV</label>
                        <input type="time" name="heure_RV" id="heure_RV" placeholder="Votre Réponse" class="form-control">
                        <div class="error-message"></div>
                    </div>
                    <div class="form-group">
                    <label for="patient">Nom Patient</label>
                    <select name="patient" class="form-control">
                        <?php
                        foreach($listesPatient as $patient)
                        {
                        ?>
                            <option name="patient" value="<?=$patient['id_patient']?>">
                                <?=$patient['prenom'].' '.$patient['nom']?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                    </div>
                    <div class="form-group">
                        <label for="medecin">Nom Medecin</label>
                        <select name="medecin" class="form-control">
                            <?php
                            foreach($listesMedecin as $medecin)
                            {
                            ?>
                                <option name="medecin" value="<?=$medecin['id_medecin']?>">
                                    <?=$medecin['prenom'].' '.$medecin['nom_medecin']?>
                                </option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="secretaire"> Nom Secretaire</label>
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
                        <button class="btn btn-primary btn-block" style="background-color:#7451EB" type="submit" name="submit" id="valider">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>
