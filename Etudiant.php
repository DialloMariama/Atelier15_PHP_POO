<?php

require_once('Personne.php');
require_once('IEtudiant.php');



    
class Etudiant extends Personne implements IEtudiant{

    private $dateNaissance;

    public function __construct($nom, $prenom, $matricule,$dateNaissance){
        parent::__construct($nom, $prenom, $matricule);
        $this->setDateNaissance($dateNaissance);

    }
    public function getDateNaissance(){
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance) {
        $dateNaissance = DateTime::createFromFormat('d/m/Y', $dateNaissance);
        if ($dateNaissance === false) {
            throw new Exception("La date de naissance est invalide. Utilisez le format 'jj/mm/aaaa'.");
        }

        $this->dateNaissance = $dateNaissance->format('d/m/Y');
    }

   public function SePresenter() {
        echo "------------Présentation de l'étudiant---------------\n";
        echo "bonjour, je suis étudiante, je m’appelle {$this->prenom} {$this->nom} je suis née le {$this->getDateNaissance()} mon matricule est {$this->matricule}. \n";
}
   public function faireCours(){
        echo "L'étudiant {$this->getNom()} {$this->getPrenom()} du matricule {$this->getMatricule()} née le {$this->getDateNaissance()} suit un cours \n";

   }
   public function faireEvaluation(){
        echo "L'étudiant {$this->getNom()} {$this->getPrenom()} du matricule {$this->getMatricule()} née le {$this->getDateNaissance()} dois faire une évaluation le". date("Y-m-d H:i:s") ."\n";
        echo "\n";
        echo "\n";
   }
}
$etudiant = new Etudiant("DIALLO", "Mariama", "E12345", "12/02/2000");
$etudiant->SePresenter();
$etudiant->FaireCours();
$etudiant->FaireEvaluation();
