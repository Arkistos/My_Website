<?php
namespace Entity;

use \OCFram\Entity;

class User extends Entity
{
	protected $id,
						$email,
						$roles,
						$password,
						$profile_pic,
						$name,
						$image;

	public function isValid()
	{
		return !(empty($email) || empty($password));
	}

	/*** SETTERS ***/
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setRoles($roles)
	{
		$this->roles = $roles;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function setProfilePic($profile_pic)
	{
		$this->profile_pic = $profile_pic;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setImage($image)
	{
		$this->image = $image;
	}

	/*** GETTERS ***/
	public function email()
	{
		return $this->email;
	}

	public function roles()
	{
		return $this->roles;
	}

	public function password()
	{
		return $this->password;
	}

	public function profilePic()
	{
		return $this->profile_pic;
	}

	public function name()
	{
		return $this->name;
	}

	public function image()
	{
		return $this->image;
	}	



}