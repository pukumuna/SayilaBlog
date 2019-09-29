<?php
namespace Model;

use \Entity\Comment;

class CommentManager extends CommentManagerInterface
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

  protected function add(Comment $comment)
  { //datePublic = "1000.01.01 00.00.00"
    $q = $this->dao->prepare('INSERT INTO comments SET post = :post,
         auteur = :auteur, content = :content, validation = :validation,
         dateMaj = NOW(), datePublic = NOW() ');
  //datePublic = "1000.01.01 00.00.00" ');   
    $q->bindValue(':post', $comment->post(), \PDO::PARAM_INT);
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':content', $comment->content());
    $q->bindValue(':validation', $comment->validation());

    $q->execute();
    
    $comment->setId($this->dao->lastInsertId());  
  }
  
  public function getListOf($post)
  {
    if (!ctype_digit($post))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }
    
    $q = $this->dao->prepare('SELECT id, post, auteur, content, validation, dateMaj, datePublic FROM comments WHERE post = :post');
    $q->bindValue(':post', $post, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    $comments = $q->fetchAll();
    
    foreach ($comments as $comment)
    {
      $comment->setDateMaj($comment->dateMaj());
      $comment->setDatePublic($comment->datePublic());
    }
    
    return $comments;
  }

  protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET auteur = :auteur, content = :content, validation = :validation, dateMaj = NOW() WHERE id = :id');
    
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':content', $comment->content());
    $q->bindValue(':validation', $comment->validation());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    
    $q->execute();
  }
  
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, post, auteur, content, validation, dateMaj, datePublic FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    return $q->fetch();
  }	

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
  } 
}

