<?php
namespace OCFram;

class MailConformValidator extends Validator
{
  
  public function __construct($errorMessage)
  {
    parent::__construct($errorMessage);
  }
  
  public function isValid($value)
  {
    return preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $value);
  }
  
}