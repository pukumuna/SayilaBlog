<?php
namespace App\Backend\Modules\Connexion;

use \FramWK\BackController;
use \FramWK\HTTPRequest;
use \Entity\User;

class ConnexionController extends BackController
{
  public function executeIndex()
  {   
    $this->page->addVar('titPage', 'Connexion');
    
    if ($this->request->postExists('email') || $this->request->postExists('pseudo')) {

      $pseudo = $this->request->postData('pseudo');
      $email  = $this->request->postData('email');
      
      $user = new User([
      'pseudo' => $pseudo,
      'email'  => $email,
      'password' => $this->request->postData('password')]);
      /* Accès à SGBD si OK */
      $this->page->addVar('user', $user);

      if ($user->isValid())
      { 
       $userDB = $this->managers->getManagerOf('User')->exist($user); 
                            
       switch (true) {
          case empty($userDB):
            $this->app->internaute()->setFlash('Utilisateur non enregistré');
            break;

          case $userDB->password() == $user->password():
            $this->app->internaute()->setAttribute('user',$userDB);
            $this->app->internaute()->setAttribute('pseudo',$userDB->pseudo());
            $this->app->internaute()->setAttribute('email',$userDB->email());
            $this->app->internaute()->setAttribute('password',$userDB->password());
            $this->app->internaute()->setAuthenticated(true);
            $this->app->internaute()->setAdministrateur($userDB->role() == 'admin' ? true:false);
            $this->app->internaute()->setFlash('Utilisateur connecté !!!');
        
            if ($this->app->internaute()->isFrontend())
               $this->app->httpResponse()->redirect('/news.html');
            else 
              if ($this->app->internaute()->isAdministrateur())
                  $this->app->httpResponse()->redirect('/admin/news.html');
              else  
                  $this->app->internaute()->setFlash('L\'utilisateur n\'est pas un Administrateur.');  
            break;

          default:
            $this->app->internaute()->setFlash('L\'identifiant ou le mot de passe est incorrect.');
              
        } // fermeture 
      } 
      else
         $this->page->addVar('erreurs', $user->erreurs());
      } 
    else
      $this->app->internaute()->setFlash('Veillez saisir les info. de connexion et Validez !');
        
  }

  public function executeInsert()
  {
    $this->page->addVar('titPage', 'Ajout d\'un utilisateur');
      
    if ($this->request->postExists('email'))
    {
      $pseudo = $this->request->postData('pseudo');
       
      $email = $this->request->postData('email');
      
      $user = new User([
        'name' => $this->request->postData('name'),
        'lastname' => $this->request->postData('lastname'),
        'pseudo' => $this->request->postData('pseudo'),
        'email' => $this->request->postData('email'),
        'password' => $this->request->postData('password'),
        'actif' => $this->request->postData('actif'),
        'role' => $this->request->postData('role'),
       ]); // New Entity, declencle les contrôles des zones passées !! 
      
      if ($user->isValid())
        {  
          if  (is_null($this->managers->getManagerOf('User')->exist($user)))
              { //Insertion
                          
                $this->managers->getManagerOf('User')->save($user);
          
                $this->app->internaute()->setFlash('L\'utilisateur a bien été ajouté et connecté, merci !');
                $this->app->internaute()->setAttribute('user',$user);
                $this->app->internaute()->setAttribute('pseudo',$user->pseudo());
                $this->app->internaute()->setAttribute('email',$user->email());
                $this->app->internaute()->setAttribute('password',$user->password());
                $this->app->internaute()->setAuthenticated(true);
                              
              }  
          else
              {
                $this->app->internaute()->setFlash('L\'utilisateur est déjà enregistré !');
              }
              //throw new \RuntimeException('L\' utilisateur est deja enregistré');
        }
      else
        $this->page->addVar('erreurs', $user->erreurs());
      
      
      $this->page->addVar('user', $user);
    }
    
  }  //public function executeInsert()

  public function executeDeconnect()
  {
    session_destroy();
    
    $this->app->httpResponse()->redirect('/');  
    
  }
  
} //class ConnexionController