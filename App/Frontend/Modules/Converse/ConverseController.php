<?php
namespace App\Frontend\Modules\Converse;

use \OCFram\BackController;
use \OCFram\HTTPRequest;


class ConverseController extends BackController
{
	public function executeDialog()
	{
		if($this->app->user()->getAttribute('id')== null){
			$key = $this->app->relationMaker()->addConverser();
			$this->app->user()->setAttribute('id', $key);
		}
		$this->page->addVar('id', $this->app->user()->getAttribute('id'));
	}
}