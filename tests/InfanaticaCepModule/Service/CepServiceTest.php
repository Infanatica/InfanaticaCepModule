<?php

namespace InfanaticaCepModule\Service;

use InfanaticaCepModule\Fixture\FakeAdapter;
use InfanaticaCepModule\Response\EnderecoResponse;
use PHPUnit_Framework_TestCase;

/*
    * To change this license header, choose License Headers in Project Properties.
    * To change this template file, choose Tools | Templates
    * and open the template in the editor.
 */

/**
 * Description of HelpersTest
 *
 * @author thiagoguimaraes
 */
class CepServiceTest extends PHPUnit_Framework_TestCase
{
    private $fakeAdapter;

    public function testGetEnderecoWithoutFormat()
    {
        $cepService = new CepService($this->getFakeAdapter());
        $endereco = $cepService->getEnderecoByCep('12345678');
        $this->assertInstanceOf(EnderecoResponse::class, $endereco);
    }

    public function testGetEnderecoJson()
    {
        $expectedJson = '{  
                            "logradouro":"Av. Rio Branco",
                            "bairro":"Centro",
                            "localidade":"Rio de Janeiro",
                            "uf":"RJ"
                        }';

        $cepService = new CepService($this->getFakeAdapter());
        $endereco = $cepService->getEnderecoByCep('12345678', 'json');
        $this->assertJson($endereco);
        $this->assertJsonStringEqualsJsonString($expectedJson, $endereco);
    }

    private function getFakeAdapter()
    {
        if (empty($this->fakeAdapter)){
            $this->fakeAdapter = new FakeAdapter();
        }
        
        return $this->fakeAdapter;
    }

}