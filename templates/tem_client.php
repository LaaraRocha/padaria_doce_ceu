<?php

include("autoload.php");

if (isset($_SERVER['QUERY_STRING'])) {
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
}

if (isset($queries) && isset($queries['pagina'])) {
    if ($queries['pagina'] === 'listagem') {
        $service = new service();
        $lista = $service->getCliente();
        echo '<div id="mainDivListagem">  <table class="table">';
        foreach ($lista as $item) {
            echo '<tr>';
            echo '<td>'.$item['nome'].'</td>';
            echo '</tr>';
        }
        echo '</table> </div>';
    } else if ($queries['pagina'] === 'cadastro') {
        echo '<form method="post" action="?pagina=cadastro"> <div id="mainDivCadastro"> 
                        <input type="text" placeholder="NomeCliente" value="nomeCliente" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit" value="nomeCliente">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                       </div> </form> ';
        if (isset($_POST['nome'])) {
            $service = new service();
            $service->cadastrarCliente($_POST['nome']);
            echo 'Cliente salvo';
        }
    } else if ($queries['pagina'] === 'edicao') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Nome Cliente a ser atualizada" value="nomeOld"  class="form-control" />
                        <br/> <br/>
                        <input type="text" placeholder="Novo nome cliente " value="nomeNew"  class="form-control" />
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['nomeOld']) && isset($_POST['nomeNew'])) {
            $service = new service();
            $service->editarCliente($_POST['nomeOld'], $_POST['nomeNew']);
            echo 'Edição salva';
        }
    } else if ($queries['pagina'] === 'excluir') {
        echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Nome Cliente a ser exluido" value="nomeCliente" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit">Excluir</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
        if (isset($_POST['nome'])) {
            $service = new service();
            $service->excluirCliente($_POST['nome']);
            echo 'Excluído com sucesso';
        }
    }
} else {
    $service = new service();
    $lista = $service->getCliente();
    echo '<div id="mainDivListagem"> <table class="table">';
    foreach ($lista as $item) {
        echo '<tr>';
        echo '<td>'.$item['nome'].'</td>';
        echo '</tr>';
    }
    echo '</table> </div>';
}
