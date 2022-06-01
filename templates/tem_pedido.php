<?php

include("autoload.php");

if (isset($_SERVER['QUERY_STRING'])) {
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
}

if (isset($queries) && isset($queries['pagina'])) {
    if ($queries['pagina'] === 'listagem') {
        $service = new Service();
        $lista = $service->getProduto();
        echo '<div id="mainDivListagem">  <table class="table">';
        foreach ($lista as $item) {
            echo '<tr>';
            echo '<td>'.$item['DescricaoProduto'].'</td>';
            echo '</tr>';
        }
        echo '</table> </div>';
    } else if ($queries['pagina'] === 'cadastro') {
        echo '<form method="post" action="?pagina=cadastro"> <div id="mainDivCadastro"> 
                        <input type="text" placeholder="DescricaoProduto" value="descricaoProduto" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit" value="DescricaoProduto">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                       </div> </form> ';
        if (isset($_POST['descricaoProduto'])) {
            $service = new Service();
            $service->cadastrarProduto($_POST['DescricaoProduto']);
            echo 'Produto salvo';
        }
    } else if ($queries['pagina'] === 'edicao') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Nome Produto a ser atualizado" value="descricaoProdutoOld"  class="form-control" />
                        <br/> <br/>
                        <input type="text" placeholder="Nova descricao Produto " value="descricaoProdutoNew"  class="form-control" />
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['descricaoProdutoOld']) && isset($_POST['descricaoProdutoNew'])) {
            $service = new Service();
            $service->editarProduto($_POST['descricaoProdutoOld'], $_POST['descricaoProdutoNewNew']);
            echo 'Edição salva';
        }
    } else if ($queries['pagina'] === 'excluir') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Descricao Produto a ser exluido" value="descricaoProduto" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit">Excluir</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['descricaoProduto'])) {
            $service = new Service();
            $service->excluirProduto($_POST['descricaoProduto']);
            echo 'Excluído com sucesso';
        }
    }
} else {
    $service = new Service();
    $lista = $service->getProduto();
    echo '<div id="mainDivListagem"> <table class="table">';
    foreach ($lista as $item) {
        echo '<tr>';
        echo '<td>'.$item['descricaoProduto'].'</td>';
        echo '</tr>';
    }
    echo '</table> </div>';
}
