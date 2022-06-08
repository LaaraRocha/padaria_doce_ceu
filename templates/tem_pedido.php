<?php

include("autoload.php");

$service = new service();
$lista = $service->getPedido();
echo '<div id="mainDivListagem">  <table class="table">';
echo '<tr>
            <td>Id</td>
            <td>cliente</td>
            <td>fornecedor</td>
            <td>produto</td>
            <td>Quantidade</td>
            <td>valor total</td>';
foreach ($lista as $item) {
    echo '<tr>';
    echo '<td>' . $item['id'] . '</td>';
    echo '<td>'.$item['id_cliente'].'</td>';
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
                        <input type="number" placeholder="Id cliente" name="idCliente" class="form-control"/>
                        <br/> <br/>
                        <input type="number" placeholder="Id fornecedor" name="idFornecedor" class="form-control"/>
                        <br/> <br/>
                        <input type="number" placeholder="Id produto" name="idProduto" class="form-control"/>
                        <br/> <br/>
                        <input type="number" placeholder="Quantidade à pedir" name="quantidadePedido" class="form-control"/>
                        <br/> <br/>
                        <input type="number" placeholder="Valor total à pedir" name="valorTotalPedido" class="form-control"/>
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit" name="salvar">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                       </div> </form> ';
        if (isset($_POST['salvar'])){
            $service = new service();
            $service->cadastrarPedido($_POST['idCliente'],$_POST['idFornecedor'], $_POST['idProduto'], $_POST['quantidadePedido'], $_POST['valorTotalPedido']);
            echo 'Pedido salvo';
        }

    } else if ($queries['pagina'] === 'excluir') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="number" placeholder="Id do pedido a ser exluido" name="idPedido" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" name="excluir" type="submit">Excluir</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['idPedido'])) {
            $service = new service();
            $service->excluirPedido($_POST['idPedido']);
            echo 'Excluído com sucesso';
        }
    }
}

echo '
<link rel="stylesheet" href="/resources/style_pedido.css">

<tb>
<ti>
    <a href="?pagina=listagem">Listar</a>
</ti>
<ti>
    <a href="?pagina=cadastro">Cadastrar</a>
</ti>
<ti>
    <a href="?pagina=excluir">Excluir</a>
</ti>
<ti>
    <a href="main.php">Voltar</a>
</ti>
</tb>';

