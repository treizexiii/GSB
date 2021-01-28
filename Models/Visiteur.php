<?php

class Visiteur extends Model
{
    public function __construct()
    {
        $this->table = "visiteur";
        $this->getConnection();
    }

    public function getVisiteurByID(string $id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  id =?";
        $query = $this->_connection->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}