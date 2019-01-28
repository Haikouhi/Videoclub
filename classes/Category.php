<?php

//Movie.php

class Category {
    protected $id; 
    protected $title;
    protected $description;
    

    public function __construct($title, $description) {
        $this->setTitle($title);
        $this->setDescription($description);
    }

     public function id(){
        return $this->id;
    }

    public function title(){
        return $this->title;
    }

    public function description(){
        return $this->description;
    }




    // setters

    public function setTitle($title) {
        $this->title = $title;
        return $this;

    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;

    }


    // methods
  public function save() {
        $host       = 'localhost'; // Hôte de la base de données
        $dbname     = 'videoclub'; // Nom de la bdd
        $port       = '3308'; // Ou 3308 selon la configuration
        $login      = 'root'; // Par défaut dans WAMP
        $password   = ''; // Par défaut dans WAMP (pour MAMP : 'root')
        try {
            // Essaie de faire ce script...
            $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8;port='.$port, $login, $password);
        }
        catch (Exception $e) {
            // Sinon, capture l'erreur et affiche la
            die('Erreur : ' . $e->getMessage());
        }
        $res = $bdd->prepare('INSERT INTO Category(title, description) VALUES(:title, :description)');
        $res->execute([
            "title" => $this->title(),
            "description" => $this->description()
        ]);

        $this->id = $bdd->lastInsertId();

    }
}
