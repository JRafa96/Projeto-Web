<?php

class Ferias
{
    private $userId;
    private $from;
    private $to;
    private $days;
    private $status;




    /**
     * Get the value of userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of from
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set the value of from
     *
     * @return  self
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get the value of to
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the value of to
     *
     * @return  self
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of days
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set the value of days
     *
     * @return  self
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }


    public function submit()
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $userId = $this->userId;
        $from = $this->from;
        $to = $this->to;
        $days = $this->number_of_working_days($userId, $from, $to);

        $sql = "INSERT INTO `ferias` (`userId`, `from`, `to`, `days`) VALUES ('" . $userId . "', '" . $from . "', '" . $to . "','" . $days . "')";
        $query = $conexao->query($sql);
    }

    public function findByUserId($userId)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM ferias WHERE userId = $userId";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function aproveEntry($id)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "UPDATE `ferias` SET `status` = 'aproved' WHERE `ferias`.`id` = $id";
        $query = $conexao->query($sql);
    }

    public function refuseEntry($id)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "UPDATE `ferias` SET `status` = 'refused' WHERE `ferias`.`id` = $id";
        $query = $conexao->query($sql);
    }

    public function getByStatus($status)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM ferias WHERE status = '$status'";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllByUserId($userId)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM ferias WHERE userId = $userId";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    function number_of_working_days($userId, $from, $to)
    {

        $tU = new user();
        $tempWD = $tU->getWorkingDaysByUserId($userId);
        $tempWD = explode(",", $tempWD['workingDays']);
        $workingDays = array();
        foreach ($tempWD as $n) {
            array_push($workingDays, $n);
        }

        //$workingDays = [1, 2, 3, 4, 5];

        $holidayDays = array();

        $holidays = $this->getHolidays();
        foreach ($holidays as $day) {
            array_push($holidayDays, $day['day']);
        }

        $from = DateTime::createFromFormat('d/m/Y', $from);
        $to = DateTime::createFromFormat('d/m/Y', $to);
        $to->modify('+1 day');
        $interval = new DateInterval('P1D');
        $periods = new DatePeriod($from, $interval, $to);

        $days = 0;
        foreach ($periods as $period) {
            if (!in_array($period->format('N'), $workingDays)) continue;
            if (in_array($period->format('d-m-Y'), $holidayDays)) continue;
            if (in_array($period->format('d-m-*'), $holidayDays)) continue;
            $days++;
        }
        return $days;
    }

    public function getById($id)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM ferias WHERE id = $id";
        $query = $conexao->query($sql);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getByStatusAndUserId($userId, $status)
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM ferias WHERE userId = $userId and status='$status'";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalDaysClaimed()
    {
        $totalDays = 0;
        $ferias = $this->getByStatus("aproved");

        foreach ($ferias as $entrada) {
            $totalDays += $entrada['days'];
        }

        return $totalDays;
    }

    public function getTotalDaysUnclaimed()
    {
        $totalDays = 0;


        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT hDaysRemaining FROM users WHERE status='aproved'";
        $query = $conexao->query($sql);

        $hDaysRemaining = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($hDaysRemaining as $days) {
            $totalDays += $days['hDaysRemaining'];
        }


        return $totalDays;
    }

    public function getHolidays()
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $sql = "SELECT * FROM feriados";
        $query = $conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
