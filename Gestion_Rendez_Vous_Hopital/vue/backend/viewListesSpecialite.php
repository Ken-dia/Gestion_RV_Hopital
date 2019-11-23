<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Liste Specialité'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<?php require('lib/fonctions.php')?>
    <div class="container">
        <div class="card moncard">
            <div class="card-header">Recherche ...</div>
            <div class="card-body">
                <form class="form-inline" action="index.php?action=findSpecialite" method="POST">
                        <div class="form-group">
                            <input type="text" name="mot" placeholder="Entrer un text ..." class="form-control inputSearch" id="mot">
                            <div class="error-message"></div>
                            <button class="btn btn-primary mr-sm-5 rechercher" type="submit" id="recherche">Recherche</button>
                            <div class="lienAdd"><i class="fa fa-plus" aria-hidden="true"></i>
                                <a href="index.php?action=ajoutSpecialite">Nouveau Specialite</a>
                            </div>
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
            <div class="card-header">Liste Specialité</div>
            <div class="card-body">
                <section class="col-ms-8 table-responsive matable">
                    <table class="table table-bordered table-hover">
                            <th>Nom Specialité</th><th>Nom Service</th><th colspan ="2">Actions</th>
                        <?php
                            if (isset($listesSpecialite))
                             {
                                afficherTableSpecialite($listesSpecialite);
                            }
                        ?>
                    </table>
                </section>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>