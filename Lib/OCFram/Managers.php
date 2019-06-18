<?php
namespace OCFram;

class Managers extends Manager
{
  protected $app = null;
  protected $managers = [];

  public function __construct($app)
  {
    parent::__construct(); //hérite du Dao du parent

    $this->app = $app;
  }

  public function getManagerOf($module)
  {
    if (!is_string($module) || empty($module))
    {
      throw new \InvalidArgumentException('Le module spécifié est invalide');
    }

    if (!isset($this->managers[$module]))
    {  
      $modelDir = '\\Lib\Vendors\Model\\';
      $manager  = '\\Model\\'.$module.'Manager';     
             
     $this->managers[$module] = new $manager($this->dao);
            
    }
    
    return $this->managers[$module];
  }
}