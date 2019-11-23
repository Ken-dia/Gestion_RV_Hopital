<?php
namespace App\Tables;
class Service
{
   private $_id_service;
   private $_nom_service;
   private $_id_secretaire;
   
   public function __construct($valeurs = [])
   {
       if (!empty($valeurs)) 
       {
           //var_dump($valeurs);die;
           $this->hydrate($valeurs);
       }
   }
       
   public function id_service()
   {
       return $this->_id_service;
   }
   public function id_secretaire()
   {
       return $this->_id_secretaire;
   }


   public function nom_service()
   {
       return $this->_nom_service;
   }

   public function setId_service($id)
   {
       $id=(int)$id;
       if($id > 0)
       {
           $this->_id_service = $id;
       }
   }
   public function setId_secretaire($id)
   {
       $id=(int)$id;
       if($id > 0)
       {
           $this->_id_secretaire = $id;
       }
   }

   public function setNom_service($nom_service)
   {
       if(is_string($nom_service))
       {
           $this->_nom_service = $nom_service;
       }
   }
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