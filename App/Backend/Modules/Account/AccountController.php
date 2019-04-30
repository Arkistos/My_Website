<?php
namespace App\Backend\Modules\Account;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Post;
use \Entity\Message;
use \Entity\User;
use \OCFram\MailConformValidator;

class AccountController extends BackController
{
	public function executeOverview()
	{
		$listPost = $this->managers->getManagerOf('Post')->getPostByAuthor($this->app->user()->user()['name']);

		$this->page->addVar('title', 'your Posts');
		$this->page->addVar('listPost', $listPost);
	}

	public function executeInfos()
	{

		$this->page->addVar('pic', $this->app->user()->user()['profile_pic']);
		$this->page->addVar('title', 'Vos informations');
	}

	public function executeMessagerie()
	{	
		$listMessage = $this->managers->getManagerOf('Message')->get();
		$this->page->addVar('title', 'Messages');
		$this->page->addVar('listMessage', $listMessage);
	}

	public function executeMessage(HTTPRequest $request)
	{
		$message = $this->managers->getManagerOf('Message')->getUnique($request->getData('id'));
		$this->page->addVar('title', 'Message');
		$this->page->addVar('msg', $message);
	}

	public function executeRegister(HTTPRequest $request)
	{
		$validator = new MailConformValidator('adresse mail non conforme');
		$this->page->addVar('title', 'Sign Up');

		if($request->postExists('mail') && $request->postExists('login') && $request->postExists('password'))
		{
			$user = new User();
			$user->setEmail($request->postData('mail'));
			$user->setName($request->postData('login'));
			$user->setPassword($request->postData('password'));
			if($this->managers->getManagerOf('User')->testId($user->name(), $user->email()) || !preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $user->email()))
			{
				$this->app->user()->setFlash('Erreur de saisie');
			}
			else
			{
				$this->managers->getManagerOf('User')->add($user);
				$this->app->user()->setFlash('Utilisateur bien enregistré');
			}
		}
	}
	
	public function executeUpdatePassword(HTTPRequest $request)
	{
	    print_r($this->managers->getManagerOf('User')->changePassword($request->postData('old'), $request->postData('id'), $request->postData('new')));
	   
	    exit;
	}

	public function executeChangePic(HTTPRequest $request)
	{
		$user = $this->app->user()->user();
		$path = $_FILES['pic']['tmp_name'];
        $name = $_FILES['pic']['name'];
        $user = new User();
        $user = $this->app->user()->user();
        if(!is_null($user['profile_pic'])){
        	unlink('../public_html/images/profile/'.$user['profile_pic']);
        }
        $user['profile_pic'] = $name;
        $this->app->user()->setUser($user);
        $this->managers->getManagerOf('User')->addProfilePic($name, $this->app->user()->user()['id']);
        move_uploaded_file($path, '../public_html/images/profile/'.$name);
        print_r($name);
        exit;
	}
	
	
	
}