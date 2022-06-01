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
        $stmt = $conn->prepare("INSERT INTO cliente (NomeCliente) VALUES ('" . $cliente . "')");
        $stmt->execute();
    }

    public function editarCliente($clienteOld, $clienteNew)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("UPDATE cliente SET NomeCliente='" . $clienteNew . "' WHERE NomeCliente = '" . $clienteOld . "'");
        $stmt->execute();
    }

    public function excluirCliente($cliente)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("DELETE FROM cliente WHERE cliente.NomeCliente = '" . $cliente . "'");
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

    public function cadastrarProduto($produto)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("INSERT INTO produto (DescricaoProduto) VALUES ('" . $produto . "')");
        $stmt->execute();
    }

    public function editarProduto($produtoOld, $produtoNew)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("UPDATE cliente SET DescricaoProduto='" . $produtoNew . "' WHERE DescricaoProduto = '" . $produtoOld . "'");
        $stmt->execute();
    }

    public function excluirProduto($produto)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("DELETE FROM produto WHERE produto.DescricaoProduto = '" . $produto . "'");
        $stmt->execute();
    }

//======================================================================================================================//

  /*  public function getPedido()
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("SELECT * FROM pedido");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function cadastrarPedido($pedido)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("INSERT INTO pedido (DescricaoProduto) VALUES ('" . $produto . "')");
        $stmt->execute();
    }

    public function editarProduto($produtoOld, $produtoNew)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("UPDATE cliente SET DescricaoProduto='" . $produtoNew . "' WHERE DescricaoProduto = '" . $produtoOld . "'");
        $stmt->execute();
    }

    public function excluirProduto($produto)
    {
        $conn = new PDO('mysql:host=localhost;dbname=padaria_doce_ceu', 'root', '');
        $stmt = $conn->prepare("DELETE FROM produto WHERE produto.DescricaoProduto = '" . $produto . "'");
        $stmt->execute();
    }*/
}