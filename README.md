# InfanaticaCepModule

Módulo em Zend Framework 2 para consulta de endereço via CEP

# Instalação

#### Instalação via clone

Clonar o projeto [InfanaticaCepModule](https://github.com/Infanatica/InfanaticaCepModule.git) na pasta "./vendor" ou "./module" no seu projeto em Zend Framework 2

```bash
    $ cd PASTA_DO_SKELETON_DO_ZEND_FRAMEWORK2
    $ cd vendor
    $ git clone https://github.com/Infanatica/InfanaticaCepModule.git
```

#### Instalação via composer

###### Método 1

Adicionar o projeto [InfanaticaCepModule](https://packagist.org/packages/infanatica/infanatica-cep-module) no seu composer.json:


```json
    "require": {
        "infanatica/infanatica-cep-module": "dev-master"
    }
```
Executar o comando "update" ou "install" do composer para fazer download do [InfanaticaCepModule](https://packagist.org/packages/infanatica/infanatica-cep-module)

```bash
    $ php composer.phar update
```

###### Método 2

Executar o comando "require" do composer para atualizar o seu composer.json e efetuar o download do [InfanaticaCepModule](https://packagist.org/packages/infanatica/infanatica-cep-module)

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

# Utilização do Service 
#### Exemplo no \Application\Controller\InderController

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
#### Exemplos de rota para:
#### \InfanaticaCepModule\Controller\CepController


http[s]://domain/cep/NUMERO_DO_CEP</div>

http[s]://domain/cep/21041020</div>

http[s]://domain/cep/NUMERO_DO_CEP/FORMATO_DE_SAIDA</div>

http[s]://domain/cep/21041020/json

http[s]://domain/cep/21041020/xml


# Referências dos Adapters de pesquisa de CEP

[ViaCEP](http://viacep.com.br/) (Concluído)

[Postmon](http://postmon.com.br/) (Concluído)

[Correio Control](http://avisobrasil.com.br/correio-control/api-de-consulta-de-cep/) (Concluído)

[Republica Virtual](http://www.republicavirtual.com.br/cep/) (Concluído)


# Contruibuidores

Diogo Oliveira Mascarenhas (https://github.com/diogomascarenha)

Everton Muniz (https://github.com/munizeverton)