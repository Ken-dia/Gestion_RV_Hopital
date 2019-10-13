<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Ajout Secretaires'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-md-6">
        <div class="card">
            <div class="card-header bg-color">Modification de l' utilisateur</div>
            <div class="card-body">
                <form class="maformulaire" action="index.php?action=updateUser" method="POST" class="needs-validation" novalidate>
                    <?php
                        foreach ($listeUser as $user) {
                            ?>
                    <div class="form-group">
                        <label for="login">Profil</label>
                        <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user']?>" />
                        <input type="text" name="login" id="login" placeholder="Entre votre login" class="form-control" value="<?= $user['profil']?>"/>
                        <div class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mot de passe</label>
                        <input type="text" placeholder="Entrer votre mot de passe" name="pass" class="form-control" id="pass" value="<?= crypt($user['password_user'])?>"/>
                        <div class="error-message"></div>

                    <?php
                    }
                    ?>
                    </div>
                            <div class="form-group">
                                <button class ="btn btn-primary btn-block" type="submit" name="ok" id="modifier">Modifier</button>
                            </div> 
                </form>
            </div>
        </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>