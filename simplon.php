<?php
date_default_timezone_set('Africa/Dakar');

class Personne{
    protected $nom;
    protected $prenom;
    protected $matricule;

    public function __construct($nomp, $prenomp, $matriculep){
        $this->nom = $nomp;
        $this->prenom = $prenomp;
        $this->matricule = $matriculep;
    }


    public function getNom(){
        return $this->nom;

    }
    public function setNom($nomEntrant){
        $this->nom= $nomEntrant;

    }
    public function getPrenom(){
        return $this->prenom;

    }
    public function setPrenom($prenomEntrant){
        $this->prenom= $prenomEntrant;
        
    } public function getMatricule(){
        return $this->matricule;

    }
    public function setMatricule($matriculeEntrant){
        $this->matricule = $matriculeEntrant;
        
    }

    
    public function sePresenter(){
        echo "Bonjour, je suis {$this->nom } {$this->prenom}, j\'ai le matricule $this->matricule";

    }

}

class Etudiant extends Personne{

    private $dateNaissance;

    public function __construct($nomp, $prenomp, $matriculep,$dateNaissanceE){
        parent::__construct($nomp, $prenomp, $matriculep);
        $this->dateNaissance = $dateNaissanceE;

    }
    public function getDateNaissance(){
        return $this->dateNaissance;
    }
    public function setDateNaissance($dateNaissanceEntrant){
        $this->dateNaissance = $dateNaissanceEntrant;

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

interface IProfesseur{
    public function evaluerEtudiant($dateEvaluation);
    
}


class Professeur extends Personne implements IProfesseur{

    private $voiture;
    private $specialite;
    private $salaire;



    public function __construct($nomp, $prenomp, $matriculep,$voiture, $specialite, $salaire){
        parent::__construct($nomp, $prenomp, $matriculep);
        $this->voiture = $voiture;
        $this->specialite = $specialite;
        $this->salaire = $salaire;

    }
    public function getVoiture(){
        return $this->voiture;

    }
    public function setVoiture($voiture){
        $this->voiture = $voiture;

   }
   public function getSpecialite(){
    return $this->specialite;

    }
    public function setSpecialite($specialite){
        $this->voiture = $specialite;

    }
    public function getSalaire(){
        return $this->salaire;

    }
    public function setSalaire($salaire){
        $this->salaire = $salaire;

    }

    public function SePresenter() {
        echo "------------Présentation du professeur---------------\n";

        $aVoiture = $this->voiture ? 'j\'ai une voiture' : 'j\'ai pas de voiture';
        echo "Salut, je suis professeur, je m’appelle {$this->prenom} {$this->nom}, spécialisé dans le {$this->specialite},  mon matricule est {$this->matricule}. ($aVoiture), j’ai comme salaire {$this->salaire}. \n";
    }

    public function EvaluerEtudiant($dateEvaluation) {
        echo "Le professeur {$this->prenom} {$this->nom} évalue un étudiant le $dateEvaluation";
    }

}
$etudiant = new Etudiant("DIALLO", "Mariama", "E12345", "12/02/2000");
$etudiant->SePresenter();
$etudiant->FaireCours();
$etudiant->FaireEvaluation();



$professeur = new Professeur("KANE", "Samba", "P98765", true, "Back-end", 500000);
$professeur->SePresenter();
$professeur->EvaluerEtudiant(date("Y-m-d H:i:s"));