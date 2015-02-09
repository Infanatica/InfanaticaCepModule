<?php

namespace InfanaticaCepModule\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Http\Response;
use InfanaticaCepModule\Controller\CepController;
use InfanaticaCepModule\Service\CepService;

class CepControllerFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        $serviceManager = $serviceLocator->getServiceLocator();

        /** @var CepService $cepService */
        $cepService = $serviceManager->get('InfanaticaCepModule\Service\CepService');

        /** @var Response $reponse */
        $response = $serviceManager->get('InfanaticaCepModule\Http\Response');
        $controller = new CepController($cepService,$response);
        return $controller;
    }

}