<?php
namespace App\Controller;
use App\Tables\Medecin;
use App\Model\{
    Manager,
    MedecinManager,
    SpecialiteManager
};

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
        $specialiteManager = new SpecialiteManager($db);
        $listesSpecialite = $specialiteManager->listesSpecialite();
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
?>