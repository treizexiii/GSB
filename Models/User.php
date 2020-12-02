<?php

class User extends Model
{
    public function __construct()
    {
        $this->table = "comptable";
        $this->getConnection();
    }

    public function setUser($user)
    {
        $sql = "SELECT `id`, `prenom`, `nom`, `email` FROM " . $this->table . " WHERE email =?";
        $query = $this->_connection->prepare($sql);
        $query->execute([$user]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($arrayOfUser)
    {
        $firstName = $arrayOfUser['firstName'];
        $lastName = $arrayOfUser['lastName'];
        $email = $arrayOfUser['email'];
        $password = $arrayOfUser['password'];
        $sql = "INSERT INTO " . $this->table . "(prenom, nom, email, password) VALUES (?,?,?,?)";
        $query = $this->_connection->prepare($sql);
        $query->execute([$firstName, $lastName, $email, $password]);
    }

    public function checkEmail($email)
    {
            $sql = "SELECT `email` FROM " . $this->table . " WHERE  email =?";
            $query = $this->_connection->prepare($sql);
            $query->execute([$email]);
            return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function checkPassword($login, $password)
    {
        $result = false;
        $sql = "SELECT `password` FROM " . $this->table . " WHERE email =?";
        $query = $this->_connection->prepare($sql);
        $query->execute([$login]);
        $logVerif = $query->fetch(PDO::FETCH_ASSOC);
        if ($logVerif && password_verify($password, $logVerif['password'])) {
            $result = true;
        }
        return $result;
    }
}
