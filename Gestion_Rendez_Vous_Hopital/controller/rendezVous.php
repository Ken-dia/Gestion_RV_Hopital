<?php
class RendezVous
{
    private $_id_RV;
    private $_date_RV;
    private $_heure_RV;
    private $_id_patient;
    private $_id_medecin;
    private $_id_secretaire;

    public function __construct($valeurs = [])
    {
        if(!empty($valeurs))
        {
            $this->hydrate($valeurs);
        }

        
    }

    //GETTERS
    public function Id_RV(){ return $this->_id_RV;}
    public function Date_RV(){ return $this->_date_RV;}
    public function Heure_RV(){ return $this->_heure_RV;}
    public function Id_Patient(){ return $this->_id_patient;}
    public function Id_Medecin(){ return $this->_id_medecin;}
    public function Id_Secretaire(){ return $this->_id_secretaire;}
    //SETTERS
    public function setId_RV($id)
    {
        $id = (int) $id;
        if($id > 0)
        {
            $this->_id_RV = $id;
        }
    }

    public function setId_Patient($id)
    {
        $id = (int) $id;
        if($id > 0)
        {
            $this->_id_patient = $id;
        }
    }

    public function setId_Medecin($id)
    {
        $id = (int) $id;
        if($id > 0)
        {
            $this->_id_medecin = $id;
        }
    }

    public function setId_Secretaire($id)
    {
        $id = (int) $id;
        if($id > 0)
        {
            $this->_id_secretaire = $id;
        }
    }

    public function setHeure_RV($heureRV)
    {
        $this->_heure_RV = $heureRV;
    }
    public function setDate_RV($dateRV)
    {
        $this->_date_RV = $dateRV;
    }
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