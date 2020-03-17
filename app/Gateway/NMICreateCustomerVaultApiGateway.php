<?php

namespace App\Gateway;

use App\Gateway\Interfaces\NMIApiGatewayInterface;
use GuzzleHttp\Client;
// use App\Exceptions\Gateway\OMS\EmptyPayloadException;
use App\Exceptions\Gateway\NMICreateCustomerVaultApiException;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AWBOrderManifestApiGateway extends NMIApiGateway implements NMIApiGatewayInterface
{
    const MANIFEST_ROUTE = '/sc/manifest';

    /**
     * @var Client
     */
    private $client;

    /**
     * AWBOrderManifestApiGateway constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        $this->client = $client;
    }

    /**
     * @param array $manifestPayload
     * @return array
     * @throws EmptyPayloadException
     * @throws AWBException
     */
    public function printOrderManifest($manifestPayload)
    {
        Log::info("Start - " . __METHOD__);
        Log::info(json_encode($manifestPayload));

        $apiUri = $this->getAwbUri() . self::MANIFEST_ROUTE;

        try {
            return $this->setOptions(['form_params' => $manifestPayload])->postRequest($apiUri);
        } catch (ClientException $exception) {
            if ($exception->getCode() == Response::HTTP_BAD_REQUEST) {
                throw new EmptyPayloadException();
            }

            if ($exception->getCode() == Response::HTTP_UNPROCESSABLE_ENTITY) {
                $response = $this->getResponseContents($exception);
                throw (new AWBException())->setErrorMessages($response['description']);
            }
        }
    }

    /**
     * @param ClientException $exception
     * @return array
     */
    private function getResponseContents(ClientException $exception)
    {
        return $this->toArray($exception->getResponse()->getBody()->getContents());
    }
}
