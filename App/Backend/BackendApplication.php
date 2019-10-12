<?php
namespace App\Backend;

use \FramWK\Application;

class BackendApplication extends Application
{
  public function __construct($dirApp, $nameApp)
  {
    parent::__construct($dirApp, $nameApp);
  }

  public function run()
  { 
    if ($this->internaute()->isAdministrateur() ||
        $this->httpRequest()->requestURI() == "/admin/userInsert.html" ||
        $this->httpRequest()->requestURI() == "/admin/connection.html" ||
        $this->httpRequest()->requestURI() == "/admin/deconnection.html" )
        {
         $controller = $this->getController();
    }
    else
    { 
      $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
    }
    
    $controller->execute();
    
    $this->httpResponse->send($controller,$this->internaute()); 

  }
}