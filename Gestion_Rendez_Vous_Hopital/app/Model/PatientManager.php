<?php
namespace App\Model;
use App\Tables\Patient;
use \PDO;

class PatientManager extends Patient
{
    private $_db;
    
    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(Patient $patient)
    {
        $requete = $this->_db->prepare('INSERT INTO patient (nom,prenom,dateNaiss,num_telephone,email)
        VALUES(:nom,:prenom,:dateNaiss,:num_telephone,:email)');
        $requete->bindValue('nom', $patient->nom());
        $requete->bindValue('prenom',$patient->prenom());
        $requete->bindValue(':dateNaiss', $patient->dateNaiss());
        $requete->bindValue(':num_telephone', $patient->num_telephone());
        $requete->bindValue(':email', $patient->email());

        return $requete->execute();
    }

    public function update(Patient $patient)
    {
        $requete = $this->_db->prepare('UPDATE patient SET nom =:nom, prenom =:prenom, dateNaiss=:dateNaiss, num_telephone =:num_telephone, email =:email
        WHERE id_patient =:id');
       
        $requete->bindValue('nom', $patient->nom());
        $requete->bindValue('prenom',$patient->prenom());
        $requete->bindValue(':dateNaiss', $patient->dateNaiss());
        $requete->bindValue(':num_telephone', $patient->num_telephone());
        $requete->bindValue(':email', $patient->email());
    $requete->bindValue(':id', $patient->id_patient(),PDO::PARAM_INT);
        return $requete->execute();

    }

    public function liste($id)
    {
        $requete = $this->_db->prepare("SELECT id_patient,nom,prenom,dateNaiss,num_telephone,email FROM patient WHERE id_patient = :id_patient");
        $requete->bindValue(':id_patient', $id, PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listes()
    {
        $requete = $this->_db->query("SELECT id_patient,nom,prenom,DATE_FORMAT(dateNaiss, '%d/%m/%Y') AS dateNaiss,num_telephone,email FROM patient");

        return $requete->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function delete($id)
    {
        $requete = $this->_db->exec('DELETE FROM patient WHERE id_patient ='.(int) $id);
        return $requete;
    }
    public function find($chaine)
    {
        $requete = $this->_db->prepare("SELECT id_patient,nom,prenom,DATE_FORMAT(dateNaiss, '%d/%m/%Y') AS dateNaiss,num_telephone,email
         FROM patient WHERE prenom LIKE :chaine or nom LIKE :chaine");
        $requete->bindValue(':chaine', $chaine);
        $requete->bindValue(':chaine', $chaine);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findTelPatient($tel_name)
    {
        $requete = $this->db->query("SELECT num_telephone,id_patient,prenom,nom FROM patient WHERE num_telephone LIKE '$tel_name%'");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }

}
?>