<?php
/**
 * Created by PhpStorm.
 * User: emuniz
 * Date: 10/02/2015
 * Time: 20:52
 */

namespace InfanaticaCepModule\Response;

interface EnderecoResponseInterface{

    public function toArray();

    public function toJson();

    public function toQuery();

    public function toObject();

    public function toXml();

    public function toPiped();

    public function getBairro();

    public function setBairro($bairro);

    public function getLocalidade();

    public function setLocalidade($localidade);

    public function getLogradouro();

    public function setLogradouro($logradouro);

    public function getUf();

    public function setUf($uf);

}