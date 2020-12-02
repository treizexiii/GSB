<?php

class FraisForfait extends Model
{
    public function __construct()
    {
        $this->table = "fraisforfait";
        $this->getConnection();
    }
}