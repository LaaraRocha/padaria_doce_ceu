<?php

class Main {

    public function returnMainDiv() {

        if (isset($_SERVER['QUERY_STRING'])) {
            $queries = array();
            parse_str($_SERVER['QUERY_STRING'], $queries);
        }

        if (isset($queries) && isset($queries['pagina'])) {
            if ($queries['pagina'] === 'listagem') {
                $service = new Service();
                $lista = $service->getRegiao();
                echo '<div id="mainDivListagem">  <table class="table">';
                foreach ($lista as $item) {
                    echo '<tr>';
                    echo '<td>'.$item['DescricaoRegiao'].'</td>';
                    echo '</tr>';
                }
                echo '</table> </div>';
            } else if ($queries['pagina'] === 'cadastro') {
                echo '<form method="post" action="?pagina=cadastro"> <div id="mainDivCadastro"> 
                        <input type="text" placeholder="Nome região" value="nomeRegiao" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit" value="nomeRegiao">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                       </div> </form> ';
                if (isset($_POST['nomeRegiao'])) {
                    $service = new Service();
                    $service->cadastrarRegiao($_POST['nomeRegiao']);
                    echo 'Região salva';
                }
            } else if ($queries['pagina'] === 'edicao') {
                echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Nome região a ser atualizada" value="nomeRegiaoOld"  class="form-control" />
                        <br/> <br/>
                        <input type="text" placeholder="Novo nome região " value="nomeRegiaoNew"  class="form-control" />
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
                if (isset($_POST['nomeRegiaoOld']) && isset($_POST['nomeRegiaoNew'])) {
                    $service = new Service();
                    $service->editarRegiao($_POST['nomeRegiaoOld'], $_POST['nomeRegiaoNew']);
                    echo 'Edição salva';
                }
            } else if ($queries['pagina'] === 'excluir') {
                echo '<div id="mainDivCadastro"> <form method="post">
                        <input type="text" placeholder="Nome região a ser exluida" value="nomeRegiao" class="form-control" />
                        <br/> <br/>
                        <button class="btn btn-primary" type="submit">Excluir</button>
                        <br/> <br/>
                        <a href="?pagina=listagem">Voltar</a>
                      </form> </div> ';
                if (isset($_POST['nomeRegiao'])) {
                    $service = new Service();
                    $service->excluirRegiao($_POST['nomeRegiao']);
                    echo 'Edição salva';
                }
            }
        } else {
            $service = new Service();
            $lista = $service->getRegiao();
            echo '<div id="mainDivListagem"> <table class="table">';
            foreach ($lista as $item) {
                echo '<tr>';
                echo '<td>'.$item['DescricaoRegiao'].'</td>';
                echo '</tr>';
            }
            echo '</table> </div>';
        }




    }

}