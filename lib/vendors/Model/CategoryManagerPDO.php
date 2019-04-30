<?php
namespace Model;

use \Entity\Category;

class CategoryManagerPDO extends CategoryManager
{ 
    
    public function getList($postId)
    {
        $requete = $this->dao->prepare('SELECT  category.name, category.id FROM post LEFT OUTER JOIN post_category ON post.id = post_category.post_id LEFT OUTER JOIN category ON post_category.category_id = category.id WHERE post.id = :id');
            $requete->bindValue(':id', (int) $postId, \PDO::PARAM_INT);
            $requete->execute();
            
            $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Category');
    
    	    $listCat = $requete->fetchAll();

    	    $requete->closeCursor();

    	    return $listCat; 
    }
    
    public function getAll()
    {
        $sql = 'SELECT id, name FROM category';
        
        $requete = $this->dao->query($sql);
    	$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Category');
    
    	$listCat = $requete->fetchAll();

    	$requete->closeCursor();

    	return $listCat; 
    }
    
    public function getCategory($id)
    {
        $requete = $this->dao->prepare('SELECT name FROM category WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();
            
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Category');
        if($cat = $requete->fetch())
        {
            return $cat;
        }

        return null;
    }
    
    public function addCategory($name)
    {
        $rq = $this->dao->prepare('INSERT INTO category SET name = :name');
        $rq->bindValue(':name', $name);
        $rq->execute();
        
        return $this->dao->lastInsertId();
    }

}
