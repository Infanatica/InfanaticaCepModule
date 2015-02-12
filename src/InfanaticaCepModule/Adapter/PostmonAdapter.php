<?php

namespace InfanaticaCepModule\Adapter;
use Zend\Http\Client;
use InfanaticaCepModule\Response\EnderecoResponse;
use InfanaticaCepModule\Exception\CepNotFoundException;

class PostmonAdapter implements CepAdapterInterface {
    /** @var  Client */
    protected $httpClient;

    /** @var  EnderecoResponse */
    protected $enderecoResponse;

    public function __construct(Client $httpClient,EnderecoResponse $enderecoResponse)
    {
        $this->httpClient = $httpClient;
        $this->enderecoResponse = $enderecoResponse;
    }

    public function getEnderecoByCep($cep)
    {
        $this->httpClient->setUri("http://api.postmon.com.br/v1/cep/{$cep}");

        $response = $this->httpClient->send();

        return $this->parseResponse($response->getBody());
    }

    protected function parseResponse($response)
    {
        if(!$this->isJson($response))
        {
            throw new CepNotFoundException();
        }

        if (empty($response)){
            throw new CepNotFoundException();
        }

        $response = json_decode($response,true);

        $enderecoResponse = $this->enderecoResponse;

        if(isset($response['logradouro']) && !empty($response['logradouro']))
        {
            $enderecoResponse->setLogradouro($response['logradouro']);
        }

        if(isset($response['bairro']) && !empty($response['bairro']))
        {
            $enderecoResponse->setBairro($response['bairro']);
        }

        if(isset($response['cidade']) && !empty($response['cidade']))
        {
            $enderecoResponse->setLocalidade($response['cidade']);
        }

        if(isset($response['estado']) && !empty($response['estado']))
        {
            $enderecoResponse->setUf($response['estado']);
        }

        return $enderecoResponse;
    }
    protected function isJson ($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}