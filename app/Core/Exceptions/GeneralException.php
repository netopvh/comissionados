<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 10/04/2018
 * Time: 18:11
 */

namespace App\Core\Exceptions;


class GeneralException extends \Exception
{
    public function setMessage($message)
    {
        return $this->message = $message;
    }
}