<?php
namespace App\Backend\Modules\News;

use \FramWK\BackController;
use \FramWK\HTTPRequest;
use \Entity\Post;
use \Entity\Comment;

class NewsController extends BackController
{
///
  public function executeIndex()
  {
    $this->app->internaute()->setComment(false); //Ne pas retourner à Gestion Commmentaires(layout)
    $this->app->internaute()->setFrontend(false); //Pas retourner à Frontend apres Connexion(layout)
    $this->page->addVar('title', 'Gestion des news');

    $manager = $this->managers->getManagerOf('Post');

    $this->page->addVar('listePosts', $manager->getList());
    $this->page->addVar('nombreNews', $manager->count());
  }

  public function executeShow()
  {
  

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
  
///
  public function executeInsert()
  {
    if ($this->request->postExists('auteur'))
    {
      $this->processForm();
    }
    
    $this->page->addVar('title', 'Ajout d\'une news');
  }
//-  


  public function processForm()
  {
    $post = new Post([
      'auteur'  => $this->request->postData('auteur'),
      'titre' => $this->request->postData('titre'),
      'chapo' => $this->request->postData('chapo'),
      'slug'  => $this->request->postData('slug'),
      'content' => $this->request->postData('content')
    ]);
  
    // L'identifiant de la news est transmis si on veut la modifier.
    if ($this->request->postExists('id'))
    { 
      $post->setId($this->request->postData('id'));
    }
    
    if ($post->isValid())
    {
      $this->managers->getManagerOf('Post')->save($post);
      
      $this->app->internaute()->setFlash($post->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');
      
    }
    else
    {
      $this->page->addVar('erreurs', $post->erreurs());
    }
    
    $this->page->addVar('post', $post);
  }
////

  public function executeUpdate()
  {
    if ($this->request->postExists('auteur'))
    { echo '<br>processForm';
      $this->processForm();
    }
    else
    { echo '<br>pageAddvar';
      $post = $this->managers->getManagerOf('Post')->getUnique($this->request->getData('id')); 
      $this->page->addVar('post', $post);
    }
    
    $this->page->addVar('title', 'Modification d\'une news');
  }

  public function executeDelete()
  { 
    $this->managers->getManagerOf('Post')->delete($this->request->getData('id'));
    
    $this->app->internaute()->setFlash('La news a bien été supprimée !');
    
    //$this->app->httpResponse()->redirect('.');
    $this->app->httpResponse()->redirect('/admin/news.html');
  }

  public function executeUpdateComment()
  { echo "<br>br><br><br><br><br>Super globale SESSION : ", print_r($_SESSION), "<br>";
    echo "<br>Identifiant de globale SESSION : ", $_COOKIE['PHPSESSID'], "<br>";
    $this->page->addVar('title', 'Modification d\'un commentaire');
    $this->app->internaute()->setComment(true);
    if ($this->request->postExists('auteur'))
    {
      $comment = new Comment([
        'id' => $this->request->getData('id'),
        'post' => $this->request->postData('news'),
        'auteur' => $this->request->postData('auteur'),
        'content' => $this->request->postData('content'),
        'validation' => $this->request->postData('validation')
      ]);
      
      if ($comment->isValid())
      { 
        $this->managers->getManagerOf('Comment')->save($comment);
        
        if  ($this->request->postData('validation') == 0 ) 
          $this->app->internaute()->setFlash('Le commentaire a bien été modifié !');
        else
          $this->app->internaute()->setFlash('Le commentaire a bien été modifié et validé!');
        
        $this->app->httpResponse()->redirect('/news-'.$comment->post().'.html');
      }
      else
      { 
        $this->page->addVar('erreurs', $comment->erreurs());
      }
      
      $this->page->addVar('comment', $comment);
    }
    else
    { 
      $this->page->addVar('comment', $this->managers->getManagerOf('Comment')->get($this->request->getData('id')));
    }
  }

  public function executeDeleteComment()
  { $this->app->internaute()->setComment(true);
    $comment = $this->managers->getManagerOf('Comment')->get($this->request->getData('id'));

    //$this->managers->getManagerOf('Comments')->delete($request->getData('id'));
    $this->managers->getManagerOf('Comment')->delete($comment->id());

    $this->app->internaute()->setFlash('Le commentaire a bien été supprimé !');
    
    //$this->app->httpResponse()->redirect('.');
    $this->app->httpResponse()->redirect('/news-'.$comment->post().'.html');
  } 
/////
}