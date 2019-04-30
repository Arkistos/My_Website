<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Comment;

abstract class CommentsManager extends Manager
{
    /**
     * enregistre un commentaire
     * @param comment Comment
     * return void
     */
    abstract public function add(Comment $comment);
    
    /**
     * envoie une liste de commentaire
     * @param postId int l'id du post 
     * return array liste de commentaire
     */
    abstract public function getList($postId);
    
    /**
     * supprimer les com lié à un post
     * @param postId int id du post
     * return void
     */
    abstract public function deleteComments($postId);
  
}