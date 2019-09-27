<?php
namespace FramWK;

session_start();

//$_SESSION['auth'] = false;
//$_SESSION['admin'] = false;

class Internaute extends ApplicationComponent
{
  public function __construct($app)
  {
    parent::__construct($app);
  }
    
  public function getAttribute($attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }

  public function getFlash()
  {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $flash;
  }

  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }

  public function isFrontend()
  {
    return isset($_SESSION['front']) && $_SESSION['front'] === true;
  }

  public function isHead()
  {
    return isset($_SESSION['head']) && $_SESSION['head'] === true;
  }
  
  public function isAuthenticated()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }

  public function isAdministrateur()
  {
    return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
  }

  public function setAttribute($attr, $value)
  {
    $_SESSION[$attr] = $value;
  }

  public function setAuthenticated($authenticated)
  {
    if (!is_bool($authenticated))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode Internaute::setAuthenticated() doit être un boolean');
    }

    $_SESSION['auth'] = $authenticated;
  }

  public function setFrontend($valBool)
  {
    if (!is_bool($valBool))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode Internaute::setFronted() doit être un boolean');
    }

    $_SESSION['front'] = $valBool;
  }

  public function setAdministrateur($boolval)
  {
    if (!is_bool($boolval))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAdministrateur() doit être un boolean');
    }

    $_SESSION['admin'] = $boolval;
  }

  public function setFlash($value)
  {
    $_SESSION['flash'] = $value;
  }
    
}