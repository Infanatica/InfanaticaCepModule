<?php

namespace InfanaticaCepModule\Fixture;


use InfanaticaCepModule\Adapter\CepAdapterInterface;
use InfanaticaCepModule\Response\EnderecoResponse;

class FakeAdapter implements CepAdapterInterface
{
    private $fakeResponse;

    public function __construct()
    {
        
    }

    public function getEnderecoByCep($cep)
    {
        return $this->getFakeResponse();
    }

    private function getFakeResponse()
    {
        if (empty($this->fakeResponse)){
            $this->fakeResponse = $this->mockReponse();
        }

        return $this->fakeResponse;
    }

    private function mockReponse()
    {
        $response = new EnderecoResponse();
        $response->setBairro('Centro');
        $response->setLocalidade('Rio de Janeiro');
        $response->setLogradouro('Av. Rio Branco');
        $response->setUf('RJ');

        return $response;
    }

    public function setFakeResponse()
    {

    }
}