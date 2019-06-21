<?php
namespace App\Frontend\Modules\NewsMaj;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Post;
use \Entity\Comment;

class NewsMajController extends BackController
{

  public function executeIndex()
  { 
    $this->page->addVar('titPage', 'Gestion des news');

    $manager = $this->managers->getManagerOf('Post');

    $this->page->addVar('listePosts', $manager->getList());
    $this->page->addVar('nombreNews', $manager->count());
  }
///
  public function executeInsert()
  {
    $request = $this->request;

    $this->page->addVar('titPage', 'Ajout d\'une news');

    if ($request->postExists('auteur'))
    {
      $this->processForm($request);
    }
       
  }
 
//


  public function processForm()
  {
    $request = $this->request;

    $post = new Post([
      'auteur'  => $request->postData('auteur'),
      'titre'   => $request->postData('titre'),
      'chapo'   => $request->postData('chapo'),
      'slug'    => $request->postData('slug'),
      'content' => $request->postData('content')
    ]);
    
    // L'identifiant de la news est transmis si on veut la modifier.
    if ($request->postExists('id'))
    { 
      $post->setId($request->postData('id'));
    }
    
    if ($post->isValid())
    {  echo '<br>Succès:Valeur de flash bien positionnée !!!';
      $this->managers->getManagerOf('Post')->save($post);
            
      $this->app->internaute()->setFlash($post->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');
      
    }
    else
    { echo '<br>Erreur: auteur - titre - chapo - content - slug : ', '* ', $post->auteur(), ' * ', $post->titre(), '* ', $post->chapo(),'* ', substr($post->content(),0,10) , ' * ', $post->slug();

      $this->page->addVar('erreurs', $post->erreurs());
    }
    
    $this->page->addVar('post', $post);
  }
////



  public function executeUpdate()
  {
    $request = $this->request;

    if ($request->postExists('auteur'))
    { echo '<br>processForm';
      $this->processForm($request);
    }
    else
    { echo '<br>pageAddvar';
      $this->page->addVar('post', $this->managers->getManagerOf('Post')->getUnique($request->getData('id')));
    }
    
    $this->page->addVar('titPage', 'Modification d\'une news');
  }

  public function executeDelete()
  { 
    $request = $this->request;

    $this->managers->getManagerOf('Post')->delete($request->getData('id'));
    
    $this->app->internaute()->setFlash('La news a bien été supprimée !');
    
    //$this->app->httpResponse()->redirect('.');
    $this->app->httpResponse()->redirect('/news.html');
  }

  public function executeCommentsNews()
  {
    echo 'recherche du post identifiant ===:(executeCommentsNews) ';

    $post = $this->managers->getManagerOf('Post')->getUnique($this->request->getData('id'));
    
    $this->page->addVar('titPage', $post->titre());
    $this->page->addVar('post', $post);

    if ( ! empty($post))
    {
    
      $this->page->addVar('comments', $this->managers->getManagerOf('Comment')->
      getListOf($post->id()));
    }  
  }

  public function executeUpdateComment()
  {
    $request = $this->request;

    $this->page->addVar('titPage', 'Modification d\'un commentaire');
    
    if ($request->postExists('pseudo'))
    {
      $comment = new Comment([
        'id' => $request->getData('id'),
        'auteur' => $request->postData('pseudo'),
        'post' => $request->postData('idpost'),
        'content' => $request->postData('content'),
        'validation' => '0'
        //'validation' => $request->postData('validation')
      ]);
      
      if ($comment->isValid())
      {
        $this->managers->getManagerOf('Comment')->save($comment);
        
        $this->app->internaute()->setFlash('Le commentaire a bien été modifié !');
        echo '<br><br><br>Le news du commentaire modifié : ', $comment->post(); 
        
        $this->app->httpResponse()->redirect('/commentsNews-'.$comment->post().'.html');
      }
      else
      {
        $this->page->addVar('erreurs', $comment->erreurs());
      }
      
      $this->page->addVar('comment', $comment);
    }
    else
     {$komment = $this->managers->getManagerOf('Comment')->get($request->getData('id')); 
      echo '<br><br><br>Le news du commentaire à modifier : ', $komment->post(); 
      $this->page->addVar('comment', $this->managers->getManagerOf('Comment')->get($request->getData('id')));
    }
  }

  public function executeDeleteComment()
  { 
    $request = $this->request;

    $comment = $this->managers->getManagerOf('Comment')->get($request->getData('id'));

    //$this->managers->getManagerOf('Comments')->delete($request->getData('id'));
    $this->managers->getManagerOf('Comment')->delete($comment->id());

    $this->app->internaute()->setFlash('Le commentaire a bien été supprimé !');
    
    //$this->app->httpResponse()->redirect('.');
    $this->app->httpResponse()->redirect('/commentsNews-'.$comment->post().'.html');
  } 
/////
}
