<?php
class Secretaire
{
    private $_id_secretaire;
    private $_nom;
    private $_prenom;
    private $_num_telephone;
    private $_email;

    public function __construct($valeurs = [])
    {
        if(!empty($valeurs))
        {
            $this->hydrate($valeurs);
        }
    }
    //GETTERS
    public function id_secretaire(){ return $this->_id_secretaire;}
    public function nom(){ return $this->_nom;}
    public function prenom(){ return $this->_prenom;}
    public function num_telephone(){ return $this->_num_telephone;}
    public function email(){ return $this->_email;}
    //SETTERS
    public function setId_secretaire($id) { $this->_id_secretaire = $id;}
    public function setNom($nom) { $this->_nom = $nom;}
    public function setPrenom($prenom) { $this->_prenom = $prenom;}
    public function setEmail($email) { $this->_email = $email; }
    public function setNum_telephone($numero_telephone) { $this->_num_telephone = $numero_telephone;}
    public function hydrate(array $donnees)
    {
        foreach($donnees as $cle => $valeur)
       {
           $method = 'set'.ucfirst($cle);

           if(is_callable([$this,$method]))
           {
               $this->$method($valeur);
           }
       }
    }
}

?>