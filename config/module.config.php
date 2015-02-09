<?php
return array(
    'router' => array(
        'routes' => array(
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'infanatica-cep' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/cep',
                    'defaults' => array(
                        '__NAMESPACE__' => 'InfanaticaCepModule\Controller',
                        'controller'    => 'Cep',
                        'action'        => 'index',

                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'cep-format-default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:cep]',
                            'constraints' => array(
                                'cep' => '[0-9\-]{8,9}',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'InfanaticaCepModule\Controller',
                                'controller'    => 'Cep',
                                'action'        => 'getEnderecoByCep',
                                'format'        => 'json'

                            ),
                        ),
                    ),

                    'cep-format' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/:cep:/:formato',
                             'defaults' => array(
                                'action'=> 'getEnderecobyCep',
                                'format'=>'json'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'service_manager' => array(
        'invokables' => array (
          'InfanaticaCepModule\Http\Client' => 'Zend\Http\Client',
          'InfanaticaCepModule\Http\Response' => 'Zend\Http\Response',
          'InfanaticaCepModule\Response\EnderecoResponse' => 'InfanaticaCepModule\Response\EnderecoResponse'
        ),
        'factories' => array(
            'InfanaticaCepModule\Service\CepService' =>'InfanaticaCepModule\Factory\CepServiceFactory',
            'InfanaticaCepModule\Service\ViaCepAdapter' =>'InfanaticaCepModule\Factory\ViaCepAdapterFactory'
        ),
        'aliases' => array(
            'InfanaticaCepModule\Adapter\CepDefaultAdapter' => 'InfanaticaCepModule\Service\ViaCepAdapter'
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'InfanaticaCepModule\Controller\Cep' =>'InfanaticaCepModule\Factory\CepControllerFactory'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
