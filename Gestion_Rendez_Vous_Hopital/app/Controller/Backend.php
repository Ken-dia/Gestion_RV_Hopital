<?php
namespace App\Controller;
use App\Model\{
    Manager,
    RendezVousManager,
    MedecinManager,
    SecrecretaireManager,
    ServiceManager,
    PatientManager,
};
use App\Tables\
{
    Medecin,
    Patient,
    Service,
    RendezVous,
    Secretaire
};
//Controlleur du Secretaire
class ControllerSecretaire 
{
    public static function addSecretaire(Secretaire $secretaire)
    {
        $db = Manager::connectDb();
        $secretaireManager = new SecrecretaireManager($db);
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
        $secretaireManager = new SecrecretaireManager($db);
        $listeSecretaire = $secretaireManager ->liste($id);
        require('vue/backend/viewUpdateSecretaire.php');
    }
    public static function listesSecretaire($index)
    {
        //$listesSecretaire = [];
        $db = Manager::connectDb();
        $secretaireManager = new SecrecretaireManager($db);
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
        $secretaireManager = new SecrecretaireManager($db);
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
        $secretaireManager = new SecrecretaireManager($db);
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
        $secretaireManager = new SecrecretaireManager($db);
        $searchListeSecretaire = $secretaireManager->search($chaine);
        require('vue/backend/viewListesSecretaire.php');
    }
}
//Controlleurs du Medecin
class ControllerMedecin 
{
    //MEDECIN
    public static function addMedecin(Medecin $medecin)
    {
        $db = Manager::connectDb();
        $medecinManager = new MedecinManager($db);
        $affectedLine = $medecinManager->add($medecin);
        if ($affectedLine === false) {
            throw new Exception('Impossible  d\'ajouter un medecin ');
        } else {
            $message = ' Nouveau medecin ajouté';
            header('Location: index.php?action=listesMedecin&message='.$message);
        }
    }
    public static function updateMedecin(Medecin $medecin)
    {
        $db = Manager::connectDb();
        $medecinManager = new MedecinManager($db);
        $affectedLine = $medecinManager->update($medecin);
        if ($affectedLine === false) {
            throw new Exception('Impossible de modifier un medecin ');
        } else {
            $message = 'Medecin modifié';
            header('Location: index.php?action=listesMedecin&message='.$message);
        }
    }
    public static function deleteMedecin($id)
    {
        //var_dump($_SESSION['profil']);die;
        $db = Manager::connectDb();
        $medecinManager = new MedecinManager($db);
        $affectedLines = $medecinManager->delete($id);
        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer un medecin ');
        } else {
            $message = 'Medecin supprimé';
            header('Location: index.php?action=listesMedecin&message='.$message);
        }
    }
    public static function listeMedecin($id)
    {
        $db = Manager::connectDb();
        $medecinManager = new MedecinManager($db);
        $listeMedecin = $medecinManager->liste($id);
        $serviceManager = new ServiceManager($db);
        $listesService = $serviceManager->listes();
        require('vue/backend/viewUpdateMedecin.php');
    }
    public static function listesMedecin($index)
    {
        $db = Manager::connectDb();
        $medecinManager = new MedecinManager($db);
        $listesMedecin= $medecinManager->listes();
        if ($index == 1) {
            require('vue/backend/viewListesMedecin.php');
        } elseif ($index == 2) {
            return $listesMedecin;
        } else {
            echo 'EEEREEE';
        }
    }
    public static function findMedecin($chaine)
    {
        $db = Manager::connectDb();
        $medecinManager = new MedecinManager($db);
        $findListeMedecin= $medecinManager->findMedecin($chaine);
        require('vue/backend/viewListesMedecin.php');

    }
}
//Controlleur du Patient
class ControllerPatient
{
    public static function addPatient(Patient $patient)
    {
        $db = Manager::connectDb();
        $patientManager = new PatientManager($db);
        $affectedLine = $patientManager->add($patient);
        if ($affectedLine === false) {
            throw new Exception('Impossible d\'enregistrer un(e) patient(e) ');
        } else {
            $message = 'Nouveau patient ajouté';
            header('Location: index.php?action=listesPatient&message='.$message);
        }
    }
    
    public static function updatePatient(Patient $patient)
    {
        $db = Manager::connectDb();
        $patientManager = new PatientManager($db);
        $affectedLine = $patientManager->update($patient);
        if ($affectedLine === false) {
            throw new Exception('Impossible de modifier un(e) patient(e) ');
        } else {
            $message = 'Patient modifié ';
            header('Location: index.php?action=listesPatient&message='.$message);
        }
    }
    public static function listesPatient($index)
    {
        $db = Manager::connectDb();
        $patientManager = new PatientManager($db);
        $listesPatient = $patientManager->listes();
        if ($index == 1) {
            require('vue/backend/viewListesPatient.php');
        }
        
        elseif ($index == 2) {
            return $listesPatient;
        } 
        else
        {
    
        }
    }
    public static function listePatient($id)
    {
        $db = Manager::connectDb();
        $patientManager = new PatientManager($db);
        $listePatient = $patientManager->liste($id);
        require('vue/backend/viewUpdatePatient.php');
    }
    public static function deletePatient($id)
    {
        //session_start();
        //require_once('lib/roleAdmin.php');
        $db = Manager::connectDb();
        $patientManager = new PatientManager($db);
        $affectedLine = $patientManager->delete($id);
        if ($affectedLine === false) {
            throw new Exception('Impossible de supprimer un(e) patient(e) ');
        } else {
            $message = 'Patient supprimé';
            header('Location: index.php?action=listesPatient&message='.$message);
        }
    }
    public static function findPatient($chaine)
    {
        $db = Manager::connectDb();
        $patientManager = new PatientManager($db);
        $findListePatient = $patientManager->find($chaine);
        require('vue/backend/viewListesPatient.php');
    }
}
//Controlleur  du Service
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
        $secretaireManager = new SecrecretaireManager($db);
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
            require('vue/backend/viewAddMedecin.php');
        } else {
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
//Controlleur Rendez-vous
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
        $secretaireManager = new SecrecretaireManager($db);
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