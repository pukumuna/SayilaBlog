<?php
namespace FramWK;

class HTTPResponse extends ApplicationComponent
{
  protected $page;

  public function __construct($app)
  {
    parent::__construct($app);
  }

  public function addHeader($header)
  {
    header($header);
  }

  public function redirect($location)
  {
    header('Location: '.$location);
    echo '<br>PASSAGE DE . REDIRECT';
    exit;
  }

    
  public function send($controller,$internaute)
  //public function send()
  {
    // Actuellement, cette ligne a peu de sens dans votre esprit.
    // Promis, vous saurez vraiment ce qu'elle fait d'ici la fin du chapitre
    // (bien que je suis sûr que les noms choisis sont assez explicites !).
    
    $internaute->setAttribute('module', $controller->module());
  
    exit($controller->page()->getGeneratedPage());
    //exit($this->page->getGeneratedPage());
  }

  public function sendRedirect()
  {
    exit($this->page->getGeneratedPage());;
  }

  public function setPage(Page $page)
  {
    $this->page = $page;
  }
  // Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true
  public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
  {
    setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
  }
  public function redirect404()
  {
    $name1 = $this->app()->name();
    $appDir = $this->app()->appDirectory();

    $this->page = new Page($this->app());
    $this->page->setContentFile($appDir.'/APP/'.$name1.'/Errors/404.html');
    
    $this->addHeader('HTTP/1.0 404 Not Found');
    
    $this->sendRedirect();
  }
  public function redirect405()
  {
    $name1 = $this->app()->name();
    $appDir = $this->app()->appDirectory();

    $this->page = new Page($this->app());
    $this->page->setContentFile($appDir.'/App/'.$name1.'/Errors/405.html');
    
    $this->addHeader('HTTP/1.0 405 Not Found');
    
    $this->sendRedirect();
  }
}