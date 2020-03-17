<?php

namespace App\Gateway;

use App\Resolvers\ParserResolverTrait;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class NMIApiGateway
{
    use ParserResolverTrait;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var array
     */
    private $options = [];

    /**
     * @var string
     */
    private $nmiApiUrl = '';

    /**
     * @var array
     */
    private $queryParams = '';

    /**
     * F3ApiGateway constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->useDefaults();
    }

    public function useDefaults()
    {
        // $this->setQueryUri(Config::get('keys.nmi.query_endpoint'));

        $this->setUri(Config::get('keys.nmi.query_endpoint'));
        $this->setHeaders();
        $this->setOptions([]);
    }

    /**
     * @param $params
     * @return $this
     */
    public function buildSetQueryParams($params)
    {
        $params = $this->buildQueryParams($params);

        $this->queryParams = '?' . http_build_query($params);

        return $this;
    }

    /**
     * @param $params
     * @return array
     */
    public function buildQueryParams($params)
    {
        $result = [];

        foreach ($params as $key => $value) {
            $result[$key] = $value;
        }

        return $result;
    }

    /**
     * @param $uri
     * @return $this
     */
    public function setUri($uri)
    {
        $this->nmiApiUrl = $uri;

        return $this;
    }

    /**
     * @return string
     *
     */
    public function getNmiUri()
    {
        return $this->nmiApiUrl;
    }

    /**
     * @param $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = array_merge($this->headers, $options);

        return $this;
    }

    /**
     * @return $this
     */
    public function setHeaders()
    {
        $this->headers['headers'] = [
            'Content-Type'      => 'application/json',
            'username'         => Config::get('keys.nmi.username'),
            'password'         => Config::get('keys.nmi.password'),
        ];
        return $this;
    }

    /**
     * @param string $uri
     * @return array
     */
    public function getRequest($uri)
    {
        $result = $this->client->get($uri . $this->queryParams, $this->options)->getBody()->getContents();

        return $this->toArray($result);
    }

    /**
     * @param string $uri
     * @return array
     */
    public function putRequest($uri)
    {
        $result = $this->client->put($uri, $this->options)->getBody()->getContents();

        unset($this->headers['headers']['form_params']);

        return $this->toArray($result);
    }

    /**
     * @param string $uri
     * @return array
     */
    public function postRequest($uri)
    {
        $client = new Client([
            'headers' => $this->headers['headers']
        ]);

        $request = $client->request('POST', $uri, [
            'body' => json_encode($this->options['form_params'])
        ]);
        $response = $request->getBody()->getContents();

        return $this->toArray($response);
    }
}
