<?php

include("autoload.php");

$service = new service();
$lista = $service->getPedido();
echo '<div id="mainDivListagem">  <table class="table">';
echo '<tr>
            <td>Descrição</td>
            <td>Valor</td>
            <td>Quantidade</td>';
foreach ($lista as $item) {
    echo '<tr>';
    echo '<td>'.$item['id_fornecedor'].'</td>';
    echo '<td>'.$item['id_produto'].'</td>';
    echo '<td>'.$item['quantidade'].'</td>';
    echo '<td>'.$item['valor_total'].'</td>';
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
                        <input type="number" placeholder="IdFornecedor" name="idFornecedor" class="form-control"/>
                        <br/> <br/>
                        <input type="number" placeholder="IdProduto" name="idProduto" class="form-control"/>
                        <br/> <br/>
                        <input type="number" placeholder="QuantidadePedido" name="quantidadePedido" class="form-control"/>
                        <br/> <br/>
                        <input type="number" placeholder="ValorTotalPedido" name="valorTotalPedido" class="form-control"/>
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit" name="salvar">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                       </div> </form> ';
        if (isset($_POST['salvar'])){
            $service = new service();
            $service->cadastrarPedido($_POST['idFornecedor'], $_POST['idProduto'], $_POST['quantidadePedido'], $_POST['valorTotalPedido']);
            echo 'Pedido salvo';
        }
    } else if ($queries['pagina'] === 'alterar') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Id Pedido a ser atualizado" name="descricaoPedidoOld"  class="form-control" />
                        <br/> <br/>
                        <input type="text" placeholder="Nova descricao Pedido " name="descricaoPedidoNew"  class="form-control" />
                        <button class="btn btn-primary" name="salvar" type="submit">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['descricaoPedidoOld']) && isset($_POST['descricaoPedidoNew'])) {
            $service = new service();
            $service->editarPedido($_POST['descricaoPedidoOld'], $_POST['descricaoPedidoNew']);
            echo 'Edição salva';
        }
    } else if ($queries['pagina'] === 'excluir') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Descricao Pedido a ser exluido" name="descricaoPedido" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" name="excluir" type="submit">Excluir</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['descricaoPedido'])) {
            $service = new service();
            $service->excluirPedido($_POST['descricaoPedido']);
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

