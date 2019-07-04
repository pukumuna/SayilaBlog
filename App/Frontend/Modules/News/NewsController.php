<?php
namespace App\Frontend\Modules\News;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Post;
use \Entity\Comment;

class NewsController extends BackController
{ 
  public function executeIndex()
  {
    $nombrePosts = $this->app->config()->get('nombre_posts');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
    
    // On ajoute une définition pour le titre.
    $this->page->addVar('titPage', 'Liste des '.$nombrePosts.' dernières news');
    
    // On récupère le manager des Posts.
    $manager = $this->managers->getManagerOf('Post');
    
    // Cette ligne, vous ne pouviez pas la deviner sachant qu'on n'a pas encore touché au modèle;
    // Contentez-vous donc d'écrire cette instruction, nous implémenterons la méthode ensuite.
    $listePosts = $manager->getList(0, $nombrePosts);
    
    foreach ($listePosts as $post)
    {
      if (strlen($post->content()) > $nombreCaracteres)
      {
        $debut = substr($post->content(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        
        $post->setContent($debut);
      }
    }
    
    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listePosts', $listePosts);
  }

  public function executeShow()
  {
    echo 'recherche du post identifiant ===:(tentative) ';

    $post = $this->managers->getManagerOf('Post')->getUnique($this->request->getData('id'));
    
    if (empty($post))
    {
      $this->app->httpResponse()->redirect404();
    }
                   
    $this->page->addVar('titPage', $post->titre());
    $this->page->addVar('post', $post);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comment')->
    getListOf($post->id()));
  }
  
  public function executeInsertComment()
  {
    $this->page->addVar('titPage', 'Ajout d\'un commentaire');
      
    if ($this->request->postExists('pseudo'))
    {
      $comment  = new Comment([
        'post'    => $this->request->getData('id'),
        'auteur'  => $this->request->postData('pseudo'),
        'content' => $this->request->postData('content'),
        'validation' => '0'
      ]);
      
      if ($comment->isValid())
      { 
        $this->managers->getManagerOf('Comment')->save($comment);
        
        $this->app->internaute()->setFlash('Le commentaire a bien été ajouté, merci !');
  
        $this->app->httpResponse()->redirect('news-'.$this->request->getData('id').'.html');
      }
      else
      {
        $this->page->addVar('erreurs', $comment->erreurs());
      }
      
      $this->page->addVar('comment', $comment);
    }
  }

}