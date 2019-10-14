<?php
require_once('lib/security.php');
require_once('lib/roleSecretaire.php');
?>
<?php $title='Liste des RVs'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<?php require_once('lib/fonctions.php')?>   
    <div class="container">
        <div class="card moncard">
            <div class="card-header">Recherche ...</div>
            <div class="card-body">
                <form class="form-inline" action="index.php?action=findRV" method="POST">
                <div class="form-group">
                    <input type="date" name="date_RV" placeholder="Date RV" class="mr-sm-1">
                    
                </div>
                <div class="form-group">
                    <?php //<input type="text" name="mot" placeholder="Nom ou Prenom medecin" >?>
                    <button class="btn btn-primary mr-sm-5" type="submit" name="rechercher" >Recherche</button>
                </div>
                <div class="form-group">
                    <input type="text" name="mot" placeholder="Nom ou Prenom medecin" >
                    <button class="btn btn-primary mr-sm-5" type="submit" name="planning" >planning</button>
                </div>
                <div class="form-group">
                    <a href="index.php?action=ajoutRV" class="mr-sm-3">Nouveau RV</a>
                </div> 
                <div class="form-group">
                    <a href="index.php?action=ajoutPatient">Nouveau Patient</a>
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
        <?php
        if (isset($_GET['messageError']))
        {
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" href="#" class="close" data-dismiss="alert">&times;</button>
            <strong> <?= $_GET['messageError']?> </strong>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <div class="card-header">Liste des Rendez-vous</div>
            <div class="card-body">
                <section class="col-ms-8 table-responsive">
                    <table class="table table-bordered table-hover">
                    <?php 
                        if(isset($listesDateRV))
                        {
                            afficherTableRV($listesDateRV);
                        }
                        elseif(isset($listesPlanning))
                        {
                            afficherTablePlannig($listesPlanning);
                        }
                        elseif(isset($listesDatePlanning))
                        {
                            afficherTablePlannig($listesDatePlanning);
                        }
                        else
                        {
                            afficherTableRV($listesRV);

                        }
                    ?>
                    </table>
                </section>
            </div>
        </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>