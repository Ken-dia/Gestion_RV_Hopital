<?php
namespace App\Model;

use App\Tables\Service;
use \PDO;

class ServiceManager extends Service
{
    protected $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;   
    }

    public function add(Service $service)
    {
        $requete = $this->_db->prepare('INSERT INTO specialite(nom,id_secretaire) VALUES(:nom,:id_secretaire)');
        $requete->bindValue(':nom',$service->nom_service());
        $requete->bindValue(':id_secretaire', $service->id_secretaire(),PDO::PARAM_INT);
        return $requete->execute();
    }

    public function update(Service $service)
    {
        $requete = $this->_db->prepare('UPDATE specialite SET nom =:nom,id_secretaire =:id_secretaire
        WHERE id_specialite = :id');
        $requete->bindValue(':nom',$service->nom_service());
        $requete->bindValue(':id_secretaire', $service->id_secretaire(),PDO::PARAM_INT);
        $requete->bindValue(':id',$service->id_service(),PDO::PARAM_INT);
        return $requete->execute();
    }
    
    public function delete($id)
    {
        $requete = $this->_db->exec('DELETE FROM specialite WHERE id_specialite = '.(int) $id);
        return $requete;
    }

    public function listes()
    {
        $requete = $this->_db->query('SELECT secretaire.id_secretaire, specialite.nom,secretaire.nom AS nom_secretaire,secretaire.prenom AS prenom_secretaire,id_specialite
         FROM specialite,secretaire WHERE specialite.id_secretaire = secretaire.id_secretaire');
        //$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Secretaire');
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function liste($id)
    {
        $requete = $this->_db->prepare('SELECT id_specialite,nom,id_secretaire FROM specialite WHERE id_specialite = :id');
        $requete->bindValue(':id',$id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }
    public function find($chaine)
    {
        $requete = $this->_db->prepare('SELECT secretaire.id_secretaire, specialite.nom,secretaire.nom AS nom_secretaire,
        secretaire.prenom AS prenom_secretaire,id_specialite
        FROM specialite,secretaire WHERE specialite.id_secretaire = secretaire.id_secretaire AND specialite.nom LIKE :chaine');
        $requete->bindValue(':chaine',$chaine);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>