<?php
namespace Entity;

use \OCFram\Entity;

class Post extends Entity
{
	protected $id,
			  		$title,
			  		$content,
			  		$date,
			  		$image,
			  		$author,
			  		$category = [],
			  		$images = [];

	public function isValid()
	{

		return !(empty($this->title) || empty($this->content));
	}


	/*** SETTERS***/
	public function setTitle($title)
	{
		if(!is_string($title) || empty($title))
		{
			$this->erreur[] = 'invalid title';
		}

		$this->title = $title;
	}

	public function setContent($content)
	{
		if(!is_string($content) || empty($content))
		{
			$this->erreur[] = 'invalid content';
		}

		$this->content = $content;
	}

	public function setAuthor($author)
	{
		if(!is_string($author) || empty($author))
		{
			$this->erreur[] = 'invalid author';
		}

		$this->author = $author;
	}

	public function setDate(\DateTime $date)
	{
		$this->date = $date;
	}

	public function setImage($image)
	{
		$this->image = $image;
	}

	public function addCategory($id)
	{
    $this->category[] = $id;
    
	}

	public function addImages($name)
	{
		$this->images[] = $name;
	}

	/*** GETTERS ***/
	public function id()
	{
		return $this->id;
	}
	
	public function title()
	{
		return $this->title;
	}

	public function content()
	{
		return $this->content;
	}

	public function date()
	{
		return $this->date;
	}

	public function image()
	{
		return $this->image;
	}

	public function author()
	{
		return $this->author;
	}

	public function category()
	{
		return $this->category;
	}

	public function images()
	{
		return $this->images;
	}















}