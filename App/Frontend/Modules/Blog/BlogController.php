<?php
namespace App\Frontend\Modules\Blog;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \Entity\User;


class BlogController extends BackController
{
	public function executeHome()
	{
		$manager = $this->managers->getManagerOf('Post');

		$listPost = $manager->getList(0,3);
		foreach($listPost as $post)
		{
			$post['content'] = substr($post['content'], 0, 50).'...';
		}
		$this->page->addVar('title', 'L\'impressionniste');
		$this->page->addVar('listPost', $listPost);
	}

	public function executeShow(HTTPRequest $request)
	{
		$post = $this->managers->getManagerOf('Post')->getPost($request->getData('id'));
		$profilePic = $this->managers->getManagerOf('User')->getProfilePic($post->author());
		$listCat = $this->managers->getManagerOf('Category')->getList($post['id']);
		$listComment = $this->managers->getManagerOf('Comments')->getList($post['id']);

		if (empty($post))
    	{
      		$this->app->httpResponse()->redirect404();
    	}
    	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$this->page->addVar('title', $post->title());
		$this->page->addVar('post', $post);
		$this->page->addVar('listCat', $listCat);
		$this->page->addVar('listComment', $listComment);
		$this->page->addVar('pic', $profilePic);
		$this->page->addVar('link', $actual_link);
	}

	public function executeIndex()
	{
		$listPost = $this->managers->getManagerOf('Post')->getList(-1,-1);

		foreach($listPost as $post)
		{
			$post['content'] = substr($post['content'], 0, 50).'...';
		}
		

		$this->page->addVar('title', 'Tout les Posts');
		$this->page->addVar('listPost', $listPost);
	}
	
	public function executeIndexCat(HTTPRequest $request)
	{
	    $listPost = $this->managers->getManagerOf('Post')->getPostByCat($request->getData('cat'));
	    $cat = $this->managers->getManagerOf('Category')->getCategory($request->getData('cat'));
	    foreach($listPost as $post)
		{
			$post['content'] = substr($post['content'], 0, 20);
		}
	    $this->page->addVar('title', $cat->name());
	    $this->page->addVar('listPost', $listPost);
	    
	}
	
	public function executeCategories()
	{
	    $listCat = $this->managers->getManagerOf('Category')->getAll();
	    foreach($listCat as $cat){
	    	$cat['name'] = ucfirst($cat['name']);
	    }
	    $this->page->addVar('title', 'Categories');
	    $this->page->addVar('listCat', $listCat);
	}
	
	public function executeAddComment(HTTPRequest $request)
	{
	    $comment = new Comment();
	    $comment->setAuthor($request->postData('author'));
	    $comment->setContent($request->postData('comment'));
	    $comment->setPost($request->postData('postId'));
	    
	    $this->managers->getManagerOf('Comments')->add($comment);
	    print_r(date('d-m-Y'));
	    exit;
	}
}