<?php

namespace App\Gateway\Interfaces;

interface NMIApiGatewayInterface
{
    /**
     * @param array $body
     * @return mixed
     */
    public function createCustomerVault($body);
}
