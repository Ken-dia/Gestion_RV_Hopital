<?php
class SecrecretaireManager extends Secretaire
{
    protected $_db;
    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }
    public function add(Secretaire $secretaire)
    {
        $requete = $this->_db->prepare('INSERT INTO secretaire (nom, prenom, num_telephone, email)
        VALUES(:nom,:prenom,:num_telephone,:email)');
        $requete->bindValue(':nom',$secretaire->nom());
        $requete->bindValue(':prenom',$secretaire->prenom());
        $requete->bindValue(':num_telephone',$secretaire->num_telephone());
        $requete->bindValue(':email',$secretaire->email());
        return $requete->execute();
    }
    public function delete($id)
    {
        $requete = $this->_db->exec('DELETE FROM secretaire WHERE id_secretaire = '.(int) $id);
        return $requete;
    }
    public function update(Secretaire $secretaire)
    {
        $requete = $this->_db->prepare('UPDATE secretaire SET
        nom =:nom,prenom =:prenom,num_telephone =:num_telephone,email =:email
        WHERE id_secretaire = :id');

        $requete->bindValue(':nom',$secretaire->nom());
        $requete->bindValue(':prenom',$secretaire->prenom());
        $requete->bindValue(':num_telephone',$secretaire->num_telephone());
        $requete->bindValue(':email',$secretaire->email());
        $requete->bindValue(':id', $secretaire->id_secretaire(), PDO::PARAM_INT);
        
        return $requete->execute();
    }

    public function listes()
    {
        $requete = $this->_db->query('SELECT id_secretaire, nom, prenom, num_telephone, email FROM secretaire');
        //$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Secretaire');
        return $requete->fetchAll(PDO::FETCH_ASSOC);
       
    }
    public function liste($id)
    {
        $requete = $this->_db->prepare('SELECT id_secretaire, nom, prenom, num_telephone, email FROM secretaire WHERE id_secretaire = :id');
        $requete->bindValue(':id',$id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function search($chaine)
    {
        $requete = $this->_db->prepare("SELECT id_secretaire, nom, prenom, num_telephone, email
        FROM secretaire WHERE nom LIKE ? OR prenom LIKE ? ");
        $requete->bindParam(1, $chaine);
        $requete->bindParam(2, $chaine);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>