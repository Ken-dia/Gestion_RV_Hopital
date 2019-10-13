<?php
class Medecin
{
    private $_id_medecin;
    private $_nom;
    private $_prenom;
    private $_num_telephone;
    private $_email;
    private $_id_service;    
    public function __construct($valeurs = [])
    {
        if(!empty($valeurs))
        {
            $this->hydrate($valeurs);
        }
        
    }
//GETTERS
    public function id_service(){ return $this->_id_service;}
    public function id_Medecin(){ return $this->_id_medecin;}
    public function nom(){ return $this->_nom;}
    public function prenom(){ return $this->_prenom;}
    public function num_telephone(){ return $this->_num_telephone;}
    public function email(){ return $this->_email;}


    //SETTERS

    public function setId_service($specialite)
    {
        $specialite = (int) $specialite;
        if($specialite > 0)
        {
            $this->_id_service = $specialite;
        }
    }
    public function setId_medecin($id)
    {
        $id = (int)$id;
        if($id > 0)
        {
            $this->_id_medecin = $id;
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
    
//HYDRATATION DE L'OBJET
    public function hydrate(array $donnees)
    {
        foreach($donnees as $cle=>$valeur)
        {
            $method = 'set'.ucfirst($cle);
            if(method_exists($this,$method))
            {
                $this->$method($valeur);
            }
        }
    }
}

