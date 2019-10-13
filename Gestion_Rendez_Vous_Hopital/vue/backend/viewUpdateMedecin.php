<?php
require_once('lib/security.php');
require_once('lib/roleAdmin.php');
?>
<?php $title='Ajout Medecin'?>
<?php ob_start(); ?>
<?php $profile= $_SESSION['profil']?>
<div class="container col-lg-6">
    <div class="card">
        <div class="card-header">Modification Medecin</div>
        <div class="card-body">
            
            <form class="formulaire" action="index.php?action=updateMedecin" method="POST">
            <?php 
                foreach($listeMedecin as $medecin)
                {?>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="hidden" name="id_medecin" value="<?= $medecin['id_medecin']?>" class="form-control"/>
                        <input type="text" name="nom" placeholder="Votre Réponse" value="<?= $medecin['nom']?>" class="form-control" id="nom"/>
                        <div class="error-message" ></div>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" placeholder="Votre Réponse" value="<?= $medecin['prenom']?>" class="form-control" id="prenom"/>
                        <div class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Votre Réponse" value="<?= $medecin['email']?>" class="form-control" id="email"/>
                        <div class="error-message" ></div>
                    </div>
                    <div class="form-group">
                        <label for="tel">N° Telephone</label>
                        <input type="text" name="tel" placeholder="Votre Réponse" value="<?= $medecin['num_telephone']?>" class="form-control" id="tel"/>
                        <div class="error-message"></div>
                    </div>
                <?php 
                }
                ?>   
                <div class="form-group">
                    <label for="service"> Nom Service</label>
                    <select name="service" class="form-control custom-select-sm">
                    <?php
                        foreach($listesService as $service)
                            {?>
                                <option name="service" value="<?= $service['id_specialite']?>">
                                    <?= $service['nom']?>
                                </option>

                            <?php
                            }
                            ?>
                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" style="background-color:#7451EB" type="submit" id="submit" >Modifier</button>   
                </div>         
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php'); ?> 