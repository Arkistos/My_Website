<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\NotNullValidator;
use \OCFram\MaxLengthValidator;
use \OCFram\MailConformValidator;

class ContactFormBuilder extends FormBuilder
{
	public function build()
	{
		$this->form->add(new StringField([
			'label' => 'Nom',
			'name' => 'name',
			'maxLenght' => 20,
			'validators' => [
				new MaxLengthValidator('Le nom est trop long', 20),
				new NotNullValidator('Nom non défini'),
			],
			]))
			->add(new StringField([
				'label' => 'mail',
				'name' => 'mail',
				'maxLenght' => 20,
				'validators' => [
					new MailConformValidator('L\'adresse est incorrect'),
					new NotNullValidator('Mail non défini'),
				],
			]))
			->add(new TextField([
        'label' => 'message',
        'name' => 'message',
        'rows' => 8,
        'cols' => 60,
        'validators' => [
          new NotNullValidator('Merci de spécifier le contenu de la news'),
        ],
       ]));
	}
}