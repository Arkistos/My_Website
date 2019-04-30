<?php
namespace Model;

use \Entity\User;

class UserManagerPDO extends UserManager
{
	public function match($login, $password)
	{
		$rq = $this->dao->prepare('SELECT id, email, roles, password, profile_pic, name FROM user WHERE name = :login AND password = :password');
		$rq->bindValue(':login', $login);
		$rq->bindValue(':password',  hash('sha256', $password));
		$rq->execute();

		if($user = $rq->fetch())
		{
			return $user;
		}
		return null;
 	}

 	public function testId($login, $mail)
 	{
 		$rq = $this->dao->prepare('SELECT name, email FROM user WHERE name = :login AND email = :email');
 		$rq->bindValue(':login', $login);
 		$rq->bindValue(':email', $mail);
 		$rq->execute();
 		if($rq->fetch())
 		{
 			return true;
 		}

 		return false;
 	}

 	public function add($user)
 	{
 		$rq = $this->dao->prepare('INSERT INTO user SET roles = :roles, email = :email, password = :password, name = :name');
 		$rq->bindValue(':email', $user->email());
 		$rq->bindValue(':password', hash('sha256', $user->password()));
 		$rq->bindValue(':name', $user->name());
 		$rq->bindValue(':roles', 'hey');

 		$rq->execute();

 	}	

 	public function addProfilePic($name, $id)
 	{
 		$rq = $this->dao->prepare('UPDATE user SET profile_pic = :picName WHERE id = :id');
 		$rq->bindValue(':id', $id);
 		$rq->bindValue(':picName', $name);
 		$rq->execute();
 	}

 	public function getProfilePic($user)
 	{
 		$rq = $this->dao->prepare('SELECT profile_pic FROM user WHERE name = :name');
      	$rq->bindValue(':name', $user);
      	$rq->execute();

      	if($pic = $rq->fetch()){
        	return $pic[0];
      	}
 	}

 	public function changePassword($oldPassword, $userId, $newPassword)
 	{
 	    
 	    $oldPassword = hash('sha256', $oldPassword);
 	    $newPassword = hash('sha256', $newPassword);
 		$rq = $this->dao->prepare('SELECT password FROM user WHERE id = :userid');
 		$rq->bindValue(':userid', $userId);
 		$rq->execute();

 		$userInfo = $rq->fetch();
 		$mdp = $userInfo['password'];
 		
 		if(!is_null($mdp) && $mdp == $oldPassword)
 		{
 		    
 			$rq = $this->dao->prepare('UPDATE user SET password = :mdp WHERE id = :userid');
 			$rq->bindValue(':mdp', $newPassword);
 			$rq->bindValue(':userid',  $userId);
 			$rq->execute();
 			return true;
 		}
 		return false;
 	}








}