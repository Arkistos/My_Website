<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Category;
use \Entity\Post;

abstract class CategoryManager extends Manager
{

	/**
	* retourne une liste de  Category lié à un post
	* @param $post Post le post concerné
	* @return array la liste des Category
	*/
	abstract public function getList($postId);
	
	/**
	 * retourne toute les Category
	 * @return array liste Category
	 */
	 abstract public function getAll();
	 
	 /**
	  * retourne la category lié à l'id
	  * @param $id int id de la category
	  * @return le nom de la category
	  */
	 abstract public function getCategory($id);
	 
	 /**
	  * ajoute une catégorie
	  * @param $name string 
	  * @return l'id de la catégorie
	  */
	 abstract public function addCategory($name);

}