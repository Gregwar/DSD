<?php

namespace Gregwar\DSD\Fields;

/**
 * Champ text
 *
 * @author Grégoire Passault <g.passault@gmail.com>
 */
class TextField extends Field
{
    public function __construct()
    {
        $this->type = 'text';
    }
}
