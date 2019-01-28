<?php 


// au lieu de faire un require pour chaque class, on crée un dossier classes et on y met nos fichiers
// require 'Category.php';
// require 'Movie.php';
// require 'Actor.php';


foreach ( glob('classes/*.php') as $class) { require_once $class; }


$cat = new Category("Comédie", "Qui fait rire");
$cat->save();

$cat2 = new Category('Horror', 'Films qui font peur');
$cat2->save();

$cat3 = new Category('Action', 'Films qui font de l\'action');
$cat3->save();

// $catUser = new Category($_POST['name'], $_POST['description']);
// $catUser->save();


// $cat->delete();