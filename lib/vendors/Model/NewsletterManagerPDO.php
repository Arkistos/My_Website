<?php
namespace Model;

use \Entity\Newsletter;

class NewsletterManagerPDO extends NewsletterManager
{
	public function addMail($mail)
	{
		$rq = $this->dao->prepare('SELECT mail FROM newsletter WHERE mail = :mail');
		$rq->bindValue(':mail', $mail);
		$rq->execute();
		if($result=$rq->fetch())
		{
			return false;
		}
		else
		{		

			$rq = $this->dao->prepare('INSERT INTO newsletter SET mail = :mail');

			$rq->bindValue(':mail', $mail);
			$rq->execute();
			return true;
		}
	}
}