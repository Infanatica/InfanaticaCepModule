<?php

namespace InfanaticaCepModule\Exception;

class CepNotFoundException extends \Exception{
    public $message = "CEP não encontrado";
}