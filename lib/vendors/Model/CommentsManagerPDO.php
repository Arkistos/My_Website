<?php
namespace Model;

use \Entity\Comment;

class CommentsManagerPDO extends CommentsManager
{
    public function add(Comment $comment)
    {
        $rq = $this->dao->prepare('INSERT INTO comment SET post_id = :post, author = :author, date = NOW(), commentaire = :content');
        $rq->bindValue(':post', $comment->post());
        $rq->bindValue(':author', $comment->author());
        $rq->bindValue(':content', $comment->content());
        
        $rq->execute();
    }
    
    public function getList($postId)
    {
        $rq = $this->dao->prepare('SELECT id, post_id, author, date, commentaire FROM comment WHERE post_id = :post ORDER BY date');
        $rq->bindValue(':post', $postId);

        $rq->execute();

        $listComment = $rq->fetchAll();
        $rq->closeCursor();

        return $listComment;
    }

    public function deleteComments($postId)
    {
        $rq = $this->dao->prepare('DELETE FROM comment WHERE post_id = :post');
        $rq->bindValue('post', $postId);
        $rq->execute();
    }    






}