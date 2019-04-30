<?php

namespace OCFram;

class RelationMaker extends ApplicationComponent
{
	public function addConverser()
	{

		$xml = new \DOMDocument;
      	$xml->load(__DIR__.'/../../App/'.$this->app->name().'/Config/talker.xml');

      	$visitors = $xml->getElementsByTagName('visitors')->item(0);
      	$talkers = $xml->getElementsByTagName('talker');

        /***get the first id available***/
      	$key = 0;
      	foreach ($talkers as $talker) {
      		$talkerId = (int)substr($talker->nodeValue, 1);
      		if( $talkerId > $key){
      			$key = $talkerId;
      		}
      	}
      	$key++;

        /***register in file***/
      	$newUser = $xml->createElement('talker', '#'.$key);
      	$xml->appendChild($newUser);
      	$visitors->appendChild($newUser);
      	
      	$xml->save(__DIR__.'/../../App/'.$this->app->name().'/Config/talker.xml');

      	return '#'.$key;
	}
	

	
}