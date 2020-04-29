<?php
class Beneficiario
{
    private $id;
    private $nome;
    private $cpf;
    private $data_nascimento;
    private $telefone;

    function __construct()    {
        #sobrecarga de metodo
    }

    function setId($id_)    {
        $this->id = $id_;
    }
    function getId()    {
        return $this->id;
    }

    function setNome($nome_)    {
        $this->nome = $nome_;
    }
    function getNome()    {
        return $this->nome;
    }

    function setCpf($cpf_)    {
        $this->cpf = $cpf_;
    }
    function getCpf()    {
        return $this->cpf;
    }

    function setData_Nascimento($dt_nascimento_)    {
        $this->data_nascimento = $dt_nascimento_;
    }
    function getData_Nascimento()    {
        return $this->data_nascimento;
    }

    function setTelefone($telefone_)    {
        $this->telefone = $telefone_;
    }
    function getTelefone()    {
        return $this->telefone;
    }
}
