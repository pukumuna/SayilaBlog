<?php
namespace Model;

use \OCFram\Manager;
use \Entity\User;

abstract class UserManagerInterface
{
  /**
   * Méthode permettant d'ajouter un Utilisateur.
   * @param $user L'utilisateur à ajouter
   * @return void
   */
  abstract protected function add(User $user);
  
  /**
   * Méthode permettant d'enregistrer un utilisateur.
   * @param $user Le utilisateur à enregistrer
   * @return void
   */
  public function save(User $user)
  {
    if ($user->isValid())
    { 
      $user->isNew() ? $this->add($user) : $this->modify($user);
    }
    else
    {
      throw new \RuntimeException('Le utilisateur doit être validé pour être enregistré');
    }
  }
  
 
  /**
   * Méthode permettant de modifier un utilisateur.
   * @param $user Le utilisateur à modifier
   * @return void
   */
  abstract protected function modify(User $user);
  
  /**
   * Méthode permettant d'obtenir un utilisateur spécifique.
   * @param $id L'identifiant du utilisateur
   * @return user
   */
  abstract public function get($id);

   /**
   * Méthode permettant d'obtenir un utilisateur spécifique.
   * @param $value(pseudo/email) L'identifiant du utilisateur
   * @return user
   */
  abstract public function exist($email);

  /**
   * Méthode permettant de supprimer un utilisateur.
   * @param $id L'identifiant du utilisateur à supprimer
   * @return void
   */
  abstract public function delete($id);
  
  public function isNew()
  {
    return empty($this->id);
  }
}

