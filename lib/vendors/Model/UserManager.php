<?php
namespace Model;

use \OCFram\Manager;
use \Entity\User;

abstract class UserManager extends Manager
{

	/**
	*@param $login string  
	*@param $password string
	*@return user User
	*/
	abstract public function match($login, $password);

	/**
	* @param $login string
	* @param $mail string
	* @return boolean username already exist
	*/
	abstract public function testId($login, $mail);

	/**
	* @param $user user
	* @return void
	*/
	abstract public function add($user);

	/**
	* @param $mdp string
	* @param $userId int
	* @param $newMdp string
	* @return boolean
	*/
	abstract public function changePassword($oldPassword, $userId, $newPassword);

	/**
	* @param $name of profile pic
	* @return void
	*/
	abstract public function addProfilePic($name, $id);

	/**
	* @param $name username
	* @return $pic profile pic
	*/
	abstract public function getProfilePic($name);


}