<?php

class Frais extends Model
{
    public function __construct()
    {
        $this->table = "fichefrais";
        $this->getConnection();
    }

    public function getBillById($userId, $etat = null)
    {
        if (!empty($etat)) {
            $sql = "SELECT `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat` FROM " . $this->table . " WHERE `idVisiteur`=? AND `idEtat`=?";
            $query = $this->_connection->prepare($sql);
            $query->execute([$userId, $etat]);
        } else {
            $sql = "SELECT `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat` FROM " . $this->table . " WHERE `idVisiteur`=?";
            $query = $this->_connection->prepare($sql);
            $query->execute([$userId]);
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInfosBill()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE `idVisiteur`=? AND idEtat=?";
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertNewBill($data)
    {
        $sqlVerif = "SELECT id FROM visiteur WHERE id=?";
        $query = $this->_connection->prepare($sqlVerif);
        if ($query->execute([$data['visiteur']]) == false) {
            return $message = "le visiteur n'existe pas";
        }
        echo 'ok';
    }
}
