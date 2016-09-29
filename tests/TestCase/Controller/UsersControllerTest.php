<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    //****** Fixtures
    public $fixtures = ['app.users'];

    //****** Test Login method

	//**** ページが表示される
    public function testLogin()
    {
		$this->get('/users/login');

		//ページが表示されるか？
        $this->assertResponseOk();
    }

	//**** 正しいPASSWORDを入力したら画面遷移する
    public function testRightPass()
    {
        $data = [
            'username' => 'admin3',
            'password' => 'admin3'
        ];
        
        $this->post('/users/login', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect(['controller' => 'Orders', 'action' => 'index']);
	}

	//**** 間違ったPASSWORDを入力したら画面遷移しない
    public function testWrongPass()
    {
        $data = [
            'username' => 'admin3',
            'password' => '123456'
        ];
        
        $this->post('/users/login', $data);

        $this->assertResponseSuccess();
        $this->assertResponseContains('usernameかpasswordが間違っています。');
	}





    //****** Test view method
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    //****** Test add method
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    //****** Test edit method
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    //****** Test delete method
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
