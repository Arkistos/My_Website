<?php
namespace Entity;

use \OCFram\Entity;

class Comment extends Entity
{
  protected $post,
            $author,
            $content,
            $date;


    public function isValid()
    {
        return !(is_string($content) || empty($content));
    }
    
    /***SETTERS***/
    public function setPost($post)
    {
        $this->post = $post;
    }
    
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    /***GETTERS***/
    
    public function post()
    {
        return $this->post;
    }
    
    public function author()
    {
        return $this->author;
    }
    
    public function content()
    {
        return $this->content;
    }
    
    public function date()
    {
        return $this->date;
    }
    
    
}