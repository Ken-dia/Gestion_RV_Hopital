<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <link href="public/css/monStyle.css" rel="stylesheet" />
        <link href="public/fontawesome-free-5.9.0-web/css/all.min.css" rel="stylesheet"/>
        <link href="public/fontawesome-free-5.9.0-web/css/v4-shims.min.css" rel="stylesheet"/>
        <link href="public/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="public/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="public/jquery/lib/jquery.js"></script>
        
        <?php
        /*
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  */
  ?>
        <script src="public/js/validationForm.js"></script>
    </head>
    <body>
            <nav class="navbar navbar-expand-md bg-color sticky-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <i class="fa fa-bars" aria-hidden="true"></i>

                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listesSecretaire">Secretaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listesPatient">Patients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listesMedecin">Medecins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listesServices">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listesRV">Rendez-vous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listesUser">Utilisateur</a>
                        </li>      
                    </ul>
                </div> 
                <div class="pull-right">
                    <i class="fa fa-user fa-1x" aria-hidden="true"></i> <span class="mr-sm-1 profil"><?= $profile?></span>
                    <span><i class="fa fa-sign-out fa-1x" aria-hidden="true"></i> <a class="deconnexion" href="index.php?action=deconnexion" >se deconnecter</a></span>
                </div> 
            </nav>
            <br>
        <?= $content ?>
    </body>
</html>