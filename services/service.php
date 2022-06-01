<?php

class service
{

    public function getCliente()
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("SELECT * FROM cliente");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function cadastrarCliente($cliente)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("INSERT INTO cliente (nome) VALUES ('" . $cliente . "')");
        $stmt->execute();
    }

    public function editarCliente($nomeOld, $nomeNew)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("UPDATE cliente SET nome='" . $nomeNew . "' WHERE nome = '" . $nomeOld . "'");
        $stmt->execute();
    }

    public function excluirCliente($cliente)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("DELETE FROM cliente WHERE nome = '" . $cliente . "'");
        $stmt->execute();
    }

//======================================================================================================================//

    public function getProduto()
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("SELECT * FROM produto");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function cadastrarProduto($descricaoProduto, $valorProduto, $quantidadeProduto)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("INSERT INTO produto (descricao, valor, quantidade) VALUES ('" .$descricaoProduto. "', " .$valorProduto." , ".$quantidadeProduto.")");
        $stmt->execute();
    }

    public function editarProduto($descricaoOld, $descricaoNew)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("UPDATE cliente SET descricao='" . $descricaoNew . "' WHERE descricao = '" . $descricaoOld . "'");
        $stmt->execute();
    }

    public function excluirProduto($descricao)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("DELETE FROM produto WHERE descricao = '" . $descricao . "'");
        $stmt->execute();
    }

//======================================================================================================================//


}