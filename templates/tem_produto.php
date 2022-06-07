<?php

include("autoload.php");

$service = new service();
$lista = $service->getProduto();
echo '<div id="mainDivListagem">  <table class="table">';
    echo '<tr>
            <td>Descrição</td>
            <td>Valor</td>
            <td>Quantidade</td>';
foreach ($lista as $item) {
    echo '<tr>';
    echo '<td>'.$item['descricao'].'</td>';
    echo '<td>'.$item['valor'].'</td>';
    echo '<td>'.$item['quantidade'].'</td>';
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
                        <input type="text" placeholder="DescricaoProduto" name="descricaoProduto" class="form-control" />
                        <br/> <br/>
                        <input type="number" placeholder="ValorProduto" name="valorProduto" class="form-control"/>
                        <br/> <br/>
                        <input type="number" placeholder="QuantidadeProduto" name="quantidadeProduto" class="form-control"/>
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit" name="salvar">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                       </div> </form> ';
        if (isset($_POST['salvar'])){
            $service = new service();
            $service->cadastrarProduto($_POST['descricaoProduto'], $_POST['valorProduto'], $_POST['quantidadeProduto']);
            echo 'Produto salvo';
        }
    } else if ($queries['pagina'] === 'alterar') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Nome Produto a ser atualizado" name="descricaoProdutoOld"  class="form-control" />
                        <br/> <br/>
                        <input type="text" placeholder="Nova descricao Produto " name="descricaoProdutoNew"  class="form-control" />
                        <button class="btn btn-primary" name="salvar" type="submit">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['descricaoProdutoOld']) && isset($_POST['descricaoProdutoNew'])) {
            $service = new service();
            $service->editarProduto($_POST['descricaoProdutoOld'], $_POST['descricaoProdutoNew']);
            echo 'Edição salva';
        }
    } else if ($queries['pagina'] === 'excluir') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Descricao Produto a ser exluido" name="descricaoProduto" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" name="excluir" type="submit">Excluir</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['descricaoProduto'])) {
            $service = new service();
            $service->excluirProduto($_POST['descricaoProduto']);
            echo 'Excluído com sucesso';
        }
    }
}

echo '<tb>
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
</tb>';

