<?php

namespace Gregwar\DSD\Fields;

/**
 * Une mot de passe
 *
 * @author GrÃ©goire Passault <g.passault@gmail.com>
 */
class PasswordField extends Field
{
    public function __construct()
    {
        $this->type = 'password';
    }
}
