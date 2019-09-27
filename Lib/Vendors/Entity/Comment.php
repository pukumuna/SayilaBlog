<?php
namespace Entity;

use \OCFram\Entity;

class Comment extends Entity
{
  protected $id,
            $auteur,
            $content,
            $post,
            $validation,
            $dateMaj,
            $datePublic;

  const POST_INVALIDE = 1;          
  const AUTEUR_INVALIDE = 2;
  const CONTENT_INVALIDE = 3;
  const VALIDATE_INVALIDE = 4;

  public function isValid()
  {
    //return !(empty($this->auteur) || empty($this->content));
    return (empty($this->erreurs));
  }

  public function setId($id)
  {
    
    $this->id = $id;
  }

  public function setPost($post)
  {
    if (!is_numeric($post))
    {
      $this->erreurs[] = self::POST_INVALIDE;
    }
    $this->post = (int) $post;
  }

  public function setAuteur($auteur)
  {
    if (!is_string($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->auteur = $auteur;
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENT_INVALIDE;
    }

    $this->content = $content;
  }

  public function setValidation($validation)
  {
    if (!isset($validation) || ($validation < '0') || ($validation > '1') )
    {
      $this->erreurs[] = self::VALIDATE_INVALIDE;
    }
    $this->validation = $validation;
  }

  public function setDateMaj($dateMaj)
  { 
    $this->dateMaj = new \DateTime($dateMaj);
  }

  public function setDatePublic($datePublic)
  {
    $this->datePublic = $datePublic;
  }

  public function id()
  {
    return $this->id;
  }
  public function post()
  {
    return $this->post;
  }

  public function auteur()
  {
    return $this->auteur;
  }

  public function content()
  {
    return $this->content;
  }

  public function validation()
  {
    return $this->validation;
  }

  public function dateMaj()
  {
    return $this->dateMaj;
  }

  public function datePublic()
  {
    return $this->datePublic;
  }
}