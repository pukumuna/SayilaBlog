<?php
namespace FramWK;

abstract class Application
{
  protected $httpRequest;
  protected $httpResponse;
  protected $appName;
  protected $appDir;
  
  protected $config;
  protected $internaute;

  public function __construct($dirApp, $nameApp)
  { 
    $this->httpRequest = new HTTPRequest($this);
    $this->httpResponse = new HTTPResponse($this);

    $this->appName = $nameApp; //Documenter dans FrontedApplication
    $this->appDir = $dirApp; //Documenter dans FrontedAppli
   
    $this->config = new Config($this);
    $this->internaute = new Internaute($this);
  }

  public function getController()
  {
    $router = new Router;
    $file = $this->appDir.'/App/'.$this->appName.'/Config/routes.xml';
   
    $xml = new \DOMDocument;
   
    $xml->load($file);
    
    $routes = $xml->getElementsByTagName('route');

    // On parcourt les routes du fichier XML.
    foreach ($routes as $route)
    {
      $vars = [];

      // On regarde si des variables sont pr�sentes dans l'URL.
      if ($route->hasAttribute('vars'))
      {
        $vars = explode(',', $route->getAttribute('vars'));
      }

      // On ajoute la route au routeur.
      $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
      
    }
    
    try
    {
      // On r�cup�re la route correspondante � l'URL.

      $matchedRoute = $router->getRoute($this->httpRequest->requestURI()); //$route->match($url) 
      //preg_match('#^'.$this->url.'$#', $url, $matches);
      
    }
    catch (\RuntimeException $e)
    {
      if ($e->getCode() == Router::NO_ROUTE)
      {
        // Si aucune route ne correspond, c'est que la page demand�e n'existe pas.
        $this->httpResponse->redirect405($this);
      }
    }

    //Ajout(variables URL)-tab vars de objet Route au tableau $_GET.
    $_GET = array_merge($_GET, $matchedRoute->vars());

    // On instancie le contr�leur.
    $controllerClass = 'App\\'.$this->appName.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
          
    if ( $matchedRoute->url() == '/' || $matchedRoute->url() === '/admin/') 
        $this->internaute->setHead(true);  
    else
        $this->internaute->setHead(false);                                    
    //Voir constructeur BackController: Affectation Vue-Page
    return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
  }

  abstract public function run();

  public function httpRequest()
  {
    return $this->httpRequest;
  }

  public function httpResponse()
  {
    return $this->httpResponse;
  }

  public function appName()
  {
    return $this->appName;
  }

  public function config()
  {
    return $this->config;
  }

  public function internaute()
  {
    return $this->internaute;
  }

  public function appDir()
  {
    return $this->appDir;
  }
  
}