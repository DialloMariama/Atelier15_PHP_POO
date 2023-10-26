<?php
require_once 'Professeur.php';




class Evaluation {
    private $matiere;
    private $note;
    private $professeur;
    private $date;
    private $duree;

    public function __construct($matiere, $note, $professeur, $date, $duree) {
        $this->setMatiere($matiere);
        $this->setNote($note);
        $this->setProfesseur($professeur);
        $this->setDate($date);
        $this->setDuree($duree);
    }

    public function setMatiere($matiere) {
        if (!is_string($matiere) || empty($matiere)) {
            throw new Exception("La matière est invalide. Elle ne peut pas être vide.");
        }
        $this->matiere = $matiere;
    }

    public function getMatiere() {
        return $this->matiere;
    }

    public function setNote($note) {
        if (!is_numeric($note) || $note < 0 || $note > 20) {
            throw new Exception("La note est invalide. Elle doit être une valeur numérique entre 0 et 20.");
        }
        $this->note = $note;
    }

    public function getNote() {
        return $this->note;
    }

    public function setProfesseur($professeur) {
        if (!$professeur instanceof Professeur) {
            throw new Exception("Le professeur est invalide. Il doit être une instance de la classe Professeur.");
        }
        $this->professeur = $professeur;
    }

    public function getProfesseur() {
        return $this->professeur;
    }

    public function setDate($date) {
        $dateObj = DateTime::createFromFormat('Y-m-d', $date);
        if (!$dateObj || $dateObj->format('Y-m-d') !== $date) {
            throw new Exception("La date est invalide. Utilisez le format 'AAAA-MM-JJ'.");
        }
        $this->date = $date;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDuree($duree) {
        if (!is_numeric($duree) || $duree <= 0) {
            throw new Exception("La durée est invalide. Elle doit être un nombre positif.");
        }
        $this->duree = $duree;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function afficherEvaluation() {
        echo "Matière : {$this->matiere}\n";
        echo "Note : {$this->note}\n";
        echo "Professeur : {$this->professeur->getNomComplet()}\n";
        echo "Date : {$this->date}\n";
        echo "Durée : {$this->duree} minutes\n";
    }
}
$professeur = new Professeur("KANE", "Samba", "P98765", true, "Back-end", 500000);

$professeur->setNom("KANE");
$professeur->setPrenom("Samba");

$evaluation = new Evaluation("Laravel", 18, $professeur, date("Y-m-d"), 60);

$evaluation->afficherEvaluation();