<?php
class MedecinManager extends Medecin
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(Medecin $medecin)
    {
        $requete = $this->_db->prepare('INSERT INTO medecin (nom, prenom, num_telephone, email, id_service)
        VALUES(:nom,:prenom,:num_telephone,:email,:id_service)');
        $requete->bindValue(':nom', $medecin->nom());
        $requete->bindParam(':prenom', $medecin->prenom());
        $requete->bindParam(':num_telephone', $medecin->num_telephone());
        $requete->bindParam(':email', $medecin->email());
        $requete->bindParam(':id_service', $medecin->id_service());
        return $requete->execute();
        $medecin->hydrate([
            'id_medecin' => $this->_db->lastInsertId()
        ]);
    }
    public function delete($id)
    {
        $requete = $this->_db->exec('DELETE FROM medecin WHERE id_medecin = '.(int) $id);
        return $requete;
    }
    public function update(Medecin $medecin)
    {
        $requete = $this->_db->prepare('UPDATE medecin SET
        nom = :nom,prenom = :prenom,num_telephone = :num_telephone,email = :email,id_service = :id_service
        WHERE id_medecin = :id');

        $requete->bindValue(':nom', $medecin->nom());
        $requete->bindValue(':prenom', $medecin->prenom());
        $requete->bindValue(':num_telephone', $medecin->num_telephone());
        $requete->bindValue(':email', $medecin->email());
        $requete->bindValue(':id_service', $medecin->id_service());
        $requete->bindValue(':id', $medecin->id_medecin());
        
        return $requete->execute();
    }

    public function listes()
    {
        $requete = $this->_db->prepare('SELECT m.id_medecin,m.nom AS nom_medecin,prenom,num_telephone,email,s.nom AS nom_service,m.id_service
        FROM medecin m,specialite s WHERE m.id_service = s.id_specialite');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function liste($id)
    {
        $requete = $this->_db->prepare('SELECT id_medecin,nom,prenom,num_telephone,email,id_service
        FROM medecin WHERE id_medecin = :id');
        $requete->bindValue(':id', (int) $id);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findMedecin($chaine)
    {
        $requete = $this->_db->prepare('SELECT m.id_medecin,m.nom AS nom_medecin,prenom,num_telephone,email,s.nom AS nom_service,m.id_service
        FROM medecin m,specialite s WHERE m.id_service = s.id_specialite AND m.nom LIKE :chaine OR prenom LIKE :chaine');
        $requete->bindValue(':chaine',  $chaine);
        $requete->bindValue(':chaine',  $chaine);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findPlanning($chaine)
    {
        $requete = $this->_db->prepare("SELECT r.date_RV,r.heure_RV,m.nom AS nom_medecin,m.prenom AS prenom_medecin,p.nom AS nom_patient,p.prenom AS prenom_patient
        FROM medecin m,rendez_vous r,patient p
        WHERE m.id_medecin = r.id_medecin AND (m.nom LIKE :chaine OR m.prenom LIKE :chaine) AND r.id_patient = p.id_patient");
        $requete->bindValue(':chaine',  $chaine);
        $requete->bindValue(':chaine',  $chaine);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function DateNomPlanning($chaine,$date_RV)
    {
        $requete = $this->_db->prepare("SELECT r.date_RV,r.heure_RV,m.nom AS nom_medecin,m.prenom AS prenom_medecin,p.nom AS nom_patient,p.prenom AS prenom_patient
        FROM medecin m,rendez_vous r,patient p
        WHERE m.id_medecin = r.id_medecin AND r.id_patient=p.id_patient AND (m.nom LIKE :chaine OR m.prenom LIKE :chaine) AND r.date_RV = :date_RV");
        $requete->bindValue(':chaine',  $chaine);
        $requete->bindValue(':chaine',  $chaine);
        $requete->bindValue(':date_RV',  $date_RV);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>