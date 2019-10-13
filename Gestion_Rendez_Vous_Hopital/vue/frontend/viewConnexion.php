<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <link href="public/css/monStyle.css" rel="stylesheet" />
        <link href="public/fontawesome-free-5.9.0-web/css/all.min.css" rel="stylesheet"/>
        <link href="public/fontawesome-free-5.9.0-web/css/v4-shims.min.css" rel="stylesheet"/>
        <link href="public/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="public/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="public/jquery/lib/jquery.js"></script>
        <script src="public/js/validationForm.js"></script>
    </head> 
    <body>
        <div class="container">
            <div class=" container col-md-3 col-sm-3  col-xl-3 logo">
                <img class="img-thumbnail logo"  src="public/image/logo.png" alt="logo" />
            </div>
            <div class="container col-md-6">
                <div class="card">
                <?php
                    if (isset($_GET['message']))
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" href="#" class="close" data-dismiss="alert">&times;</button>
                        <strong><?= $_GET['message']?> </strong>
                        </div>
                    <?php
                    }
                ?>
                    <div class="card-header">Se connecter</div>
                    <div class="card-body">
                        <form action="index.php?action=connexion" method="POST">
                            <div class="form-group">
                                <label for="login">Login</label>
                                <input type="text" name="login" id="login" placeholder="Entre votre login" class="form-control"/>
                                <div class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" placeholder="Entrer votre mot de passe" name="pass" class="form-control" id="pass"/>
                                <div class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <button class ="btn btn-primary btn-block" type="submit" name="ok" id="connectr">Se connecter</button>
                            </div> 
                        </form>
            </div>
        </div>
    </body>
</html>