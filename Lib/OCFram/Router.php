<?php
namespace OCFram;

class Router
{
  protected $routes = [];

  const NO_ROUTE = 1;

  public function addRoute(Route $route)
  {
    if (!in_array($route, $this->routes))
    {
      $this->routes[] = $route;
    }
  }

  public function getRoute($url)
  {
    foreach ($this->routes as $route)
    {
      // Si la route correspond � l'URL
      if (($varsValues = $route->match($url)) !== false)
      {
        // Si elle a des variables
      //echo '<br>Key****Preg_Match ',$url,' ',print_r($varsValues) ;
        if ($route->hasVars())
        {
          $varsNames = $route->varsNames();
          $listVars = [];
          // On cr�e un nouveau tableau cl�/valeur
          // (cl� = nom de la variable, valeur = sa valeur)
          foreach ($varsValues as $key => $match)
          {
            // La premi�re valeur contient enti�rement la chaine captur�e (voir la doc sur preg_match)
     //echo '<br>Key-Match = ', $key, ' *and * ', $match,'<br>';
            if ($key !== 0)
            {
              $listVars[$varsNames[$key - 1]] = $match;
            }
          }

          // On assigne ce tableau de variables � la route
          $route->setVars($listVars);
        }
        
        return $route;
      }
    }

    throw new \RuntimeException('Aucune route ne correspond � l\'URL', self::NO_ROUTE);
  }
}