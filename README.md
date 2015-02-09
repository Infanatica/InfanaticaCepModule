# InfanaticaCepModule
Módulo em Zend Framework 2 para consulta de endereço via CEP

#Utilização do Service (Exemplo no Controller)

$cep = '21041020';

// Possíveis formatos (json, xml, query, object, array) 

// null = \InfanaticaCepModule\Response\EnderecoResponse

$formato = 'json'; 

$cepService = $this->getServiceLocator->get('InfanaticaCepModule\Service\CepService');

$endereco = $this->cepService->getEnderecoByCep($cep,$formato);

#Utilização do Controller
http[s]://domain/cep/NUMERO_DO_CEP</div>

http[s]://domain/cep/21041020</div>

http[s]://domain/cep/NUMERO_DO_CEP/FORMATO_DE_SAIDA</div>

http[s]://domain/cep/21041020/json

http[s]://domain/cep/21041020/xml

#Referências dos Adapters de pesquisa de CEP

ViaCEP - http://viacep.com.br/ (Concluído)

Postmon - http://postmon.com.br/ (Em Desenvolvimento)

Correio Control - http://avisobrasil.com.br/correio-control/api-de-consulta-de-cep/ (Em Desenvolvimento)

#Contruibuidores
Diogo Oliveira Mascarenhas (https://github.com/diogomascarenha)

Everton Muniz (https://github.com/munizeverton)