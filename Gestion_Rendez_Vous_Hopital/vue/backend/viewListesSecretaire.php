<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Liste des Secretaires'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<?php require('lib/fonctions.php')?>
    <div class="container">
        <div class="card moncard">
            <div class="card-header">Recherche ...</div>
            <div class="card-body">
                <form class="form-inline" action="index.php?action=searchSecretaire" method="POST">
                    <div class="form-group">
                        <input type="text" name="mot" placeholder="Entrer un text ..." >
                        <button class="btn btn-primary mr-sm-5" type="submit" >Recherche</button>
                        <a href="index.php?action=ajoutSecretaire">Nouvelle Secretaire</a>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($_GET['message']))
        {
        ?>
            <div class="alert alert-success">
            <strong>Success! <?= $_GET['message']?></strong>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <div class="card-header">Liste Secretaires</div>
            <div class="card-body">
                <section class="col-ms-8 table-responsive">
                    <table class="table table-bordered table-hover">
                        <th>Nom</th><th>Prenom</th><th>N° Telephone</th><th>Email</th><th colspan ="2">Actions</th>
                            <?php 
                            if(!isset($searchListeSecretaire))
                            {
                                afficherTableSecretaire($listesSecretaire);
                            }
                            else
                            {
                                afficherTableSecretaire($searchListeSecretaire);
                            }

                            ?>
                    </table>
                </section>
            </div>
        </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>