<?php
namespace App\Model;
use App\Tables\RendezVous;
use \PDO;

class RendezVousManager extends RendezVous
{
    private $_db;
    public function __construct(\PDO $db)
    {
        $this->_db = $db;
    }
    public function add(RendezVous $RV)
    {
        $requete = $this->_db->prepare("INSERT INTO rendez_vous(date_RV,heure_RV,id_patient,id_medecin,id_secretaire)
        VALUES(:date_RV,:heure_RV,:id_patient,:id_medecin,:id_secretaire)");
        $requete->bindValue(':date_RV',$RV->Date_RV());
        $requete->bindValue(':heure_RV',$RV->Heure_RV());
        $requete->bindValue(':id_patient',$RV->Id_Patient(),PDO::PARAM_INT);
        $requete->bindValue(':id_medecin',$RV->Id_Medecin(),PDO::PARAM_INT);
        $requete->bindValue(':id_secretaire',$RV->Id_Secretaire(),PDO::PARAM_INT);
        return $requete->execute();
    }
    public function update(RendezVous $RV)
    {
        $requete = $this->_db->prepare("UPDATE rendez_vous SET date_RV=:date_RV,heure_RV=:heure_RV,id_patient=:id_patient,id_medecin=:id_medecin,id_secretaire=:id_secretaire
        WHERE id_RV = :id_RV");
        $requete->bindValue(':date_RV',$RV->Date_RV());
        $requete->bindValue(':heure_RV',$RV->Heure_RV());
        $requete->bindValue(':id_patient',$RV->Id_Patient(),PDO::PARAM_INT);
        $requete->bindValue(':id_medecin',$RV->Id_Medecin(),PDO::PARAM_INT);
        $requete->bindValue(':id_secretaire',$RV->Id_Secretaire(),\PDO::PARAM_INT);
        $requete->bindValue(':id_RV',$RV->Id_RV(),\PDO::PARAM_INT);
        return $requete->execute();
    }
    public function listes()
    {
        $requete= $this->_db->query("SELECT r.id_RV,Date_FORMAT(r.date_RV,'%d/%m/%Y') AS date_RV,r.heure_RV,p.prenom AS prenom_patient,p.nom AS nom_patient,
        m.prenom AS prenom_medecin,m.nom AS nom_medecin,s.prenom AS prenom_secretaire,s.nom AS nom_secretaire
        FROM rendez_vous r,patient p,secretaire s,medecin m WHERE r.id_patient = p.id_patient AND r.id_medecin = m.id_medecin
        AND r.id_secretaire = s.id_secretaire");
        $requete->execute();
        return $requete->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function liste($id)
    {
        $requete = $this->_db->prepare("SELECT id_RV,date_RV,heure_RV,id_patient,id_medecin,id_secretaire
        FROM rendez_vous WHERE id_RV = :id_RV");
        $requete->bindValue(':id_RV',$id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $requete = $this->_db->exec('DELETE FROM rendez_vous WHERE id_RV ='.(int) $id);
        return $requete;
    }
    public function findDateRV($date_RV)
    {
        $requete = $this->_db->prepare("SELECT  r.id_RV,Date_FORMAT(r.date_RV,'%d/%m/%Y') AS date_RV,r.heure_RV,p.prenom AS prenom_patient,p.nom AS nom_patient,
         m.prenom AS prenom_medecin,m.nom AS nom_medecin,s.prenom AS prenom_secretaire,s.nom AS nom_secretaire
         FROM rendez_vous r,patient p,secretaire s,medecin m
         WHERE r.id_patient = p.id_patient AND r.id_medecin = m.id_medecin AND r.id_secretaire = s.id_secretaire
         AND r.date_RV = :date_RV");
        $requete->bindValue(':date_RV', $date_RV);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findHeureValide($id_medecin,$date_RV,$heure_RV)
    {
        $requete = $this->_db->prepare("SELECT  count(heure_RV)
         FROM rendez_vous
         WHERE id_medecin = :id_medecin AND date_RV = :date_RV AND heure_RV = :heure_RV
         ");
        $requete->bindValue(':id_medecin', $id_medecin,PDO::PARAM_INT);
        $requete->bindValue(':date_RV', $date_RV);
        $requete->bindValue(':heure_RV', $heure_RV);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>