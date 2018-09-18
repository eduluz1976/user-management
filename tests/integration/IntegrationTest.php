<?php
use eduluz1976\user_management\User;

class IntegrationTest extends PHPUnit\Framework\TestCase
{

    protected $user;

    /**
     * @return User
     */
    protected function getUser()  {
        if (!$this->user) {
            $this->user = new class() {
                use User;
                use \eduluz1976\user_management\Restriction;
                use \eduluz1976\user_management\PDOModel;
                use \eduluz1976\user_management\Hashable;
            };

            $this->user->setPdo(new PDO('mysql:host=localhost;dbname=db_user_dev', 'dbuser', 's3nh4;'));

        }
        return $this->user;
    }


    public function testCreateNewUserWithSuccess() {

        $ret = $this->getUser()
            ->setEmail('myemail@domain.com')
            ->setUsername('myUsername')
            ->setHash('123')
            ->save();


        print_r($ret);

        $this->assertTrue(true);


    }
//
//
//    public function testCreateNewUserWithError() {
//
//    }
//
//    public function testRetrieveUser() {
//
//    }
//
//    public function testRetrieveUserNoExists() {
//
//    }
//
//    public function testUpdateUser() {
//
//    }
//
//
//    public function testChangePasswordOk() {
//
//    }
//
//
//    public function testChangePasswordError() {
//
//    }
//
//
//    public function testChangeEmailOk() {
//
//    }
//
//    public function testChangeEmailErrorDuplicated() {
//
//    }
//
//
//    public function testDeactivateUser() {
//
//    }
//
//    public function reactivateUser() {
//
//    }
//
//
//    public function testLoginOk() {
//
//    }
//
//    public function testLoginError() {
//
//    }


}
