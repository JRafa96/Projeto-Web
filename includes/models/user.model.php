<?php

class user
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $phone;
    private $address;
    private $jobTitle;
    private $permissions;
    private $hDaysRemaining;

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of permissions
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set the value of permissions
     *
     * @return  self
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Get the value of hDaysRemaining
     */
    public function getHDaysRemaining()
    {
        return $this->hDaysRemaining;
    }

    /**
     * Set the value of hDaysRemaining
     *
     * @return  self
     */
    public function setHDaysRemaining($hDaysRemaining)
    {
        $this->hDaysRemaining = $hDaysRemaining;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of jobTitle
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set the value of jobTitle
     *
     * @return  self
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }


    public function authenticate()
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $email = $this->email;
        $password = $this->password;

        $sql = "SELECT email, password from users WHERE email='" . $email . "'";
        $query = $conexao->query($sql);
        $return = $query->fetch(PDO::FETCH_ASSOC);

        if (empty($return)) {
            return false;
        }

        if (($return['email'] == $email) && ($return['password'] == $password)) {

            return true;
        } else {

            return false;
        }
    }


    public function register()
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $username = $this->username;
        $password = $this->password;
        $email = $this->email;
        $jobTitle = $this->jobTitle;

        $sql = "INSERT INTO `users` (`username`, `email`, `password` , `permissions` ,`jobTitle`) VALUES ('" . $username . "', '" . $email . "', '" . $password . "', 'normal', '" . $jobTitle . "')";
        $query = $conexao->query($sql);
    }


    public function getUser()
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();

        $email = $this->email;

        $sql = "SELECT * from users WHERE email='" . $email . "'";
        $query = $conexao->query($sql);
        $userData = $query->fetch(PDO::FETCH_ASSOC);

        return $userData;
    }

    public function findUserById($userId)
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "SELECT * from users WHERE id='" . $userId . "'";
        $query = $conexao->query($sql);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function getUserIdByUserEmail($userEmail)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "SELECT id from users WHERE email='" . $userEmail . "'";
        $query = $conexao->query($sql);
        $userId = $query->fetch(PDO::FETCH_ASSOC);

        return $userId;
    }

    public function updateDays($userId, $days)
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "UPDATE `users` SET `hDaysRemaining` = hDaysRemaining -" . $days . " WHERE `users`.`id` =" . $userId . ";";
        $query = $conexao->query($sql);
    }

    public function getAllUsers()
    {


        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "SELECT * from users";
        $query = $conexao->query($sql);
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function updateUserProfile($userId, $nome, $email, $password, $telefone, $morada, $funcao)
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "UPDATE `users` SET `username` = '$nome', `email` = '$email', `password` = '$password', `phone` = '$telefone', `address` = '$morada', `jobTitle` = '$funcao' WHERE `users`.`id` =" . $userId . ";";
        $query = $conexao->query($sql);
    }

    public function getTotalActiveUsers()
    {


        $users = $this->getAllActiveUsers();

        return sizeof($users);
    }

    public function getAllActiveUsers()
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "SELECT * from users where status='aproved'";
        $query = $conexao->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPendingUsers()
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "SELECT * from users where status='pending'";
        $query = $conexao->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getTotalPendingUsers()
    {


        $users = $this->getAllPendingUsers();

        return sizeof($users);
    }

    public function changeStatus($userId, $status)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "UPDATE `users` SET `status` = '$status' WHERE `users`.`id` =" . $userId . ";";
        $query = $conexao->query($sql);
    }

    public function changeDays($userId, $days)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "UPDATE `users` SET `hDaysRemaining` =  $days  WHERE `users`.`id` =" . $userId . ";";
        $query = $conexao->query($sql);
    }

    public function changePermissions($userId, $permissions)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "UPDATE `users` SET `permissions` =  '$permissions'  WHERE `users`.`id` =" . $userId . ";";
        $query = $conexao->query($sql);
    }


    public function getWorkingDaysByUserId($userId)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "SELECT `workingDays` FROM `users` WHERE `id`=$userId";
        $query = $conexao->query($sql);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function changeWorkingDays($userId, $workingDays)
    {

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->criarConexao();
        $sql = "UPDATE `users` SET `workingDays` =  '$workingDays'  WHERE `users`.`id` =" . $userId . ";";
        $query = $conexao->query($sql);
    }
}
