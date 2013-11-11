<?php

/*
 * This file is part of the mangopay-php package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay-php>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay;

use Guzzle\Http\Client as GuzzleHttpClient;
use Guzzle\Http\Exception\BadResponseException;

use Gordalina\Mangopay\Authentication\Signer;
use Gordalina\Mangopay\Authentication\SignerPlugin;
use Gordalina\Mangopay\Request\RequestInterface;
use Gordalina\Mangopay\Request\RequestModel;
use Gordalina\Mangopay\Request\RequestModelCollection;
use Gordalina\Mangopay\Response\Response;
use Gordalina\Mangopay\Response\ResponseException;
use Gordalina\Mangopay\Response\ResponseInterface;
use Gordalina\Mangopay\Response\ResponseModel;
use Gordalina\Mangopay\Response\ResponseModelCollection;

class Client
{
    const API_VERSION = 'v1';
    const ENDPOINT_PRODUCTION = 'https://api.leetchi.com';
    const ENDPOINT_SANDBOX = 'https://api-preprod.leetchi.com';

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Signer
     */
    protected $signer;

    /**
     * @var boolean
     */
    protected $sandbox = false;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->signer = new Signer($config->getPrivateKey(), $config->getPrivateKeyPassphrase());

        $this->createHttpClient();
    }

    /**
     * @param  RequestInterface  $request
     * @return ResponseInterface
     */
    public function request(RequestInterface $request)
    {
        $uri = sprintf('/%s/partner/%s/%s', static::API_VERSION, $this->config->getPartner(), $request->getPath());

        $httpRequest = $this->client->createRequest($request->getMethod(), $uri, null, $request->getBody());

        try {
            $httpResponse = $httpRequest->send();
        } catch (BadResponseException $e) {
            return new ResponseException($e->getResponse()->getStatusCode(), $e->getResponse()->getBody());
        }

        if ($request instanceof RequestModelCollection) {
            $response = new ResponseModelCollection();
        } elseif ($request instanceof RequestModel) {
            $response = new ResponseModel();
        } else {
            $response = new Response();
        }

        $response->setStatusCode($httpResponse->getStatusCode());
        $response->setBody($httpResponse->getBody(true));

        $request->handle($response);

        return $response;
    }

    /**
     * Enable communication to sandbox server
     *
     * @param  boolean $sandbox defaults to true
     * @return null
     */
    public function setSandbox($sandbox = true)
    {
        $this->sandbox = $sandbox;
        $this->createHttpClient();
    }

    /**
     * @return boolean
     */
    public function isSandbox()
    {
        return $this->sandbox;
    }

    /**
     * Return production or sandbox endpoint depending on state
     *
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->sandbox ? static::ENDPOINT_SANDBOX : static::ENDPOINT_PRODUCTION ;
    }

    /**
     * Initializes client
     *
     * @return null
     */
    protected function createHttpClient()
    {
        $this->client = new GuzzleHttpClient($this->getEndpoint());
        $this->client->addSubscriber(new SignerPlugin($this->signer));
    }
}
