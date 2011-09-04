<?php

namespace Gregwar\DSD\Fields;

class MailField extends FIeld
{
    public function check()
    {
		if ($this->optional && !$this->value)
			return;

		$err = parent::check();
		if ($err)
			return $err;

		if (!($this->multiple && is_array($this->value)) && !filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
			return "Le champ ".$this->printName()." doit �tre une adresse e-mail valide";
		}
		return;
	}	
}
