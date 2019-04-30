<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Post;

abstract class PostManager extends Manager
{

	/**
   * Méthode permettant d'enregistrer une news.
   * @param $post Post le post à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(Post $post)
  {
    if ($post->isValid())
    {
      $post->isNew() ? $this->add($post) : $this->modify($post);
    }
    else
    {
      throw new \RuntimeException('Le post doit être validée pour être enregistrée');
    }
  }

	/**
	* retourne une liste de  Post
	* @param $debut pour le début de la liste
	* @param $limite pour le nombre de post à retourner
	* @return array la liste des Post
	*/
	abstract public function getList($debut = -1, $limite = -1);

	/**
	* @param $id référence du post recherché
	* @return le post en question
	*/
	abstract public function getPost($id);
	
	/**
	 * retourne les post associé à une catégorie
	 * @param $categorie 
	 * @return array liste des posts
	 */
	abstract public function getPostByCat($categorie);

	/**
	 * retourne les post écrit par un auteur
	 * @param $user username
	 * @return array liste des posts
	 */
	abstract public function getPostByAuthor($author);

	/**
	 * ajoute un post
	 * @param $post Post
	 * @param $image liste des images
	 * @return string confirmation
	 */
	abstract public function add(Post $post);

	/**
   * Méthode permettant de modifier un post.
   * @param $post Post le post à modifier
   * @return void
   */
  abstract protected function modify(Post $post);

    /**
     * suppprime un post
     * @param $postId post à supprimer
     * @return void
     */
    abstract public function deletePost($postId);
    
}