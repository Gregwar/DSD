<?php

namespace Gregwar\Formidable;

/**
 * Csrf token
 */
class Csrf
{
    protected $name;

    /**
     * CSRF token
     */
    protected $token = null;

    public function __construct($name = '')
    {
        $this->name = $name;
    }

    public function getToken()
    {
        $this->generateToken();

        return $this->token;
    }

    /**
     * Generate the token or get it from the session
     */
    protected function generateToken()
    {
        if ($this->token === null) {
            $key = sha1(__DIR__ . '/' . 'formidable_secret');

            if (isset($_SESSION[$key])) {
                $secret = $_SESSION[$key];
            } else {
                $secret = sha1(uniqid(mt_rand(), true));
                $_SESSION[$key] = $secret;
            }

            if ($this->name) {
                $secret .= '/' . $this->name;
            }

            $this->token = sha1($secret);
        }
    }

    /**
     * HTML render
     */
    public function getHtml()
    {
        $this->generateToken();

        return '<input type="hidden" name="csrf_token" value="'.$this->token.'" /></form>';
    }

    public function __toString()
    {
        return $this->getHtml();
    }
}
