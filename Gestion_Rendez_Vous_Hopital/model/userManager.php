<?php
class UserManager extends User
{
    protected $_db;
    public function __construct(PDO $db)
    {
        $this->_db=$db;
    }
    public function add(User $user)
    {
        $requete= $this->_db->prepare("INSERT INTO users(profil,password_user)
        VALUES(:profil,:password_user)");
        $requete->bindValue(':profil', $user->Profil());
        $requete->bindValue(':password_user', $user->Password_user());
        return $requete->execute();
    }
    public function update(User $user)
    {
        $requete= $this->_db->prepare("UPDATE users SET profil = :profil,password_user = :password_user
        WHERE id_user = :id_user");
        $requete->bindValue(':profil', $user->Profil());
        $requete->bindValue(':password_user', $user->Password_user());
        $requete->bindValue(':id_user', $user->Id_user(),PDO::PARAM_INT);
        return $requete->execute();
    }
    public function listes()
    {
        $requete=$this->_db->query("SELECT id_user, profil, password_user FROM users");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $requete = $this->_db->exec("DELETE FROM users WHERE id_user =".(int)$id);
        return $requete;
    }
    public function liste($id)
    {
        $requete = $this->_db->prepare("SELECT id_user,profil,password_user FROM users
        WHERE id_user = :id_user");
        $requete->bindValue(':id_user', $id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verifyConnexion($login)
    {
        $requete = $this->_db->prepare("SELECT profil,password_user FROM users
        WHERE profil = :profil");
        $requete->bindValue(':profil', $login);
        $requete->execute();
        return $requete->fetch();
    }
}
?>