<?php
namespace Entity;

use \OCFram\Entity;

class Category extends Entity
{
	protected $id,
						$name;


	public function isValid()
	{
		return !empty($this->name);
	}

	/*** SETTERS ***/
	public function setName($name)
	{
		if(!is_string($name) || empty($name))
		{
			$this->error[] = 'invalid name';
		}
		$this->name = $name;
	}

	/*** GETTERS ***/
	
	public function name()
	{
		return $this->name;
	}
}