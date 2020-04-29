<?php
require_once('./entity/beneficiario.class.php');
class DAOBeneficiario{
    //função de inserção
    public function Inserir(Beneficiario $beneficiario)    {
        try {
            $sql = "INSERT INTO prova_php.beneficiarios(id_beneficiario,nome,cpf,data_nascimento,telefone) VALUES(:id_beneficiario,:nome,:cpf,:data_nascimento,:telefone)";
            $conexao = new PDO('mysql:host=localhost;prova_php', 'dba_sql', 'admin');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conexao->prepare($sql);
            $resultado->bindValue(":id_beneficiario", $beneficiario->getId());
            $resultado->bindValue(":nome", $beneficiario->getNome());
            $resultado->bindValue(":cpf", $beneficiario->getCpf());
            $resultado->bindValue(":data_nascimento", $beneficiario->getData_Nascimento());
            $resultado->bindValue(":telefone", $beneficiario->getTelefone());
            $resultado->execute();
            $conexao = null;
            return $resultado;
        } catch (Exception $e) {
            print($sql);
            print($e->getMessage());
        }
    }

    //função de busca
    public function Buscar($filtro){
        try{
            if(isset($filtro) && $filtro<>""){
                $sql = "SELECT * FROM prova_php.beneficiarios WHERE id LIKE :id OR nome LIKE :nome ORDER BY nome";
            }else{
                $sql = "SELECT * FROM prova_php.beneficiarios ORDER BY nome";
            }
            $conexao = new PDO('mysql:host=localhost;prova_php','dba_sql','admin');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conexao->prepare($sql);
            $resultado->bindValue(":id", $filtro);
            $resultado->bindValue(":nome", $filtro);
            $resultado->execute();
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $conexao = null;
            $lista_lateral = (array) new ArrayObject();
            foreach($lista as $linha){
                $lista_lateral[] = $this->populaMaterias($linha);
            }
            return $lista_lateral;
        }catch(Exception $e){
            print($e->getMessage());
        }
    }

    //função de populate
    public function populaMaterias($linha){
        $beneficiario = new Beneficiario;
        $beneficiario->setId($linha['id_beneficiario']);
        $beneficiario->setNome($linha['nome']);
        $beneficiario->setCpf($linha['cpf']);
        $beneficiario->setData_Nascimento($linha['data_nascimento']);
        $beneficiario->setTelefone($linha['telefone']);
        return (object) $beneficiario;
    }
}
