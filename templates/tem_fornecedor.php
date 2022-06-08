<?php

include("autoload.php");

$service = new service();
$lista = $service->getFornecedor();
echo '<div id="mainDivListagem">  <table class="table">';
foreach ($lista as $item) {
    echo '<tr>';
    echo '<td>' . $item['id'] . '</td>';
    echo '<td>' . $item['nome'] . '</td>';
    echo '</tr>';
}
echo '</table> </div>';

if (isset($_SERVER['QUERY_STRING'])) {
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
}

    if (isset($queries) && isset($queries['pagina'])) {
        if ($queries['pagina'] === 'cadastro') {
            echo '<form method="post" action="?pagina=cadastro"> <div id="mainDivCadastro"> 
                        <input type="text" placeholder="NomeFornecedor" name="nomeFornecedor" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit" name="salvar" value="nomeFornecedor">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                       </div> </form> ';
            if (isset($_POST['salvar'])) {
                $service = new service();
                $service->cadastrarFornecedor($_POST['nomeFornecedor']);
                echo 'Fornecedor salvo';
            }
        } else if ($queries['pagina'] === 'alterar') {
            echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Nome Fornecedor a ser atualizada" name="nomeOld"  class="form-control" />
                        <br/> <br/>
                        <input type="text" placeholder="Novo nome fornecedor " name="nomeNew"  class="form-control" />
                        <button class="btn btn-primary" name="salvar" type="submit">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
            if (isset($_POST['nomeOld']) && isset($_POST['nomeNew'])) {
                $service = new service();
                $service->editarFornecedor($_POST['nomeOld'], $_POST['nomeNew']);
                echo 'Edição salva';
            }
        } else if ($queries['pagina'] === 'excluir') {
            echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Nome Fornecedor a ser exluido" name="nomeFornecedor" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" name="excluir" type="submit">Excluir</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
            if (isset($_POST['nomeFornecedor'])) {
                $service = new service();
                $service->excluirFornecedor($_POST['nomeFornecedor']);
                echo 'Excluído com sucesso';
            }
        }
    }

echo '
<link rel="stylesheet" href="/resources/style_fornecedor.css">

<tb>
<ti>
    <a href="?pagina=listagem">Listar</a>
</ti>
<ti>
    <a href="?pagina=cadastro">Cadastrar</a>
</ti>
    <ti>
    <a href="?pagina=alterar">Alterar</a>
</ti>
        <ti>
    <a href="?pagina=excluir">Excluir</a>
</ti>
<ti>
    <a href="main.php">Voltar</a>
</ti>
</tb>';

