<?php

class Menu {
    public function returnMenu() {
        echo '
                  <table class="table menuStyle">
                    <tr>
                        <td><a href="?pagina=listagem">Listagem</a></td> 
                    </tr>
                    <tr>
                        <td><a href="?pagina=cadastro">Cadastro</a></td>
                    </tr>
                    <tr>
                        <td><a href="?pagina=edicao">Edição</a></td>
                    </tr>
                    <tr>
                        <td><a href="?pagina=excluir">Excluir</a></td>
                    </tr>
                  </table>
                ';
    }
}