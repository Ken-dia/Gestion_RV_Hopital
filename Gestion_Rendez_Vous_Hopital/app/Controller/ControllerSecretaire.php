<?php
namespace App\Controller;

use App\Model\Manager;
use App\Tables\Secretaire;
use App\Model\SecretaireManager;
//Controlleur du Secretaire
class ControllerSecretaire 
{
    public static function addSecretaire(Secretaire $secretaire)
    {
        $db = Manager::connectDb();
        $secretaireManager = new SecretaireManager($db);
        $affectedLine = $secretaireManager->add($secretaire);
        if ($affectedLine === false) {
            throw new Exception('Impossible d\'enregistrer un(e) secretaire ');
        } 
        else {
            $message = 'Nouveau secretaire ajouté';
            header('Location: index.php?action=listesSecretaire&message='.$message);
        }
    }
    public static function listeSecretaire($id)
    {
        $db = Manager::connectDb();
        $secretaireManager = new SecretaireManager($db);
        $listeSecretaire = $secretaireManager ->liste($id);
        require('vue/backend/viewUpdateSecretaire.php');
    }
    public static function listesSecretaire($index)
    {
        //$listesSecretaire = [];
        $db = Manager::connectDb();
        $secretaireManager = new SecretaireManager($db);
        $listesSecretaire = $secretaireManager ->listes();
        //return $listesSecretaire;
        if ($index == 1) {
            require('vue/backend/viewListesSecretaire.php');
        }
        elseif ($index == 2) {
            require('vue/backend/viewAddService.php');
        }
        
        elseif ($index == 3) {
            require('vue/backend/viewUpdateService.php');
        }
        elseif ($index == 4) {
            return $listesSecretaire;
        }
        else {
            echo 'ERREUR §§§§!!!!!';
        }
        //require('vue/backend/viewListesSecretaire.php');
        //require('vue/backend/viewAddService.php');
    }
    public static function deleteSecretaire($id)
    {
        $db = Manager::connectDb();
        $secretaireManager = new SecretaireManager($db);
        $affectedLine = $secretaireManager->delete($id);
        if ($affectedLine === false) {
            throw new Exception('Impossible de supprimer un(e) secretaire(e) ');
        } 
        else {
            $message = 'Secretaire supprimé';
            header('Location: index.php?action=listesSecretaire&message='.$message);
        }
    }
    public static function updateSecretire(Secretaire $secretaire)
    {
        $db = Manager::connectDb();
        $secretaireManager = new SecretaireManager($db);
        $affectedLine = $secretaireManager->update($secretaire);
        if ($affectedLine === false) {
            throw new Exception('Impossible de modifier un(e) secretaire ');
        } 
        else {
            $message = 'Secretaire modifié';
            header('Location: index.php?action=listesSecretaire&message='.$message);
        }
    }
    public static function searchSecretaire($chaine)
    {
        $db = Manager::connectDb();
        $secretaireManager = new SecretaireManager($db);
        $searchListeSecretaire = $secretaireManager->search($chaine);
        require('vue/backend/viewListesSecretaire.php');
    }
}
?>