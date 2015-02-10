<?php

namespace InfanaticaCepModule\Factory;

use InfanaticaCepModule\Adapter\CorreioControlAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CorreioControlAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        /** @var \Zend\Http\Client $httpClient */
        $httpClient       = $serviceLocator->get('InfanaticaCepModule\Http\Client');

        /** @var \InfanaticaCepModule\Response\EnderecoResponse $enderecoResponse */
        $enderecoResponse = $serviceLocator->get('InfanaticaCepModule\Response\EnderecoResponse');

        $adapter          = new CorreioControlAdapter($httpClient, $enderecoResponse);
        return $adapter;
    }

}