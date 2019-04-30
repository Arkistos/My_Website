<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Newsletter;

abstract class NewsletterManager extends Manager
{
	/**
	*@param $mail string Mail à ajouter
	*@return boolean mail exist
	*/
	abstract public function addMail($mail);
}