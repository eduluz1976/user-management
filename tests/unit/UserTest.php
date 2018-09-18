<?php
use eduluz1976\user_management\User;
use \eduluz1976\user_management\Restriction;

class UserTest extends PHPUnit\Framework\TestCase
{

    protected $user;

    /**
     * @return User
     */
    protected function getUser()  {
        if (!$this->user) {
            $this->user = new class(){
                use User;
                use Restriction;
                use \eduluz1976\user_management\PDOModel;
                use \eduluz1976\user_management\Hashable;
            };
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
        $this->getUser()->setRestriction(5);
        $this->assertEquals(5, $this->getUser()->getRestriction());

    }
}
