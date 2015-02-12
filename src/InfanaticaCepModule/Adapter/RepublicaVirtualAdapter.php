<?php

namespace InfanaticaCepModule\Adapter;
use Zend\Http\Client;
use InfanaticaCepModule\Response\EnderecoResponse;
use InfanaticaCepModule\Exception\CepNotFoundException;

class RepublicaVirtualAdapter implements CepAdapterInterface {
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
        $this->httpClient->setUri("http://cep.republicavirtual.com.br/web_cep.php?cep={$cep}&formato=json");

        $response = $this->httpClient->send();

        return $this->parseResponse($response->getBody());
    }

    protected function parseResponse($response)
    {
        if(!$this->isJson($response))
        {
            throw new CepNotFoundException();
        }

        $response = json_decode($response,true);

        $enderecoResponse = $this->enderecoResponse;

        if (isset($response['resultado']) && $response['resultado'] != 1){
            throw new CepNotFoundException();
        }

        if(isset($response['logradouro']) && !empty($response['logradouro']) && isset($response['tipo_logradouro']) && !empty($response['tipo_logradouro'])) {
            $enderecoResponse->setLogradouro($response['tipo_logradouro'] . ' ' . $response['logradouro']);
        }

        if(isset($response['bairro']) && !empty($response['bairro'])) {
            $enderecoResponse->setBairro($response['bairro']);
        }

        if(isset($response['cidade']) && !empty($response['cidade'])) {
            $enderecoResponse->setLocalidade($response['cidade']);
        }

        if(isset($response['uf']) && !empty($response['uf'])) {
            $enderecoResponse->setUf($response['uf']);
        }

        return $enderecoResponse;
    }

    protected function isJson ($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}