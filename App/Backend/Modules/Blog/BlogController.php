<?php
namespace App\Backend\Modules\Blog;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\HTTPResponse;
use \Entity\Post;
use \Entity\Comment;
use \Entity\Category;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\PostFormBuilder;
use \OCFram\FormHandler;

class BlogController extends BackController
{
	public function executeAddPost(HTTPRequest $request)
	{
		$this->processForm($request);
		$this->page->addVar('title', 'ajout post');
	}
	
	public function executeAddCat(HTTPRequest $request)
	{
	    print_r($this->managers->getManagerOf('Category')->addCategory($request->postData('name')));
	    exit;
	}

  public function executeUpdatePost(HTTPRequest $request)
  {
    $this->processForm($request);
    $this->page->addVar('title', 'modification d\'un post');
  }

	public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $post = new Post([
        'title' => $request->postData('title'),
        'content' => $request->postData('content')
      ]);
      foreach($_POST['cat'] as $cat)
      {
        $post->addCategory($cat);
      }

      mkdir('../public_html/images/post/'.$post->title());

      /* save banner */
      $path = $_FILES['banner']['tmp_name'];
      $name = $_FILES['banner']['name'];
      $post->setImage($name);
      move_uploaded_file($path, '../public_html/images/post/'.$post->title().'/'.$name);
      
      /* save picture*/
      for($i=0; $i<count($_FILES['upload']['name']); $i++){
        $path = $_FILES['upload']['tmp_name'][$i];
        $name = $_FILES['upload']['name'][$i];
        move_uploaded_file($path, '../public_html/images/post/'.$post->title().'/'.$name);
      }


      $post->setAuthor($this->app->user()->user()['name']);

      if ($request->getExists('id'))
      {
        $post->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la news est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $post = $this->managers->getManagerOf('Post')->getPost($request->getData('id'));
      }
      else
      {
        $post = new Post;
      }
    }

    $formBuilder = new PostFormBuilder($post);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Post'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le post a bien été ajoutée !');
      
      $this->app->httpResponse()->redirect('/blog');
    }

    $this->page->addVar('form', $form->createView());
    $this->page->addVar('listCat', $this->managers->getManagerOf('Category')->getAll());
  }
  
  public function executeDeletePost(HTTPRequest $request)
  {
      $this->managers->getManagerOf('Post')->deletePost($request->getData('id'));
      $this->app->httpResponse()->redirect('/blog');
  }
  
  
}