<?php
namespace App\Tables;
class Patient
{
    private $_id_patient;
    private $_nom;
    private $_prenom;
    private $_dateNaiss;
    private $_num_telephone;
    private $_email;
    public function __construct($valeurs = [])
    {
        if(!empty($valeurs))
        {
            $this->hydrate($valeurs);
        }
    }
    
    public function id_patient(){ return $this->_id_patient;}
    public function nom(){ return $this->_nom;}
    public function prenom(){ return $this->_prenom;}
    public function dateNaiss(){ return $this->_dateNaiss;}
    public function num_telephone(){ return $this->_num_telephone;}
    public function email(){ return $this->_email;}

    public function setId_patient($id)
    {
        $id = (int)$id;
        if($id > 0)
        {
            $this->_id_patient = $id;
        }
    }

    public function setNom($nom)
    {
        if(is_string($nom))
        {
            $this->_nom = $nom;
        }
    }
    public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->_prenom = $prenom;
        }
    }
    public function setEmail($email)
    {
        if(is_string($email))
        {
            $this->_email = $email;
        }
    }
    public function setNum_telephone($numero_telephone)
    {
        if(is_string($numero_telephone))
        {
            $this->_num_telephone = $numero_telephone;
        }
    }
    public function setDateNaiss($dateNaiss)
    {
        if(is_string($dateNaiss))
        {
            $this->_dateNaiss = $dateNaiss;
        }
    }
    public function hydrate(array $donnees)
    {
        foreach($donnees as $cle => $valeur)
        {
            //on recupére le nom du setteur correspondant à l'attribut
            $method = 'set'.ucfirst($cle);
            
            //si le setteur correspondant existe 
            if(method_exists($this,$method))
            {
                //on appelle le setteur
                $this->$method($valeur);
            }
        }
    }
}
?>