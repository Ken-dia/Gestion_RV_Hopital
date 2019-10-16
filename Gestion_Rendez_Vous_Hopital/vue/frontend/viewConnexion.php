<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>
        <link href="public/css/monStyle.css" rel="stylesheet" />
        <link href="public/fontawesome-free-5.9.0-web/css/all.min.css" rel="stylesheet"/>
        <link href="public/fontawesome-free-5.9.0-web/css/v4-shims.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="public/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="public/jquery/lib/jquery.js"></script>
    </head> 
    <body>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="container col-md-4 col-sm-4 col-xs-6">
                            <img class="imgAvatar" src="public/image/img_avatar.png" alt="avatar"/>
                        </div>
                    </div>
                        <div class="container">
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
                                <div class="form-group">
                                <a href="#demo" class="btn btn-primary btn-block" data-toggle="collapse">cliquez ici pour voir les utilisateurs pour le test</a>
                                <div id="demo" class="collapse">
                                    login:admin,password:Admin1995
                                    login:medecin,password:Medecin123
                                    login:secretaire,password:Secretaire123
                                </div>
</div>
                            </form>
                        
                        </div>
                
            </div>
            <div class="container-fluid col-md-8 hopital">
                <img class="img-fluid border-0 d-none d-md-block" src="public/image/hopitalprincipal.jpg" alt="photo"/>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="public/jquery/lib/jquery.js"></script>
        <script src="public/js/validationForm.js"></script>
    </body>
</html>