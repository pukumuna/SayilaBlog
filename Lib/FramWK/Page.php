<?php
namespace FramWK;

class Page extends ApplicationComponent
{
  protected $contentFile;
  protected $vars = [];

  public function addVar($var, $value)
  {
    if (!is_string($var) || is_numeric($var) || empty($var))
    {
      throw new \InvalidArgumentException('Le nom de la variable doit �tre une chaine de caract�res non nulle');
    }

    $this->vars[$var] = $value;
  }

  public function getGeneratedPage()
  {
   if (!file_exists($this->contentFile))
    {
      throw new \RuntimeException('La vue sp�cifi�e n\'existe pas');
    }

    //$internaute et $content : Variables evoqu�es dans layout.php
    $internaute = $this->app()->internaute();  
        
    //Dans vars : title-->valeur, posts-->valeur, comments-->valeur ...
    extract($this->vars);
    //extract: Importe les variables dans la table des symboles,v�rifie chaque cl� afin de contr�ler si elle a un nom de variable valide. Elle v�rifie �galement les collisions avec des variables existantes dans la table des symboles.
    
    ob_start();
    //ob_start: Enclenche la temporisation de sortie
      require $this->contentFile;

    $content = ob_get_clean(); //Transfert de la view
    
    //ob_get_clean: Lit le contenu courant du tampon de sortie puis l'efface 
    
    ob_start();
       $varDir = $this->app()->appDir().'/App/'.$this->app()->appName();
    
       require $varDir.'/Templates/layout.php';
       return ob_get_clean(); //retour pour affichage avec exit()
  }

  public function setContentFile($contentFile)
  {
    if (!is_string($contentFile) || empty($contentFile))
    {
      throw new \InvalidArgumentException('La vue sp�cifi�e est invalide');
    }

    $this->contentFile = $contentFile;
  }
}