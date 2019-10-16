<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Liste Patient'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<?php require('lib/fonctions.php')?>
    <div class="container">
    <div class="card moncard">
        <div class="card-header bg-color monpanel">Recherche ...</div>
        <div class="card-body">
            <form class="form-inline" action="index.php?action=findPatient" method="POST">
                <div class="form-group">
                    <input type="text" name="mot" placeholder="Entrer un text ..." class="inputSearch">
                    <button class="btn btn-primary mr-sm-5 rechercher" type="submit">Recherche</button>
                    <span class="lienAdd"><i class="fa fa-plus" aria-hidden="true"></i>
                        <a href="index.php?action=ajoutPatient">Nouveau Patient</a>
                    </span>
                   
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_GET['message']))
    {
    ?>
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" href="#" class="close" data-dismiss="alert">&times;</button>
        <strong>Success! <?= $_GET['message']?> </strong>
        </div>
    <?php
    }
    ?>
        <div class="card">
            <div class="card-header">Liste Patient</div>
            <div class="card-body">
                <section class="col-ms-8 table-responsive matable">
                    <table class="table table-bordered table-hover">
                        <th>Nom</th><th>Prenom</th><th>Date de Naissance</th><th>N° Telephone</th><th>Email</th><th colspan ="2">Actions</th>
                            <?php 
                            if(!isset($findListePatient))
                            {
                                afficherTablePatient($listesPatient);
                            }
                            else
                            {
                                afficherTablePatient($findListePatient);
                            }
                                

                            ?>
                    </table>
                </section>
            </div>
        </div> 
    </div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>