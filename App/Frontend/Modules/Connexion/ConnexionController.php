<?php
namespace App\Frontend\Modules\Connexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\User;

class ConnexionController extends BackController
{
  public function executeConnex()
  {   
    $this->page->addVar('titPage', 'Connexion');
    
    if ($this->request->postExists('email')) {

      $pseudo = $this->request->postData('pseudo');
      //if (empty($value))
      $email = $this->request->postData('email');
      
      $user = new User([
      'pseudo' => $pseudo,
      'email'  => $email,
      'password' => $this->request->postData('password')]);
      /* Accès à SGBD si OK */
      $this->page->addVar('user', $user);

      if ($user->isValid())
      { //echo "<br><br><br><br><br>AA Pseudo = ", $pseudo, " && Email = ", $email, "print user ", print_r($user);
       $userDB = $this->managers->getManagerOf('User')->exist($email); 
          
       //$this->app->internaute()->setAuthenticated('false');                     
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
            //$this->app->httpResponse()->redirect('.');
            if ($userDB->role() == 'admin')
              echo "<br><br><br> Retour admin Administrateur = ", 
              $this->app->internaute()->getAttribute('admin');
            else  
              echo "<br><br><br> Retour faux Administrateur = ", 
              $this->app->internaute()->getAttribute('admin');
            
            $this->page->addVar('user', $userDB);
   

            //if ($this->app->internaute()->isAuthenticated()) 
            //echo '<br><br>Etat auth : ', $this->app->internaute()->getAttribute('auth');
            break;

          default:
            $this->app->internaute()->setFlash('L\'identifiant ou le mot de passe est incorrect.');
              //echo "<br><br><br>Password 1 = ", $user->password(), " | Password 2 = ", $userDB->password();

        } // fermeture 
      } 
      else
        //echo "<br><br><br>tableau erreurs : ", print_r($user->erreurs());
        $this->page->addVar('erreurs', $user->erreurs());
      } 
    else
      echo "<br><br><br>User; aucune saisie = ";
        
  }

  public function executeInsert()
  {
    $this->page->addVar('titPage', 'Ajout d\'un utilisateur');
      
    if ($this->request->postExists('email'))
    {
      $pseudo = $this->request->postData('pseudo');
      //if (empty($value))
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
          if  (is_null($this->managers->getManagerOf('User')->exist($email)))
              { //Insertion
                          
                $this->managers->getManagerOf('User')->save($user);
          
                $this->app->internaute()->setFlash('L\'utilisateur a bien été ajouté, merci !');
                $this->app->internaute()->setAttribute('user',$user);
                $this->app->internaute()->setAttribute('pseudo',$user->pseudo());
                $this->app->internaute()->setAttribute('email',$user->email());
                $this->app->internaute()->setAttribute('password',$user->password());
                $this->app->internaute()->setAuthenticated(true);
              
                //$this->app->httpResponse()->redirect('/');
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

    //exit('https://www.google.com');
    $this->app->httpResponse()->redirect('http://blogOpen');  
    
    
  }
  
} //class ConnexionController