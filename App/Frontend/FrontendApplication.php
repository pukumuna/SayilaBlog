<?php
namespace App\Frontend;

use \FramWK\Application;

class FrontendApplication extends Application
{
  public function __construct($dirApp, $nameApp)
  { //Appelle constructeur de Application
    parent::__construct($dirApp, $nameApp);
  }

  public function run()
  { //Appelle function run de Application
    $controller = $this->getController();
    $controller->execute();
 
    $this->httpResponse->send($controller,$this->internaute());
  }
}