<?php
namespace OCFram;

class Page extends ApplicationComponent
{
  protected $contentFile;
  protected $vars = [];

  public function addVar($var, $value)
  {
    if (!is_string($var) || is_numeric($var) || empty($var))
    {
      throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
    }

    $this->vars[$var] = $value;
  }

  public function getGeneratedPage()
  {
    
   echo "<br>ContentFile : ", $this->contentFile;

    if (!file_exists($this->contentFile))
    {
      throw new \RuntimeException('La vue spécifiée n\'existe pas');
    }

    //$internaute et $content : Variables evoquées dans layout.php
    $internaute = $this->app()->internaute();  
        
    //Dans vars : title-->valeur, posts-->valeur, comments-->valeur ...
    extract($this->vars);
    //extract: Importe les variables dans la table des symboles,vérifie chaque clé afin de contrôler si elle a un nom de variable valide. Elle vérifie également les collisions avec des variables existantes dans la table des symboles.
    
    ob_start();
    //ob_start: Enclenche la temporisation de sortie
      require $this->contentFile;

    $content = ob_get_clean(); //Transfert de la view
    //if ($internaute->isPortfolio())
    //    $internaute->setAttribute('view',$content);
    //ob_get_clean: Lit le contenu courant du tampon de sortie puis l'efface 
    
    ob_start();
       $appliDir = $this->app()->appDirectory();
       $appliDir = $appliDir.'/App/'.$this->app()->name().'/Templates/layout.php';
       //echo "<br><br><br>AppliDir = ", $appliDir;
       require $appliDir; 
       return ob_get_clean(); //retour pour affichage avec exit()
  }

  public function setContentFile($contentFile)
  {
    if (!is_string($contentFile) || empty($contentFile))
    {
      throw new \InvalidArgumentException('La vue spécifiée est invalide');
    }

    $this->contentFile = $contentFile;
  }
}