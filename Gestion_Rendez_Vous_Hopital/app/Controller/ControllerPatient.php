<?php
namespace App\Controller;
use App\Model\Manager;
use App\Tables\Patient;
use App\Model\PatientManager;
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
    public static function findTelPatient($num_tel)
    {
        $db = Manager::connectDb();
        $patientManager = new PatientManager($db);
        $data = $patientManager->findTelPatient($num_tel);
        return $data;
        var_dump(data);die;
    }
}

?>