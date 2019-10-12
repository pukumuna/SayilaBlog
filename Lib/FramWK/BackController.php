<?php
namespace FramWK;

abstract class BackController
{
  protected $app = null;
  protected $action = '';
  protected $module = '';
  protected $page = null;
  protected $view = '';
  //protected $user = null;
  protected $request = null;
  protected $managers = null;
  
  public function __construct(Application $app, $module, $action)
  {
    $this->managers = new Managers($app,'PDO', PDOFactory::getMysqlConnexion());
    $this->page = new Page($app);
    
    $this->setModule($module);
    $this->setAction($action);
    $this->setView($action,$module,$app); //Affectation Vue (View=action) � Page par setContentFile
    $this->app = $app;
    $this->request = $app->httpRequest();
  }


  public function execute()
  { 
    $method = 'execute'.ucfirst($this->action);

    if (!is_callable([$this, $method]))
    { echo 'L\'action "'.$this->action.'" n\'est pas d�finie sur le module '.$this->module;
      throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas d�finie sur ce module');
    }
    $this->$method();//ex $this->executeUpdate()
  }

  public function page()
  {
    return $this->page;
  }

  public function action()
  {
    return $this->action;
  }

  public function module()
  {
    return $this->module;
  }

  public function setModule($module)
  {
    if (!is_string($module) || empty($module))
    {
      throw new \InvalidArgumentException('Le module doit �tre une chaine de caract�res valide');
    }

    $this->module = $module;
  }

  public function setAction($action)
  {
    if (!is_string($action) || empty($action))
    {
      throw new \InvalidArgumentException('L\'action doit �tre une chaine de caract�res valide');
    }

    $this->action = $action;
  }
  
  public function setView($view,$module,$app)
  {
    if (!is_string($view) || empty($view))
    {
      throw new \InvalidArgumentException('La vue doit �tre une chaine de caract�res valide');
    }
    
    $this->view = $view;
    $varDir = $app->appDir().'/App/'.$app->appName().'/Modules/'.$module; 
    
    $this->page->setContentFile($varDir.'/Views/'.$view.'.php');
  }

  public function managers()
  { }

}