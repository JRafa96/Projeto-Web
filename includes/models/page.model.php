<?php

class Page
{
    private $id;
    private $name;
    private $href;


    public function getHref()
    {
        return $this->href;
    }


    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function list($table)
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM $table";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
