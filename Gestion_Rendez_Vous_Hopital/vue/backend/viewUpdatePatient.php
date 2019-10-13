<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Ajout Medecin'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
    <div class="container col-lg-6">
        <div class="card">
            <div class="card-header">Modification Patient</div>
            <div class="card-body">
                <?php
                    foreach ($listePatient as $patient)
                    {
                    ?>
                        <form class="maformulaire" action="index.php?action=updatePatient&amp;id="<?=$patient['id_patient']?>"" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="id_patient" value="<?=$patient['id_patient']?>"/>
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" placeholder="Votre Réponse" value="<?=$patient['nom']?>" class="form-control" id="nom"/>
                                <div class="error-message" ></div>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" placeholder="Votre Réponse" value="<?=$patient['prenom']?>" class="form-control" id="prenom"/>
                                <div class="error-message" ></div>
                            </div>
                            <div class="form-group">
                                <label for="email">Date de Naissance</label>
                                <input type="date" name="dateNaiss" placeholder="Votre Réponse" value="<?=$patient['dateNaiss']?>" class="form-control" id="dateNaiss"/>
                                <div class="error-message" ></div>
                            </div>
                            <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" placeholder="Votre Réponse" value="<?=$patient['email']?>" class="form-control" id="email"/>
                                    <div class="error-message" ></div>
                            </div>
                            <div class="form-group">
                                <label for="tel">N° Telephone</label>
                                <input type="text" name="tel" placeholder="Votre Réponse" value="<?= $patient['num_telephone']?>" class="form-control" id="tel"/>
                                <div class="error-message" ></div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" style="background-color:#7451EB" type="submit" id="submit" >Modifier</button>
                            </div>
                        
                        </form>
                    <?php 
                    } 
                ?>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>