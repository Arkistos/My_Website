<?php
namespace Entity;

use OCFram\Entity;

class Image extends Entity
{
	protected $id,
						$post,
						$name;


	/***SETTERS**/
	public function setPost($postId)
	{
		$this->post = $postId;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	/***GETTERS***/
	public function post()
	{
		return $this->post();
	}

	public function name()
	{
		return $this->name();
	}





}