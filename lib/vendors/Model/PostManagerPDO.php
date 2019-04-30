<?php
namespace Model;

use \Entity\Post;

class PostManagerPDO extends PostManager
{ 
	public function getList($debut =-1, $limite = -1)
	{
		$sql = 'SELECT id, title, content, date, author, image FROM post ORDER BY date DESC';

		if ($debut != -1 || $limite != -1)
    	{
      		$sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    	}

    	$requete = $this->dao->query($sql);
    	$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Post');
    
    	$listPost = $requete->fetchAll();

    	$requete->closeCursor();

    	return $listPost; 
	}

  public function getPost($id)
  {
    $requete = $this->dao->prepare('SELECT id, title, content, date, author, image FROM post WHERE post.id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
      
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Post');

    if($post = $requete->fetch())
    {
      return $post;
    }

    return null;
  }

  public function getPostByCat($categorie)
  {
    $requete = $this->dao->prepare('SELECT post.id, title, content, date, author, image FROM post LEFT OUTER JOIN post_category ON post.id = post_category.post_id LEFT OUTER JOIN category ON post_category.category_id = category.id WHERE category.id = :id ORDER BY post.date DESC');
        $requete->bindValue(':id', (int) $categorie, \PDO::PARAM_INT);
        $requete->execute();
        
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Post');
    
    $listPost = $requete->fetchAll();

    $requete->closeCursor();

    return $listPost; 
  }

  public function add(Post $post)
  {
    $rq = $this->dao->prepare('INSERT INTO post SET title = :title, content = :content, date = NOW(), author = :author, image = :image');
    $rq->bindValue(':title', $post->title());
    $rq->bindValue(':content', $post->content());
    $rq->bindValue(':author', $post->author());
    $rq->bindValue(':image', $post->image());

    $rq->execute();
    $lastId = $this->dao->lastInsertId();


    foreach($post->category() as $cat)
    {
      $rq = $this->dao->prepare('INSERT INTO post_category SET post_id = :post_id, category_id = :category_id');
      $rq->bindValue(':post_id', $lastId);
      $rq->bindValue(':category_id', intVal($cat));
      $rq->execute();
    }

    

    foreach($post->images() as $img)
    {
      $rq = $this->dao->prepare('INSERT INTO images SET post_id = :post, name = :nameImg');
      $rq->bindValue(':post', $lastId);
      $rq->bindValue(':nameImg', $img);
      $rq->execute();
    }


  }

  protected function modify(Post $post)
  {
    $requete = $this->dao->prepare('UPDATE post SET title = :title, content = :content, date = NOW(), image = :image, author = :author WHERE id = :id');
    
    $requete->bindValue(':title', $post->title());
    $requete->bindValue(':content', $post->content());
    $requete->bindValue(':author', $post->author());
    $requete->bindValue(':image', $post->image());
    $requete->bindValue(':id', $post->id(), \PDO::PARAM_INT);
    
    $requete->execute();
  }

  public function getPostByAuthor($author)
  {
    $rq = $this->dao->prepare('SELECT id, title, content, date, author, image FROM post WHERE author = :author');
    $rq->bindValue(':author', $author);
    $rq->execute();

    $listPost = $rq->fetchAll();
    $rq->closeCursor();
    return $listPost;
  }


    public function deletePost($postId)
    {
        
        
        /***supprime categorie***/
        $rq = $this->dao->prepare('DELETE FROM post_category WHERE post_id = :postid');
        $rq->bindValue(':postid', $postId);
        $rq->execute();
        
        /***supprime les commentaires***/
        $rq = $this->dao->prepare('DELETE FROM comment WHERE post_id = :id');
        $rq->bindValue(':id', $postId);
        $rq->execute();
        
        /**supprime post***/
        $rq = $this->dao->prepare('DELETE FROM post WHERE id = :id');
        $rq->bindValue(':id', $postId);
        $rq->execute();
        
    }



}
