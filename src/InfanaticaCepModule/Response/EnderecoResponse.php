<?php

namespace InfanaticaCepModule\Response;

class EnderecoResponse implements EnderecoResponseInterface{

    /** @var  string */
    protected $logradouro;

    /** @var  string */
    protected $bairro;

    /** @var  string */
    protected $localidade;

    /** @var  string */
    protected $uf;


    public function toArray()
    {
        $retorno['logradouro']  = $this->getLogradouro();
        $retorno['bairro']      = $this->getBairro();
        $retorno['localidade']  = $this->getLocalidade();
        $retorno['uf']          = $this->getUf();
        return $retorno;
    }

    public function toJson()
    {
        $enderecoArray = $this->toArray();
        $enderecoJson  = json_encode($enderecoArray);
        return $enderecoJson;
    }

    public function toQuery()
    {
        $enderecoArray = $this->toArray();
        $enderecoQuery = http_build_query($enderecoArray);
        return $enderecoQuery;
    }

    public function toObject()
    {
        $enderecoObject = (object) $this->toArray();
        return $enderecoObject;
    }

    public function toXml()
    {
        $enderecoArray = $this->toArray();
        $xml = new \SimpleXMLElement('<endereco/>');
        foreach ($enderecoArray as $key => $value)
        {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }

    public function toPiped()
    {
        $enderecoArray  = $this->toArray();
        $enderecoString = 'logradoudo:' . $enderecoArray['logradouro'] . '|' .
                          'bairro:'     . $enderecoArray['bairro']     . '|' .
                          'localidade:' . $enderecoArray['localidade'] . '|' .
                          'uf:'         . $enderecoArray['uf'];

        return $enderecoString;
    }

    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return string
     */
    public function getLocalidade()
    {
        return $this->localidade;
    }

    /**
     * @param string $localidade
     */
    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;
    }

    /**
     * @return string
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param string $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param string $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }
}