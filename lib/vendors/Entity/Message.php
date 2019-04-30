<?php
namespace Entity;

use \OCFram\Entity;

class Message extends Entity
{
	protected $id,
						$mail,
						$name,
						$message,
						$date,
						$lu;

	public function isValid()
	{
		return !(empty($this->mail) || empty($this->name) || empty($this->message));
	}

	/*** SETTERS ***/
	public function setMail($mail)
	{
		if(!is_string($mail) || empty($mail))
		{
			return $this->erreur[] = 'invalid mail';
		}
		$this->mail = $mail;
	}

	public function setName($name)
	{
		if(!is_string($name) || empty($name))
		{
			return $this->erreur[] = 'invalid name';
		}
		$this->name = $name;
	}

	public function setMessage($message)
	{
		if(!is_string($message) || empty($message))
		{
			return $this->erreur[] = 'invalid message';
		}
		$this->message = $message;
	}

	public function setDate(\Datetime $date)
	{
		$this->date = $date;
	}

	public function setLu(Bool $lu)
	{
		$this->lu = $lu;
	}

	/*** GETTERS ***/
	public function mail()
	{
		return $this->mail;
	}

	public function name()
	{
		return $this->name;
	}
	public function message()
	{
		return $this->message;
	}
	public function date()
	{
		return $this->date;
	}
	public function lu()
	{
		return $this->lu;
	}







}