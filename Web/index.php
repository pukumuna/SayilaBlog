<?php

const DEFAULT_APP = 'Frontend';

$Dir = __DIR__;
echo '<br><br><br><br><br>DIR:', $Dir;
  

//if (!empty($_GET['app']))
//    echo '<br>!!! $-GET-APP not vide = ', $_GET['app'] ; 


$lenWeb = 4; // lenweb -> "/Web = 4"
$Dir = substr ($Dir , 0 , $Lgr= strlen($Dir) - $lenWeb );

// Si l'application n'est pas valide, on va charger l'application par défaut qui se chargera de générer une erreur 404
if (!isset($_GET['app']) || !file_exists($Dir.'/App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// On commence par inclure la classe nous permettant d'enregistrer nos autoload

require $Dir.'/Lib/OCFram/SplClassLoader.php';

// On va ensuite enregistrer les autoloads correspondant à chaque vendor (OCFram, App, Model, etc.)
$OCFramLoader = new SplClassLoader('OCFram', $Dir.'/Lib');
$OCFramLoader->register();

$appLoader = new SplClassLoader('App', $Dir.'/');
$appLoader->register();

$modelLoader = new SplClassLoader('Model', $Dir.'/Lib/Vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', $Dir.'/Lib/Vendors');
$entityLoader->register();

// Il ne nous suffit plus qu'à déduire le nom de la classe et à l'instancier
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
//echo ' <br> AppClass = ', $appClass ;
$app = new $appClass($Dir,$_GET['app']);
$app->run();