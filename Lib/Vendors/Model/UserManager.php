<?php
namespace Model;

use \Entity\User;

class UserManager extends UserManagerInterface
{
   /**
   * Attribut contenant l'instance représentant la BDD.
   * @type PDO
   */
  protected $dao;

  public function __construct($dao)
  {
    $this->dao = $dao;
  }

  protected function add(User $user)
  { 
    $q = $this->dao->prepare('INSERT INTO Users SET pseudo = :pseudo, name = :name, lastname = :lastname, password = :password, role = :role, actif = :actif, email = :email, dateMaj = NOW()');
    
    $q->bindValue(':pseudo', $user->pseudo());
    $q->bindValue(':name', $user->name());
    $q->bindValue(':lastname', $user->lastname());
    $q->bindValue(':password', $user->password());
    $q->bindValue(':email', $user->email());
    $q->bindValue(':role',  $user->role());
    $q->bindValue(':actif', $user->actif());
    //$q->bindValue(':dateMaj', '0001-01-01 00:00:01');

    $q->execute();
    
    $user->setId($this->dao->lastInsertId()); //Recup Identifiant
  }
  
  public function get($id)
  {
    $requete = $this->dao->prepare('SELECT pseudo, email, password FROM Users WHERE id =:id');
    //$requete->bindValue(':keyname', $value);
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\User');
    
    if ($user = $requete->fetch())
    { /*
      $posts->setDateAjout(post \DateTime($posts->dateAjout()));
      $posts->setDateModif(post \DateTime($posts->dateModif()));
      */
      echo '<br><br><br>GET de $user :OK ', $id;
      return $user;
    }
    echo '<br>GET de $user : Nothing !!!', $id;
    return null;
  }
public function exist($email)
  {echo "<br><br><br><br><br>AQ  Email = ", $email;
    $requete = $this->dao->prepare('SELECT id, pseudo, email, password, role FROM Users WHERE email =:email AND email > ""');
    $requete->bindValue(':email', $email);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\User');
    
    if ($user = $requete->fetch())
    { /*
      $posts->setDateAjout(post \DateTime($posts->dateAjout()));
      $posts->setDateModif(post \DateTime($posts->dateModif()));
      */
      echo '<br><br><br>Extraction de $user :OK ', print_r($user),'***';
      return $user;
    }
    echo '<br>Extraction de $user : Nothing !!!';
    return null;
  }
protected function modify(User $user)
  {
    $requete = $this->dao->prepare('UPDATE Users SET password = :password, email = :email, pseudo = :pseudo WHERE id =:id');
    
    $requete->bindValue(':pseudo', $user->pseudo());
    $requete->bindValue(':email', $user->email());
    $requete->bindValue(':password', $user->password());
    $q->bindValue(':id', $user->id(), \PDO::PARAM_INT);

    $requete->execute();
  }
public function delete($id)
  {
    $this->dao->exec('DELETE FROM Users WHERE id = '.(int) $id);
  }  
} 


