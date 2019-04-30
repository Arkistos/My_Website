<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Message;

abstract class MessageManager extends Manager
{


	/**
	* sauvegarde un message
	* @param $message Message à sauvegarder
	* @see self::add()
  * @return void
  */
  public function save(Message $message)
  {
    if ($message->isValid())
    {
      $this->add($message);
    }
    else
    {
      throw new \RuntimeException('Le message doit être validée pour être enregistrée');
    }
 	} 

  /**
  * ajoute un message
  * @param $message Message à enregistrer
  * @return void
  */ 
  abstract protected function add(Message $message);


  /**
  * retourne les messages
  * @return array liste des messages
  */
  abstract function get();

  /** 
  * retourne un message
  * @param $id int id du msg
  * @return message
  */
  abstract function getUnique($id);
}