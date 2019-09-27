<?php
namespace App\Frontend;

use \FramWK\Application;

class FrontendApplication extends Application
{
  public function __construct($appliDir, $nameApp)
  { //Appelle constructeur de Application
    parent::__construct();
    $this->name = $nameApp;
    //$this->name = 'Frontend';
    $this->appDirectory = $appliDir;
    
  }

  public function run()
  { //Appelle function run de Application
    $controller = $this->getController();
    $controller->execute();

    //$this->htstpResponse->setPage($controller->page());
    //$this->httpResponse->send();
    $this->httpResponse->send($controller,$this->internaute());
  }
}