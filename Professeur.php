<?php

require_once('Personne.php');


class Professeur extends Personne{

    private $voiture;
    private $specialite;
    private $salaire;



    public function __construct($nom, $prenom, $matricule,$voiture, $specialite, $salaire){
        parent::__construct($nom, $prenom, $matricule);
        $this->setVoiture($voiture);
        $this->setSpecialite($specialite);
        $this->setSalaire($salaire);

    } 

    public function getNomComplet() {
        return $this->getPrenom() . ' ' . $this->getNom();
    }

    public function getVoiture(){
        return $this->voiture;

    }
    public function setVoiture($voiture) {
        if (!is_bool($voiture)) {
            throw new Exception("La valeur de l'attribut 'voiture' doit être booléenne.");
        }

        $this->voiture = $voiture;
    }

   public function getSpecialite(){
    return $this->specialite;

    }
   public function setSpecialite($specialite) {
        if (!is_string($specialite) || empty($specialite)) {
            throw new Exception("La spécialité est invalide. Elle ne peut pas être vide.");
        }

        $this->specialite = $specialite;
    }
    public function getSalaire(){
        return $this->salaire;

    }
    public function setSalaire($salaire) {
        if (!is_numeric($salaire) || $salaire < 0) {
            throw new Exception("Le salaire est invalide. Il doit être une valeur numérique positive.");
        }

        $this->salaire = $salaire;
    }

    public function SePresenter() {
        echo "------------Présentation du professeur---------------\n";

        $aVoiture = $this->voiture ? 'j\'ai une voiture' : 'j\'ai pas de voiture';
        echo "Salut, je suis professeur, je m’appelle {$this->prenom} {$this->nom}, spécialisé dans le {$this->specialite},  mon matricule est {$this->matricule}. ($aVoiture), j’ai comme salaire {$this->salaire}. \n";
    }

}


$professeur = new Professeur("KANE", "Samba", "P98765", true, "Back-end", 500000);
$professeur->SePresenter();


