<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Ajout Secretaires'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-md-6">
        <div class="card">
            <div class="card-header bg-color">Ajout Utilisateur</div>
            <div class="card-body">
                <form class="maformulaire" action="index.php?action=addUser" method="POST" class="needs-validation" novalidate>
                    
                <form action="" method="POST">
                            <div class="form-group">
                                <label for="login">Profil</label>
                                <input type="text" name="login" id="login" placeholder="Entre votre login" class="form-control"/>
                                <div class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <label for="pass">Mot de passe</label>
                                <input type="password" placeholder="Entrer votre mot de passe" name="pass" class="form-control" id="pass"/>
                                <div class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <label for="pass">Confirmation mot de passe</label>
                                <input type="password" placeholder="Confirmer votre mot de passe" name="pass" class="form-control" id="passConfirm"/>
                                <div class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <button class ="btn btn-primary btn-block" type="submit" name="ok" id="connecter">Ajouter</button>
                            </div> 
                        </form>
                </form>
            </div>
        </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>