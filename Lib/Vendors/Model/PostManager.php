<?php
namespace Model;

use \Entity\Post;

class PostManager extends PostManagerInterface
{
   /**
   * Attribut contenant l'instance représentant la BDD.
   * @type PDO
   */
  protected $_db;
  
  /**
   * Constructeur étant chargé d'enregistrer l'instance de PDO dans l'attribut $db.
   * @param $db PDO Le DAO
   * @return void
   */
   
  public function __construct($dao)
  {
    $this->_db = $dao;
  }



  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, auteur, titre, chapo, content, slug, dateCre, dateMaj FROM posts ORDER BY id DESC';
    
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->_db->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Post');
    
    $listePosts = $requete->fetchAll();
    
    foreach ($listePosts as $post)
    { 
      $post->setDateCre($post->dateCre() );
      $post->setDateMaj($post->dateMaj() );
    }
    
    $requete->closeCursor();
    
    return $listePosts;
  }
  
  public function getUnique($id)
  {
    $requete = $this->_db->prepare('SELECT id, auteur, titre, chapo, content, slug, dateCre ,dateMaj FROM posts WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Post');
    
    if ($post = $requete->fetch())
    {
      //$post->setDateMaj($post->dateMaj());
      //$this->dateCre = new \DateTime($post->dateCre());  
      $post->setDateCre($post->dateCre() );
      $post->setDateMaj($post->dateMaj() );
      return $post;
    }
    
    return null;
  }

public function count()
  {
    return $this->_db->query('SELECT COUNT(*) FROM posts')->fetchColumn();
  }

protected function add(Post $post)
  {
    $requete = $this->_db->prepare('INSERT INTO posts SET auteur = :auteur, titre = :titre, chapo = :chapo, slug = :slug, content = :content, $dateCre = NOW(),dateMaj = NOW()');
    
    $requete->bindValue(':auteur',  $post->auteur());
    $requete->bindValue(':titre',   $post->titre());
    $requete->bindValue(':chapo',   $post->chapo());
    $requete->bindValue(':slug',    $post->slug());
    $requete->bindValue(':content', $post->content());
    
    $requete->execute();
  }

protected function modify(Post $post)
  {
    $requete = $this->_db->prepare('UPDATE posts SET auteur = :auteur, titre = :titre, chapo = :chapo, content = :content, dateMaj = NOW() WHERE id = :id');
    
    $requete->bindValue(':auteur', $post->auteur());
    $requete->bindValue(':titre', $post->titre());
    $requete->bindValue(':chapo', $post->chapo());
    $requete->bindValue(':content', $post->content());
    $requete->bindValue(':id', $post->id(), \PDO::PARAM_INT);
    
    $requete->execute();
  }
public function delete($id)
  {
    $this->_db->exec('DELETE FROM posts WHERE id = '.(int) $id);
  }  

}