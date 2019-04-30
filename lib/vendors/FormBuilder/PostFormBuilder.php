<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\NotNullValidator;

class PostFormBuilder extends FormBuilder
{
	public function build()
	{
		$this->form->add(new StringField([
			'label' => 'Titre',
			'name' => 'title',
			'validators' => [
				new NotNullValidator('Titre non défini'),
			],
			]))
			->add(new TextField([
				'label' => 'Texte',
				'name' => 'content',
				'validators' => [
				new NotNullValidator('Contenu non défini'),
			],
			]));
	}





}