<?php

namespace Gregwar\DSD\Fields;

/**
 * Entier
 *
 * @author Gr�goire Passault <g.passault@gmail.com>
 */
class IntField extends NumberField
{
    public function __construct()
    {
        $this->type = 'text';
    }

    public function check()
    {
        if ($this->optional && !$this->value)
            return;

        $error = parent::check();
        if ($error)
            return $error;

        if ($this->multiple && is_array($this->value))
            return;

        if ((int)($this->value) != $this->value)
            return 'Le champ '.$this->printName().' doit �tre un entier';

        return;
    }
}

