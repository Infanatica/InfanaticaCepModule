<?php

namespace InfanaticaCepModule\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use InfanaticaCepModule\Service\CepService;

class CepServiceFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){

        /** @var \InfanaticaCepModule\Adapter\CepAdapterInterface $cepAdapter */
        $cepAdapter = $serviceLocator->get('InfanaticaCepModule\Adapter\CepDefaultAdapter');
        $service = new CepService($cepAdapter);
        return $service;
    }

}