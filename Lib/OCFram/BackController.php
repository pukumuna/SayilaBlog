<?php
namespace OCFram;

abstract class BackController
{
  protected $app = null;
  protected $action = '';
  protected $module = '';
  protected $page = null;
  protected $view = '';
  protected $user = null;
  protected $request = null;
  protected $managers = null;
  
  public function __construct(Application $app, $module, $action)
  {
    $this->managers = new Managers($app,'PDO', PDOFactory::getMysqlConnexion());
    $this->page = new Page($app);
    
    $this->app = $app;
    $this->setModule($module);
    $this->setAction($action);
    $this->setView($action); //Affectation Vue (View) à la Page par setContentFile($xxx)
    $this->request = $app->httpRequest();
    if ($app->internaute()->getAttribute('user'))
       $this->user = $app->internaute()->getAttribute('user');
    /*
    if ($app->internaute()->getAttribute('email')) 
       echo '<br><br><br><br><br>User-email !!!!!!! : ', 
       $app->internaute()->getAttribute('email'); 
    if ($app->internaute()->getAttribute('auth')) 
       echo '<br><br><br><br><br>User-auth !!!!!!! : ', 
       $app->internaute()->getAttribute('auth');   
    if ($app->internaute()->isAuthenticated()) echo '<br><br>Internaute bien connecté  !!!!!!! ',
      ' A ',$app->internaute()->getAttribute('auth');
     else echo '<br><br>Internaute non connecté  !!!!!',' A ',$app->internaute()->getAttribute('auth'); */
  }


  public function execute()
  { //echo "CODE ACTION : ', $this->action";
    $method = 'execute'.ucfirst($this->action);

    if (!is_callable([$this, $method]))
    { echo 'L\'action "'.$this->action.'" n\'est pas définie sur le module '.$this->module;
      throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas définie sur ce module');
    }
    $this->$method();//ex $this->executeUpdate()
    //$this->$method($this->app->httpRequest());  //ex $this->executeUpdate(/admin/news-3.html) ===> resultat -> page.
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
      throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
    }

    $this->module = $module;
  }

  public function setAction($action)
  {
    if (!is_string($action) || empty($action))
    {
      throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
    }

    $this->action = $action;
  }
  
  public function setView($view)
  {
    if (!is_string($view) || empty($view))
    {
      throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
    }
    
    $this->view = $view;
    $appliDir = $this->app->appDirectory();
    $this->page->setContentFile($appliDir.'/App/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
  }

  public function managers()
  {        
       
  }

}