<?php
namespace App\Controller;
use App\Model\Manager;
use App\Tables\RendezVous;
use App\Model\
    {
        RendezVousManager,
        PatientManager,
        MedecinManager,
        SecretaireManager
    };

class ControllerRV
{
    public static function addRV(RendezVous $RV)
    {
        $db = Manager::connectDb();
        $rvManager = new RendezVousManager($db);
        $affectedLines = $rvManager->add($RV);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'enregistrer un rendez-vous ');
        }
        else
        {
            $message = "Nouveau Rendez-vous ajouté";
            header('location: index.php?action=listesRV&message='.$message);
        }
    }
    public static function listesRV()
    {
        $db = Manager::connectDb();
        $rvManager = new RendezVousManager($db);
        $listesRV = $rvManager->listes();
        require('vue/backend/viewListeRV.php');   
    }
    public static function updateRV(RendezVous $RV)
    {
        $db = Manager::connectDb();
        $rvManager = new RendezVousManager($db);
        $affectedLines = $rvManager->update($RV);
        if ($affectedLines === false) {
            throw new Exception('Impossible de mofier un rendez-vous ');
        } else {
            $message = "Rendez-vous modifié";
            header('location: index.php?action=listesRV&message='.$message);
        }
    }
    public static function listeRV($id)
    {
        $db = Manager::connectDb();
        $rvManager = new RendezVousManager($db);
        $listeRV = $rvManager->liste($id);
        $patientManager = new PatientManager($db);
        $listesPatient = $patientManager->listes();
        $medecinManager = new MedecinManager($db);
        $listesMedecin = $medecinManager->listes();
        $secretaireManager = new SecretaireManager($db);
        $listesSecretaire = $secretaireManager->listes();
        require('vue/backend/viewUpdateRV.php'); 
    }
    public static function deleteRV($id)
    {
        $db = Manager::connectDb();
        $rvManager = new RendezVousManager($db);
        $affectedLines = $rvManager->delete($id);
        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer un rendez-vous ');
        } else {
            $message = "Rendez-vous supprimé";
            header('location: index.php?action=listesRV&message='.$message);
        }
        
        
    }
    public static function findRV($date_RV)
    {
        $db = Manager::connectDb();
        $rvManager = new RendezVousManager($db);
        $listesDateRV = $rvManager->findDateRV($date_RV);
        //var_dump($listesDateRV);
        require('vue/backend/viewListeRV.php');  
    }
    //PLANNING
    public static function findPlanningMedecin($chaine,$index)
    {
        $db = Manager::connectDb();
        $medecinManager = new MedecinManager($db);
        $listesPlanning= $medecinManager->findPlanning($chaine);
        if($index == 1)
        {
            require('vue/backend/viewListesMedecin.php');
        }
        if($index == 2)
        {
            require('vue/backend/viewListeRV.php');
        }
    }
    public static function findDatePlanningMedecin($chaine,$date_RV)
    {
        $db = Manager::connectDb();
        $medecinManager = new MedecinManager($db);
        $listesDatePlanning= $medecinManager->DateNomPlanning($chaine,$date_RV);
        require('vue/backend/viewListeRV.php');
    }
    public static function heureMedecinValide($id_medecin,$date_RV,$heure_RV)
    {
        $db = Manager::connectDb();
        $rvManager = new RendezVousManager($db);
        $nbHeure = $rvManager->findHeureValide($id_medecin,$date_RV,$heure_RV);
        return $nbHeure;
    }

}
?>