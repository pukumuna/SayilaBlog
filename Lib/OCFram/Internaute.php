<?php
namespace OCFram;

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

  public function isModuleNews()
  {
    return isset($_SESSION['module']) && $_SESSION['module'] == "News";
  }

  public function isHead()
  {
    return isset($_SESSION['head']) && $_SESSION['head'] === true;
  }

  public function isPortfolio()
  {
    return isset($_SESSION['portfolio']) && $_SESSION['portfolio'] === true;
  }

  public function isFindfolio()
  {
    return isset($_SESSION['findfolio']) && $_SESSION['findfolio'] === true;
  }

  public function isMenu()
  {
    return isset($_SESSION['menu']) && $_SESSION['menu'] === true;
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
    echo "<br><br><br> Authenticated mise à = ", $authenticated;
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