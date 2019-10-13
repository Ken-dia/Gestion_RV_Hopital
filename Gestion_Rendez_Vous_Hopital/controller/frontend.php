<?php
require_once 'lib/autoload.php';
require_once 'controller/user.php';
require_once 'model/userManager.php';
require_once 'model/manager.php';

//SECRETAIRE
function addUser(User $user)
{
    $db = Manager::connectDb();
    $userManager = new UserManager($db);
    $affectedLines = $userManager->add($user);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'enregistrer un utilisateur ');
    } else {
        header('location: index.php?action=listesUser');
    }
}
function listesUser()
{
    $db = Manager::connectDb();
    $userManager = new UserManager($db);
    $listesUser = $userManager->listes();
    require('vue/backend/viewListesUser.php');   
}
function updateUser(User $user)
{
    $db = Manager::connectDb();
    $userManager = new UserManager($db);
    $affectedLines = $userManager->update($user);
    if ($affectedLines === false) {
        throw new Exception('Impossible de mofier un utilisateur ');
    } else {
        $message = 'Utilisateur modifié';
        header('location: index.php?action=listesUser&message='.$message);
    }
}
function listeUser($id)
{
    $db = Manager::connectDb();
    $userManager = new UserManager($db);
    $listeUser = $userManager->liste($id);
    require('vue/backend/viewUpdateUser.php'); 
}
function deleteUser($id)
{
    $db = Manager::connectDb();
    $userManager = new UserManager($db);
    $affectedLines = $userManager->delete($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de mofier un utilisateur ');
    } 
    else {
        $message ='Utilisateur supprimé';
        header('location: index.php?action=listesUser&message='.$message);
    } 
}
function connexionVerify($login,$pass)
{
    $db = Manager::connectDb();
    $userManager = new UserManager($db);
    $resultat = $userManager->verifyConnexion($login);
    if(password_verify($pass,$resultat[1]) !=false)
    {
        if($login == 'admin')
        {
            session_start();
            $_SESSION['profil'] = ucfirst($login);
            header('location: index.php?action=listesUser');
        }
        elseif($login == 'secretaire')
        {
            session_start();
            $_SESSION['profil'] = ucfirst($login);;
            header('location: index.php?action=listesRV');
        }
        else
        {
            session_start();
            $_SESSION['profil'] = ucfirst($login);;
            header('location: index.php?action=listesMedecin');
        }
    }
    else
    {
        $message = 'login ou mot de passe incorrecte';
        header('location: index.php?message='.$message);
    }
    
}
?>