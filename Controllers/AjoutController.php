<?php

class AjoutController extends Controller
{
    public function index()
    {
        $data = [];
        $this->getModel('visiteur');
        $visiteurs = $this->visiteur->getAll();
        $this->getModel('fraisforfait');
        $libelle = $this->fraisforfait->getAll();
        $data['visiteurs'] = $visiteurs;
        $data['libelles'] = $libelle;
        $this->getView('ajout', $data);
    }
}