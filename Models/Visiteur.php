<?php

class Visiteur extends Model
{
    public function __construct()
    {
        $this->table = "visiteur";
        $this->getConnection();
    }

    public function getVisiteurByID(string $id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  id =?";
        $query = $this->_connection->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getBillById(string $id)
    {
        $sql = "SELECT * FROM fichefrais
        INNER JOIN etat ON etat.id=fichefrais.idEtat
        WHERE fichefrais.idVisiteur=?
        ORDER BY fichefrais.mois";
        $query = $this->_connection->prepare($sql);
        $query->execute([$id]);
        return $query->fetchall(PDO::FETCH_ASSOC);
    }

    public function getDetailBill(string $id, string $mois)
    {
        $sql = "SELECT * FROM lignefraisforfait 
        INNER JOIN fraisforfait ON fraisforfait.id = lignefraisforfait.idFraisForfait
        WHERE idVisiteur=? AND mois=?";
        $query = $this->_connection->prepare($sql);
        $query->execute([$id, $mois]);
        return $query->fetchall(PDO::FETCH_ASSOC);
    }

    public function deleteVisiteur($id)
    {
        $message = "Erreur";
        try {
            $sqlFrais = "SELECT * FROM fichefrais NATURAL JOIN lignefraisforfait WHERE fichefrais.idVisiteur =?";
            $query = $this->_connection->prepare($sqlFrais);
            $query->execute([$id]);
            $listeFrais = $query->fetchall(PDO::FETCH_ASSOC);
            foreach ($listeFrais as $frais) {
                $sqlLigne = "INSERT INTO `lignefraisforfaitarchive`(`quantite`, `mois`, `idVisiteur`, `idFraisForfait`) 
                            VALUES (?, ?, ?, ?)";
                $sqlFiche = "INSERT INTO `fichefraisarchive`(`idVisiteur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) 
                            VALUES (?, ?, ?, ?, ?, ?)";
                $queryLigne = $this->_connection->prepare($sqlLigne);
                $queryFiche = $this->_connection->prepare($sqlFiche);
                $queryLigne->execute([$frais['quantite'], $frais['mois'], $frais['idVisiteur'], $frais['idFraisForfait']]);
                $queryFiche->execute([$frais['idVisiteur'], $frais['mois'], $frais['nbJustificatifs'], $frais['montantValide'], $frais['dateModif'], $frais['idEtat']]);
            }
            $delete = "DELETE FROM lignefraisforfait WHERE lignefraisforfait.idVisiteur=?";
            $query = $this->_connection->prepare($delete);
            $query->execute([$id]);
            $delete = "DELETE FROM fichefrais WHERE fichefrais.idVisiteur=?";
            $query = $this->_connection->prepare($delete);
            $query->execute([$id]);
            $sqlVisiteur = "SELECT * FROM " . $this->table . " WHERE  id =?";
            $query = $this->_connection->prepare($sqlVisiteur);
            $query->execute([$id]);
            $visiteur = $query->fetch(PDO::FETCH_ASSOC);
            $sqlVisiteur = "INSERT INTO `visiteurarchive`(`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`) 
                            VALUES (?,?,?,?,?,?,?,?,?)";
            $query = $this->_connection->prepare($sqlVisiteur);
            $query->execute([$visiteur['id'], $visiteur['nom'], $visiteur['prenom'], $visiteur['login'], $visiteur['mdp'], $visiteur['adresse'], $visiteur['cp'], $visiteur['ville'], $visiteur['dateEmbauche']]);
            $delete = "DELETE FROM visiteur WHERE visiteur.id =?";
            $query = $this->_connection->prepare($delete);
            $query->execute([$id]);
            $message = "Le visiteur " . $id . " a bien été basculé en archive.";
            return $message;
        } catch (Exception $e) {
            var_dump($e);
            echo 'error';
        }
    }
}
