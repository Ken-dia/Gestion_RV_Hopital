<?php
namespace App\Controller;
use App\Tables\Service;
use App\Model\{
    ServiceManager,
    Manager,
    SecretaireManager
};


class ControllerService 
{

    public static function addService(Service $service)
    {
        $db = Manager::connectDb();
        $serviceManager = new ServiceManager($db);
        $affectedLine = $serviceManager->add($service);
        if ($affectedLine === false) {
            throw new Exception('Impossible d\'enregistrer une specialite ');
        } else {
            $message = "Nouveau Service ajouté";
            header('location: index.php?action=listesServices&message='.$message);
        }
    }
    public static function updateService(Service $service)
    {
        $db = Manager::connectDb();
        $serviceManager = new ServiceManager($db);
        $affectedLine = $serviceManager->update($service);
        if ($affectedLine === false) {
            throw new Exception('Impossible de modifier une specialite ');
        } else
        {
            $message = "Service modifié";
            header('location: index.php?action=listesServices&message='.$message);
        }
    }
    public static function deleteService($id)
    {
        $db = Manager::connectDb();
        $serviceManager = new ServiceManager($db);
        $affectedLines = $serviceManager->delete($id);
        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer un service ');
        } else {
            $message = "Service supprimé";
            header('location: index.php?action=listesServices&message='.$message);
        }
    }

    public static function listeService($id)
    {
        $db = Manager::connectDb();
        $serviceManager = new ServiceManager($db);
        $listeService = $serviceManager->liste($id);
        $secretaireManager = new SecretaireManager($db);
        $listesSecretaire = $secretaireManager->listes();
        //$message = 'Modification reussi';
        require('vue/backend/viewUpdateService.php');
    }
    public static function listesService($index)
    {
        $db = Manager::connectDb();
        $serviceManager = new ServiceManager($db);
        $listesService = $serviceManager->listes();
        if ($index == 1) {
            require('vue/backend/viewListesServices.php');
        } elseif ($index == 2) {
            require('vue/backend/viewAddSpecialite.php');
        }
        elseif($index == 3)
        {
            return $listesService;
        }
        else {
            echo 'ERREUR !!!';
        }
    }
    public static function findService($chaine)
    {
        $db = Manager::connectDb();
        $serviceManager = new ServiceManager($db);
        $findListeService = $serviceManager->find($chaine);
        require('vue/backend/viewListesServices.php');
    }
}
?>