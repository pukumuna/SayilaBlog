<?php
namespace App\Backend;

use \FramWK\Application;

class BackendApplication extends Application
{
  public function __construct($dirApp, $nameApp)
  {
    parent::__construct($dirApp, $nameApp);

   // $this->name = 'Backend';
    //$this->appDirectory = $appliDir;
  }

  public function run()
  { //echo '<br><br>Run de BackendApplication'; 
  
    //if ($this->internaute->isAuthenticated())
    if ($this->internaute()->isAdministrateur()) {
        //echo '<br><br><br><br>Gugu : getController';
      $controller = $this->getController();
    }
    else
    { //echo '<br><br><br><br>Toto : ConnexionController';
      $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
    }
    //echo '<br><br><br>Execute de BackendApplication ';
    $controller->execute();

    //echo '<br><br><br>HttpResponse setpage';
    
    //echo '<br><br><br>HttpResponse send';
    
    //$this->httpResponse->setPage($controller->page());
    //$this->httpResponse->send();
    $this->httpResponse->send($controller,$this->internaute()); 


  }
}