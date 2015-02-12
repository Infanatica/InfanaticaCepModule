<?php

namespace InfanaticaCepModule\Factory;

use InfanaticaCepModule\Adapter\PostmonAdapter;
use InfanaticaCepModule\Adapter\RepublicaVirtualAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RepublicaVirtualAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        /** @var \Zend\Http\Client $httpClient */
        $httpClient       = $serviceLocator->get('InfanaticaCepModule\Http\Client');

        /** @var \InfanaticaCepModule\Response\EnderecoResponse $enderecoResponse */
        $enderecoResponse = $serviceLocator->get('InfanaticaCepModule\Response\EnderecoResponse');

        $adapter          = new RepublicaVirtualAdapter($httpClient, $enderecoResponse);
        return $adapter;
    }

}