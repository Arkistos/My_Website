<?php
namespace Entity;

use \OCFram\Entity;

class Newsletter extends Entity
{
	protected $id,
						$mail;


	public function isValid()
	{
		return !empty($this->mail);
	}

	/*** SETTERS ***/
	public function setMail($mail)
	{
		if(!is_string($mail) || empty($mail))
		{
			$this->error[] = 'invalid mail';
		}
		$this->mail = $mail;
	}

	/*** GETTERS ***/
	public function mail()
	{
		return $this->mail;
	}
}