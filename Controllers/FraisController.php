<?php

class FraisController extends Controller
{
    public function index()
    {
    }

    public function createBill()
    {
        if (empty($_POST)) {
            $data = [];
            $this->getModel('visiteur');
            $visiteurs = $this->visiteur->getAll();
            $this->getModel('fraisforfait');
            $libelle = $this->fraisforfait->getAll();
            $data['visiteurs'] = $visiteurs;
            $data['libelles'] = $libelle;
            $this->getView('ajout', $data);
        }
        else {
            $this->getModel('frais');
            $data = $this->frais->insertNewBill($_POST);        
        }
    }
}
