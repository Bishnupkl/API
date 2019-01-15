<?php

namespace App\Exceptions;

use Exception;

class ProducNotBelongsToUser extends Exception
{
    public function render()
    {
        return ['error'=>'products not belongs to user'];
    }

}
