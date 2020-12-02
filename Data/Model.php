<?php

abstract class Model
{
    private $db;
    protected $_connection;
    public $table;

    public function getConnection()
    {
        $this->_connection = null;
        $this->db = new Database;
        $this->_connection = $this->db->connection;;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


}