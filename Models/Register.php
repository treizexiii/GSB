<?php

class Register extends Model
{
    public function __construct()
    {
        $this->table = 'visiteur';
        $this->getConnection();
    }

    public function getLogPass($login)
    {
        $sql = "SELECT `login`, `mdp` FROM `visiteur` WHERE login =?";
        $query = $this->_connection->prepare($sql);
        $query->execute([$login]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}