<?php

class VisiteurController extends Controller
{
    public function index()
    {
        $visiteur = [];
        $frais = [];
        $this->getModel('visiteur');
        $visiteur = $this->visiteur->getAll();
        $this->getModel('Etat');
        $status = $this->Etat->getAll();
        if (isset($_POST['userSelected'])) :
            $this->getModel('Frais');
            if ($_POST['etat'] == "tous") {
                $frais = $this->Frais->getBillById($_POST['user']);
                $data['frais'] = $frais;
            } else {
                $frais = $this->Frais->getBillById($_POST['user'], $_POST['etat']);
                $data['frais'] = $frais;
            }
        endif;
        $data['etat'] = $status;
        $data['visiteur'] = $visiteur;
        $this->getView('frais', $data);
    }

    public function gestion()
    {
        $visiteur = [];
        $frais = [];
        $this->getModel('visiteur');
        $visiteur = $this->visiteur->getAll();
        $this->getView('gestionVisiteurs', $visiteur);
    }

    public function details(string $id)
    {
        $this->getModel('visiteur');
        $this->getModel('Frais');
        $visiteur = $this->visiteur->getVisiteurByID($id);
        $frais = $this->Frais->getBillById($id);
        $infosVisiteur = [$visiteur, $frais];
        $this->getView('detailsVisiteur', $infosVisiteur);
    }

    public function deleteVisiteur(string $id)
    {
        $message = ['Le visiteur a bien été effacé.'];
        $this->getModel('visiteur');
        $this->getModel('Frais');
    }
}