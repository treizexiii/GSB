<?php 

class Database
{
    public $dns;
    public $dbname;
    public $username;
    public $password;
    public $connection;

    public function __construct()
    {
        $this->dns = "localhost";
        $this->dbname = "gsbfrais";
        $this->username = "root";
        $this->password = "";
        $this->dns = "mysql:dbname=" . $this->dbname . ";host=" . $this->dns;
        $this->connection = new PDO($this->dns, $this->username, $this->password);
    }
}
