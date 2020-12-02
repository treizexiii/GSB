<?php

class Visiteur extends Model
{
    public function __construct()
    {
        $this->table = "visiteur";
        $this->getConnection();
    }
}