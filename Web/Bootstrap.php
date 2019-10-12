<?php

const DEFAULT_APP = 'Frontend';

$Dir = __DIR__;


if (!empty($internaute) && $internaute->isAuthenticated())
   $_GET['app'] = 'Backend';

$lenWeb = 4; // lenweb -> "/Web = 4"
$Dir = substr ($Dir , 0 , $Lgr= strlen($Dir) - $lenWeb );

 
// Si l'application n'est pas valide, on va charger l'application par défaut qui se chargera de générer une erreur 404
if (!isset($_GET['app']) || !file_exists($Dir.'/App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// On commence par inclure la classe nous permettant d'enregistrer nos autoload

require $Dir.'/Lib/FramWK/SplClassLoader.php';

// On va ensuite enregistrer les autoloads correspondant à chaque vendor (OCFram, App, Model, etc.)
$FramLoader = new SplClassLoader('FramWK', $Dir.'\Lib');
$FramLoader->register();

$appLoader = new SplClassLoader('App', $Dir);
$appLoader->register();

$modelLoader = new SplClassLoader('Model', $Dir.'\Lib\Vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', $Dir.'\Lib\Vendors');
$entityLoader->register();

// Il ne nous suffit plus qu'à déduire le nom de la classe et à l'instancier
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass($Dir,$_GET['app']);
$app->run();

?>