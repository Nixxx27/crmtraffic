<?php

namespace App\Exceptions\Gateway;

class NMICreateCustomerVaultApiException extends \Exception
{
    protected $errors;

    /**
     * @param $messages
     * @return $this
     */
    public function setErrorMessages($messages)
    {
        $this->errors = $messages;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorMessages()
    {
        return $this->errors;
    }
}
