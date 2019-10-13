<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Ajout Secretaires'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-md-6">
        <div class="card">
            <div class="card-header bg-color">Ajout secretaire</div>
            <div class="card-body">
                <form class="maformulaire" action="index.php?action=addSecretaire" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" placeholder="Votre Réponse" class="form-control" id="nom" />
                        <div class="error-message" id="helpNom"></div>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" placeholder="Votre Réponse" class="form-control" id="prenom"/>
                        <div class="error-message" id="helpPrenom"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Votre Réponse" class="form-control" id="email"/>
                        <div class="error-message" id="helpEmail"></div>
                    </div>
                    <div class="form-group">
                        <label for="tel">N° Telephone</label>
                        <input type="text" name="tel" placeholder="Votre Réponse" class="form-control" id="tel"/>
                        <div class="error-message" id="helpTel"></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" style="background-color:#7451EB"  type="submit" id="submit">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>

        
