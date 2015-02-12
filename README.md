# InfanaticaCepModule

Módulo em Zend Framework 2 para consulta de endereço via CEP

# Instalação

#### Instalação via clone do [InfanaticaCepModule](https://github.com/Infanatica/InfanaticaCepModule)

Clonar o projeto na pasta vendor ou module no seu projeto do Zend

    ```bash
    $ cd PASTA_DO_SKELETON_DO_ZEND_FRAMEWORK
    $ cd vendor
    $ git clone https://github.com/Infanatica/InfanaticaCepModule.git
    ```

#### Instalação via composer

###### Método 1

Adicionar o projeto [InfanaticaCepModule](https://github.com/Infanatica/InfanaticaCepModule) no seu composer.json:


    ```json
    "require": {
        "infanatica/infanatica-cep-module": "dev-master"
    }
    ```
Agora informar para composer para fazer download do InfanaticaCepModule executando o comando:

    ```bash
    $ php composer.phar update
    ```

###### Método 2

Executar o comando para atualizar o seu composer.json e efetuar o download

	```bash
	php composer.phar require infanatica/infanatica-cep-module dev-master
	```


#### Após a Instalação

Adicionar ao seu arquivo `application.config.php` 

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'InfanaticaCepModule',
        ),
        // ...
    );
    ```

# Utilização do Service (Exemplo no Controller)

```php
	<?php
	//...
	class IndexController extends AbstractActionController
	{
		public function indexAction()
	    {
			$cep = '21041020';

			// Possíveis formatos (json, xml, query, object, array)
			// null = \InfanaticaCepModule\Response\EnderecoResponse
			$formato        = 'json';

			$serviceLocator = $this->getServiceLocator();
			$cepService     = $serviceLocator->get('InfanaticaCepModule\Service\CepService');
			$endereco       = $cepService->getEnderecoByCep($cep,$formato);
			var_dump($endereco);

	        return new ViewModel();
	    }
    //...
```

# Utilização do Controller

http[s]://domain/cep/NUMERO_DO_CEP</div>

http[s]://domain/cep/21041020</div>

http[s]://domain/cep/NUMERO_DO_CEP/FORMATO_DE_SAIDA</div>

http[s]://domain/cep/21041020/json

http[s]://domain/cep/21041020/xml


# Referências dos Adapters de pesquisa de CEP

ViaCEP - http://viacep.com.br/ (Concluído)

Postmon - http://postmon.com.br/ (Concluído)

Correio Control - http://avisobrasil.com.br/correio-control/api-de-consulta-de-cep/ (Concluído)


# Contruibuidores

Diogo Oliveira Mascarenhas (https://github.com/diogomascarenha)

Everton Muniz (https://github.com/munizeverton)