<?php

class Message
{
    private $userId;
    private $destinationId;
    private $text;
    private $dateTime;




    /**
     * Get the value of user
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of dateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set the value of dateTime
     *
     * @return  self
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get the value of destinationId
     */
    public function getDestinationId()
    {
        return $this->destinationId;
    }

    /**
     * Set the value of destinationId
     *
     * @return  self
     */
    public function setDestinationId($destinationId)
    {
        $this->destinationId = $destinationId;

        return $this;
    }






    public function listMessages()
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM messages ORDER BY `messages`.`date` DESC";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listMessagesByStatus($status)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM messages WHERE status = 'active' ORDER BY `messages`.`date` DESC";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function sendMessage()
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $userId = $this->userId;
        $destinationId = $this->destinationId;
        $text = $this->text;
        date_default_timezone_set('Europe/London');
        $dateTime = date('d/m/Y H:i');

        $sql = "INSERT INTO `messages` (`senderId`, `destinationId` , `text`, `date`) VALUES ($userId, $destinationId, '$text', '$dateTime')";
        $conexao->query($sql);
    }

    public function getMessagesFromUser($userId)
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM messages WHERE destinationId = " . $userId . " ORDER BY `messages`.`date` DESC";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showMessage($id)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "UPDATE `messages` SET `status` = 'active' WHERE `messages`.`id` = $id";
        $conexao->query($sql);
    }

    public function hideMessage($id)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "UPDATE `messages` SET `status` = 'hidden' WHERE `messages`.`id` = $id";
        $conexao->query($sql);
    }

    public function showAll()
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "UPDATE `messages` SET `status` = 'active'";
        $conexao->query($sql);
    }

    public function hideAll()
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "UPDATE `messages` SET `status` = 'hidden'";
        $conexao->query($sql);
    }
}
