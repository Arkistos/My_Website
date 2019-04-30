<?php
namespace App\Backend\Modules\Connexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\User;

class ConnexionController extends BackController
{
  public function executeLogin(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
    if($request->postExists('login') && $request->postExists('password'))
    {
      $user = new User();
      $user = $this->managers->getManagerOf('User')->match($request->postData('login'), $request->postData('password'));
      if(!is_null($user))
      {
        $this->app->user()->setAuthenticated(true);
        $this->app->user()->setUser($user);
        $this->app->httpResponse()->redirect('/blog');
      }
      else
      {
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
      }
    }
  }

  public function executeLogout()
  {
    $this->app->user()->setAuthenticated(false);
    $this->app->httpResponse()->redirect('/blog');
  }

  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
    
    if ($request->postExists('login'))
    {
      $login = $request->postData('login');
      $password = $request->postData('password');
      
      if ($login == $this->app->config()->get('login') && $password == $this->app->config()->get('pass'))
      {
        $this->app->user()->setAuthenticated(true);
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
      }
    }
  }
}