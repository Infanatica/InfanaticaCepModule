<?php

namespace InfanaticaCepModule\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use InfanaticaCepModule\Adapter\ViaCepAdapter;

class ViaCepAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        /** @var \Zend\Http\Client $httpClient */
        $httpClient       = $serviceLocator->get('InfanaticaCepModule\Http\Client');

        /** @var \InfanaticaCepModule\Response\EnderecoResponse $enderecoResponse */
        $enderecoResponse = $serviceLocator->get('InfanaticaCepModule\Response\EnderecoResponse');

        $adapter          = new ViaCepAdapter($httpClient, $enderecoResponse);
        return $adapter;
    }

}