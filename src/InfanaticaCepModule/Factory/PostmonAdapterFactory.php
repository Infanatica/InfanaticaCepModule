<?php

namespace InfanaticaCepModule\Factory;

use InfanaticaCepModule\Adapter\PostmonAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostmonAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        /** @var \Zend\Http\Client $httpClient */
        $httpClient       = $serviceLocator->get('InfanaticaCepModule\Http\Client');

        /** @var \InfanaticaCepModule\Response\EnderecoResponse $enderecoResponse */
        $enderecoResponse = $serviceLocator->get('InfanaticaCepModule\Response\EnderecoResponse');

        $adapter          = new PostmonAdapter($httpClient, $enderecoResponse);
        return $adapter;
    }

}