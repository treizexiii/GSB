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

    public function gestion(string $message = null)
    {
        $this->getModel('visiteur');
        if (!empty($_SESSION['message'])) {
            $data['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        $data['visiteur'] = $this->visiteur->getAll();
        $this->getView('gestionVisiteurs', $data);
    }

    public function details(string $id)
    {
        $this->getModel('visiteur');
        $visiteur = $this->visiteur->getVisiteurByID($id);
        $frais = $this->visiteur->getBillById($id);
        $infosVisiteur = [$visiteur, $frais];
        $this->getView('detailsVisiteur', $infosVisiteur);
    }

    public function detailsBill(string $id, string $mois)
    {
        $this->getModel('visiteur');
        $frais = $this->visiteur->getDetailBill($id, $mois);
        $this->getView('DetailsFraisVisiteur', $frais);
    }

    public function delete(string $id)
    {
        $this->getModel('visiteur');
        $_SESSION['message'] = $this->visiteur->deleteVisiteur($id);
        header("location: ". App::$root . "gestionVisiteurs");
        exit;
    }
}
