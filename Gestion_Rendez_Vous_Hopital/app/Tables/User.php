<?php
namespace App\Tables;
class User
{
    private $_id_user;
    private $_profil;
    private $_password_user;

    //CONSTRUCTEUR
    public function __construct($valeurs = [])
    {
        if(!empty($valeurs))
        {
            $this->hydrate($valeurs);
        }
    }
    //GETTERS
    public function Id_user(){ return $this->_id_user; }
    public function Profil(){ return $this->_profil;}
    public function Password_user() { return $this->_password_user;}
    //SETTERS
    public function setid_user($id_user) {
        $id_user = (int) $id_user;
        if($id_user > 0)
        {
            $this->_id_user = $id_user;
        }
    }
    public function setProfil($profil)
    {
        if(is_string($profil))
        {
            $this->_profil = $profil;
        }
    }
    public function setPassword_user($password_user)
    {
        if(is_string($password_user))
        {
            $this->_password_user = $password_user;
        }
    }
    public function hydrate(array $donnees)
    {
        foreach($donnees as $cle=> $valeur)
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