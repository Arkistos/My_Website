<?php
namespace Model;

use \Entity\Message;

class MessageManagerPDO extends MessageManager
{
	protected function add(Message $message)
  {
    $requete = $this->dao->prepare('INSERT INTO message SET mail = :mail, name = :name, message = :message, date = NOW(), lu = false');
    
    $requete->bindValue(':mail', $message->mail());
    $requete->bindValue(':name', $message->name());
    $requete->bindValue(':message', $message->message());
    
    $requete->execute();
  }

  public function get()
  {
  	$rq = 'SELECT id, mail, name, message, date ,lu FROM message';
  	$rq = $this->dao->query($rq);
  	$listMessage = $rq->fetchAll();
  	return $listMessage;
  }

  public function getUnique($id)
  {
    $rq = $this->dao->prepare('SELECT id, mail, name, message, date FROM message WHERE id = :id');
    $rq->bindValue(':id', $id);
    $rq->execute();
    if($message = $rq->fetch())
    {
      return $message;
    } 
    return null;
  }
}