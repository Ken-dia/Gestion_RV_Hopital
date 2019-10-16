<?php
require_once('lib/security.php');
require_once('lib/roleMedecin.php');
?>
<?php $title='listes Medecin'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<?php require('lib/fonctions.php')?>
<div class="container">
    <div class="card moncard">
        <div class="card-header">Recherche ...</div>
        <div class="card-body">
            <form class="form-inline" action="index.php?action=findMedecin" method="POST" id="formulaire">
                <div class="form-group">
                    <input type="text" name="mot" placeholder="Recherche...." class="control-form mr-sm inputSearch" id="mot">
                    <button class="btn mr-sm-2 rechercher" type="submit" value="rechercher">Recherche</button>
                    <div class="error-message"></div>  
                </div>
                <div class="form-group">
                    <button class="btn btn-primary mr-sm-5 rechercher" type="submit" value="planning" name="planning">Planning</button>
                </div>
                <div class="form-group">
                <span class="lienAdd"><i class="fa fa-plus" aria-hidden="true"></i>
                    <a href="index.php?action=ajoutMedecin">Nouveau Medecin</a>
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
        <div class="card-header monpanel">Liste Medecins</div>
        <div class="card-body">            
            <section class="col-ms-8 table-responsive">
                <table class="table table-bordered table-hover">
                    <?php
                        if(isset($findListeMedecin))
                        {
                            afficherTableMedecin($findListeMedecin);
                        }
                        else if(isset($listesPlanning))
                        {
                            afficherTablePlannig($listesPlanning);
                        }
                        else
                        {
                            afficherTableMedecin($listesMedecin);
                        }
                        
                    ?>
                </table>
            </section>
        </div>
    </div> 
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?>
