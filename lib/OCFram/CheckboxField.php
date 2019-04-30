<?php
namespace OCFram;

class CheckBoxField extends Field
{
  protected $listBox = [];
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }
    
    foreach($listBox as $box){
    	$widget .='<label>'.$this->label.'</label><input type="checkbox" name="'.$this->name.'"';
    	$widget .= ' value="'.htmlspecialchars($this->value).'"';
    }

    return $widget .= ' />';
  }

  public function setListBox(Array $listBox)
  {
  	$this->listBox = $listBox;
  }
}