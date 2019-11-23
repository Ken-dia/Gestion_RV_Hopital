<?php
namespace App\Model;
use App\Tables\Specialite;
use \PDO;

class SpecialiteManager extends Specialite
{

    private  $_db;
    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }
    public function addSpecialite(Specialite $specialite)
    {
        $requete =$this->_db->prepare("INSERT INTO domaine(nom_specialite,id_service)
         VALUES (:nom_specialite,:id_service)");
        $requete->bindValue(':nom_specialite', $specialite->nom_specialite());
        $requete->bindValue(':id_service', $specialite->id_service(),PDO::PARAM_INT);
        return $requete->execute();
    }
    public function updateSpecialite(Specialite $specialite)
    {
        $requete = $this->_db->prepare("UPDATE domaine SET nom_specialite = :nom_specialite, id_service = :id_service
         WHERE id_domaine =:id");
         $requete->bindValue(':nom_specialite', $specialite->nom_specialite());
         $requete->bindValue(':id_service', $specialite->id_service(),PDO::PARAM_INT);
         $requete->bindValue(':id', $specialite->id_specialite(),PDO::PARAM_INT);
         return $requete->execute();
    }
    public function deleteSpecialite($id_specialite)
    {
        $requete= $this->_db->exec("DELETE FROM domaine WHERE id_domaine=".(int)$id_specialite);
        return $requete;
    }
    public function listesSpecialite()
    {
        $requete = $this->_db->query("SELECT id_domaine,nom_specialite,nom
         FROM domaine,specialite WHERE id_service=id_specialite");
         $requete->execute();
        return $requete->fetchAll();
        
    }
    public function listeSpecialite(int $id_specialite)
    {
        $requete=$this->_db->prepare("SELECT id_domaine, nom_specialite,id_service
        FROM domaine WHERE id_domaine=:id");
        $requete->bindValue(':id',$id_specialite,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetch();
    }
}

?>