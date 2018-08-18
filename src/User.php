<?php

namespace eduluz1976\user_management;

/**
 * Class User
 * @package eduluz1976\user_management
 */
class User
{

    /**
     * @var \PDO
     */
    protected $pdo;

    protected $username;
    protected $hash;
    protected $email;
    protected $status;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return User
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

    /**
     * @param \PDO $pdo
     * @return User
     */
    public function setPdo(\PDO $pdo): User
    {
        $this->pdo = $pdo;
        return $this;
    }





    public function __construct(\PDO $pdo=null)
    {
        if ($pdo) {
            $this->setPdo($pdo);
        }
    }


}