<?php
namespace App\Controller;
use App\Tables\Specialite;
use App\Model\
{
    Manager,
    SpecialiteManager,
    ServiceManager
};

class ControllerSpecialite 
{
    
    public static function addSpecialite(Specialite $specialite)
    {
        $db = Manager::connectDb();
        $specialiteManager =new SpecialiteManager($db);
        $specialiteManager->addSpecialite($specialite);
        $message = 'Ajout Spécialité reuissi';
        \header('location:index.php?action=listesSpecialite&message='.$message);
    }
    public static function updateSpecialite(Specialite $specialite)
    {
        $db = Manager::connectDb();
        $specialiteManager =new SpecialiteManager($db);
        $specialiteManager->updateSpecialite($specialite);
        $message = 'Modification Spécialité reuissi';
        \header('location:index.php?action=listesSpecialite&message='.$message);
        
    }
    public static function listesSpecialite($index)
    {
        $db = Manager::connectDb();
        $specialiteManager =new SpecialiteManager($db);
        $listesSpecialite=$specialiteManager->listesSpecialite();
        if($index == 1)
        {
            require 'vue/backend/viewListesSpecialite.php';
        }
        if($index == 2)
        {
            require 'vue/backend/viewAddMedecin.php';
        }
    }
    public static function deleteSpecialite($id_specialite)
    {
        $db = Manager::connectDb();
        $specialiteManager =new SpecialiteManager($db);
        $affectedLines= $specialiteManager->deleteSpecialite($id_specialite);
        $message = 'Suppression Spécialité reuissi';
        \header('location:index.php?action=listesSpecialite&message='.$message);
    }
    public static function listeSpecialite($id_specialite)
    {
        $db = Manager::connectDb();
        $specialiteManager =new SpecialiteManager($db);
        $listeSpecialite = $specialiteManager->listeSpecialite($id_specialite);
        $servicesManager = new ServiceManager($db);
        $listesService = $servicesManager->listes();
        require 'vue/backend/viewUpdateSpecialite.php';
    }
}

?>