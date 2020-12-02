<?php

class Etat extends Model
{
    public function __construct()
    {
        $this->table = "etat";
        $this->getConnection();
    }
}