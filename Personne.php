<?php
date_default_timezone_set('Africa/Dakar');


    class Personne {
        protected $nom;
        protected $prenom;
        protected $matricule;
     
    
        public function setNom($nom) {
            if (!preg_match('/^[A-Za-z\s\-]+$/', $nom)) {
                throw new Exception("Le nom est invalide. Il doit contenir uniquement des lettres, des espaces et des tirets.");
            }
    
            $this->nom = $nom;
        }
    
        public function getNom() {
            return $this->nom;
        }
    
        public function setPrenom($prenom) {
            if (!preg_match('/^[A-Za-z]+$/', $prenom)) {
                throw new Exception("Le prénom est invalide. Il doit contenir uniquement des lettres, des espaces et des tirets.");
            }
    
            $this->prenom = $prenom;
        }
    
        public function getPrenom() {
            return $this->prenom;
        }

        
        public function __construct($nom, $prenom, $matricule){
            $this->setNom($nom);
            $this->setPrenom($prenom);
            $this->setMatricule($matricule);
        }
    
        public function setMatricule($matricule) {
            if (!preg_match('/^[A-Z0-9]+$/', $matricule)) {
                throw new Exception("Le matricule est invalide. Il doit contenir des lettres majuscules et des chiffres.");
            }
    
            $this->matricule = $matricule;
        }
    
        public function getMatricule() {
            return $this->matricule;
        }
    
        public function sePresenter() {
            echo "Bonjour, je suis {$this->nom } {$this->prenom}, j'ai le matricule {$this->matricule}\n";
        }
    }



