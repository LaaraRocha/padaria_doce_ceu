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
        $stmt = $conn->prepare("UPDATE produto SET descricao='" . $descricaoNew . "' WHERE descricao = '" . $descricaoOld . "'");
        $stmt->execute();
    }

    public function excluirProduto($descricao)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("DELETE FROM produto WHERE descricao = '" . $descricao . "'");
        $stmt->execute();
    }

//======================================================================================================================//

    public function getFornecedor()
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("SELECT * FROM fornecedor");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function cadastrarFornecedor($fornecedor)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("INSERT INTO fornecedor (nome) VALUES ('" . $fornecedor . "')");
        $stmt->execute();
    }

    public function editarFornecedor($nomeOld, $nomeNew)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("UPDATE fornecedor SET nome='" . $nomeNew . "' WHERE nome = '" . $nomeOld . "'");
        $stmt->execute();
    }

    public function excluirFornecedor($fornecedor)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("DELETE FROM fornecedor WHERE nome = '" . $fornecedor . "'");
        $stmt->execute();
    }
}