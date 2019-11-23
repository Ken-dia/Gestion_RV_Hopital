<?php
namespace App\Tables;
class Specialite 
{
    private $_id_specialite;
    private $_nom_specialite;
    private $_id_service;
    //CONSTRUCTEUR
    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) 
        {
            //var_dump($valeurs);die;
            $this->hydrate($valeurs);
        }
    }
    
    //GETTERS
    public function id_specialite(){ return $this->_id_specialite;}
    public function nom_specialite(){ return $this->_nom_specialite;}
    public function id_service(){ return $this->_id_service;}

    //SETTERS
    public function setId_specialite (int $id_specialite)
    { 
        $this->_id_specialite = $id_specialite;
    }
    public function setId_service (int $id_service)
    { 
        $this->_id_service = $id_service;
    }
    public function setNom_specialite (string $nom_specialite)
    { 
        $this->_nom_specialite = $nom_specialite;
    }
    //HYDRATATION
    public function hydrate(array $donnees)
   {
       foreach($donnees as $cle => $valeur)
       {
           $method = 'set'.ucfirst($cle);
           if(method_exists($this,$method))
           {
               
               $this->$method($valeur);
           }
       }

   }
    
}

?>