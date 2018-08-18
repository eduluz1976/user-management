<?php
use eduluz1976\user_management\User;

class UserTest extends PHPUnit\Framework\TestCase
{

    protected $user;

    /**
     * @return User
     */
    protected function getUser() : User {
        if (!$this->user) {
            $this->user = new User();
        }
        return $this->user;
    }


    public function testGetUsername()
    {
        $this->getUser()->setUsername('user');
        $this->assertEquals('user', $this->getUser()->getUsername());
    }

    public function testGetEmail()
    {
        $this->getUser()->setEmail('user@domain.com');
        $this->assertEquals('user@domain.com', $this->getUser()->getEmail());

    }

    public function testGetHash()
    {
        $this->getUser()->setHash('abc');
        $this->assertEquals('abc', $this->getUser()->getHash());

    }


    public function testGetPdo()
    {
        $this->expectException(\PDOException::class);
        $pdo = new \PDO('');
        $this->getUser()->setPdo($pdo);
        $this->assertInstanceOf(\PDO::class, $this->getUser()->getPdo());
    }


    public function testGetStatus()
    {
        $this->getUser()->setStatus(5);
        $this->assertEquals(5, $this->getUser()->getStatus());

    }
}
