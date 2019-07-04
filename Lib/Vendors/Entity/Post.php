<?php
namespace Entity;

use \OCFram\Entity;

class Post extends Entity
{
  protected $auteur,
            $titre,
            $chapo,
            $content,
            $slug,
            $dateMaj;

  const AUTEUR_INVALIDE = 1;
  const TITRE_INVALIDE  = 2;
  const CHAPO_INVALIDE  = 3;
  const CONTENT_INVALIDE = 4;
  const SLUG_INVALIDE   = 5;
 
  public function isValid()
  { 
    //return !(empty($this->auteur) || empty($this->titre) || empty($this->chapo) || empty($this->content)  || empty($this->slug));
    return !(empty($this->auteur) || empty($this->titre) ||  empty($this->content) );
  } 
  
  // SETTERS //
   public function setAuteur($auteur)
  { 
    if (!is_string($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->auteur = $auteur;
  }

    public function setChapo($chapo)
  { 
    // ligne de code provisoire :
    $chapo = $this->titre;

    if (!is_string($chapo) || empty($chapo))
    {
      $this->erreurs[] = self::CHAPO_INVALIDE;
    }

    $this->chapo = $chapo;
  }
  
  public function setTitre($titre)
  { 
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }

    $this->titre = $titre;
  }

  public function setContent($content)
  { 
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENT_INVALIDE;
    }

    $this->content = $content;
  }

  public function setSlug($slug)
  {
    // ligne de code provisoire :
    $slug = $this->titre;

    if (!is_string($slug) || empty($slug))
    {
      $this->erreurs[] = self::SLUG_INVALIDE;
    }

    $this->slug = $slug;
  }

  public function setDateMaj($dateMaj)
  {
    // 15-03-$this->dateMaj = $dateMaj;
    $this->dateMaj = new \DateTime($dateMaj);
  }

  // GETTERS //
  public function auteur()
  {
    return $this->auteur;
  }
  
  public function titre()
  {
    return $this->titre;
  }

  public function chapo()
  {
    return $this->chapo;
  }

  public function content()
  {
    return $this->content;
  }

  public function slug()
  {
    return $this->slug;
  }

  public function dateMaj()
  {
    return $this->dateMaj;
  }
}