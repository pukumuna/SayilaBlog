<?php
namespace Entity;

use \OCFram\Entity;

class User extends Entity
{
  protected  $role, 
             $name,
             $actif,
             $email,
             $pseudo,
             $lastname,
             $password,
             $dateMaj;

  const NAME_INVALIDE = 1;
  const LASTNAME_INVALIDE = 2;
  const PSEUDO_INVALIDE = 3;
  const EMAIL_INVALIDE = 4;
  const PASSWORD_INVALIDE = 5;

  public function isValid()
  {
    return !( (empty($this->pseudo) && empty($this->email)) ||  empty($this->password) );
  }  
  
  public function setPseudo($value)
  {
    if (!is_string($value) || empty($value))
    {
      $this->erreurs[] = self::PSEUDO_INVALIDE;
    }

    $this->pseudo = $value;
  }

  public function setEmail($value)
  {
    if (!is_string($value) || empty($value))
    {
      $this->erreurs[] = self::EMAIL_INVALIDE;
    }

    $this->email = $value;
    
  }

  public function setPassword($value)
  {
    if (!is_string($value) || empty($value))
    {
      $this->erreurs[] = self::PASSWORD_INVALIDE;
    }

    $this->password = $value;
  }

  public function setName($value)
  {
    if (empty($value)) 
         $this->name = '';
    else $this->name = $value;
  }

  public function setLastname($value)
  {
    if (empty($value)) 
         $this->lastname = '';
    else $this->lastname = $value;
  }

  public function setRole($value)
  {
    if (empty($value)) 
         $this->role = '';
    else $this->role = $value;
  }

  public function setActif($value)
  {
    if (is_bool($value))
         $this->actif = $value;
    else $this->actif = true; 
  }

  public function setDateMaj(\DateTime $value)
  {
    $this->dateMaj = $value;
  }
  
  public function pseudo()
  {
    return $this->pseudo;
  }

  public function email()
  {
    return $this->email;
  }
  
  public function password()
  {
    return $this->password;
  }

  public function name()
  {
    return $this->name;
  }
  
  public function lastname()
  {
    return $this->lastname;
  }

  public function role()
  {
    return $this->role;
  }

  public function actif()
  {
    return $this->actif;
  }

  public function dateMaj()
  {
    return $this->dateMaj;
  } 

      
}