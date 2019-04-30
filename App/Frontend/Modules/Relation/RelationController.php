<?php
namespace App\Frontend\Modules\Relation;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Message;
use \Entity\Newsletter;
use \FormBuilder\ContactFormBuilder;
use \OCFram\FormHandler;


class RelationController extends BackController
{
    public function executeAccueil()
    {
        $this->page->addVar('title', 'L\'Impressionniste');
        $this->page->addVar('display', false);
    }
    
    
    
	public function executeContact(HTTPRequest $request)
	{
		$this->processForm($request);

		$this->page->addVar('title', 'Contact');
	}

	public function executeNewsletter(HTTPRequest $request)
	{
		$mail = $this->managers->getManagerOf('Newsletter')->addMail($request->postData('data'));
		if($mail)
		{
			print_r(true);
			exit;
		}
		else
		{
			print_r(false);
			exit;
		}

	}

	public function processForm(HTTPRequest $request)
	{
		if($request->method() == 'POST')
		{
			$message = new Message([
				'mail' => $request->postData('mail'),
				'name' => $request->postData('name'),
				'message' => $request->postData('message')
			]);
			if ($request->getExists('id'))
      {
        $message->setId($request->getData('id'));
      }
		}
		else
		{
			$message = new Message();
		}
		
		$formBuilder = new ContactFormBuilder($message);
		$formBuilder->build();
		$form = $formBuilder->form();

		$formHandler = new FormHandler($form, $this->managers->getManagerOf('Message'), $request);

		if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le Message à  bien été envoyé !');
      
      //$this->app->httpResponse()->redirect('/admin/');
    }

    $this->page->addVar('form', $form->createView());


	}
}