<?php

class Feriado
{

    private $nome;
    private $dia;





    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of dia
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set the value of dia
     *
     * @return  self
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    public function getHolidays()
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM feriados";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addHoliday($nome, $dia)
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "INSERT INTO `feriados` (`name`, `day`) VALUES ('$nome', '$dia')";
        $query = $conexao->query($sql);
    }

    public function deleteHolidayById($id)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "DELETE FROM `feriados` WHERE `feriados`.`id` = $id";
        $query = $conexao->query($sql);
    }
}
