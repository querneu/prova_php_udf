<?php
require('./entity/beneficiario.class.php');
require('./dao/DAOBeneficiario.class.php');
$daobeneficiario = new DAOBeneficiario;
$beneficiario = new Beneficiario;
$lista = $daobeneficiario->Buscar("");
if(isset($_POST['nome'])&& isset($_POST['cpf']) && isset($_POST['data_nascimento']) && isset($_POST['telefone'])){
    $beneficiario->setId(md5(uniqid("")));
    $beneficiario->setNome($_POST['nome']);
    $beneficiario->setCpf($_POST['cpf']);
    $beneficiario->setData_Nascimento($_POST['data_nascimento']);
    $beneficiario->setTelefone($_POST['telefone']);
    $daobeneficiario->Inserir($beneficiario);
    echo "<meta http-equiv='refresh' content='0'>";

}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Cadastro</title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>Beneficiarios</h1>
                <div class="col">
                    <table class="table table-hover">
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>CPF</td>
                            <td>Data de Nascimento</td>
                            <td>Telefone</td>
                        </tr>
                        <tr>
                            <?php
                            foreach ($lista as $pessoas) {
                                echo "<tr>";
                                echo "<td>";
                                echo $pessoas->getId();
                                echo "</td>";
                                echo "<td>";
                                echo $pessoas->getNome();
                                echo "</td>";
                                echo "<td>";
                                echo $pessoas->getCpf();
                                echo "</td>";
                                echo "<td>";
                                echo $pessoas->getData_nascimento();
                                echo "</td>";
                                echo "<td>";
                                echo $pessoas->getTelefone();
                                echo "</td>";
                                echo "<tr>";
                            }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col">
                <h1>Cadastrar Novo</h1>
                <div class="col">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" required>

                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu cpf" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Digite sua data de nascimento" required>
                        </div>

                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Digite seu telefone" required>
                        </div>
                        
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>