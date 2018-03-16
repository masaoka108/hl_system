<?php
namespace App\Test\TestCase\Controller;

use App\Controller\OrdersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\OrdersController Test Case
 */
class OrdersControllerTest extends IntegrationTestCase
{

    //******** Fixtures
    //public $fixtures = ['app.orders','app.users','app.MCustomers'];
    public $fixtures = ['app.orders'];

    public function testMultiFixture()
    {
      $this->Orders = TableRegistry::get('orders');

      debug($this->Orders->find()->all()->count());
      debug($this->fixtures);

      $this->assertEquals(2, $this->Orders->find()->all()->count());
    }



	//****** ログイン前の場合はアクセス出来ない
    public function testIndexBeforeLogin()
    {
		 // セッションデータの未設定
	    $this->get('/orders/index');

	    $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

	//****** ログイン後はアクセス可能
    public function testIndexAfterLogin()
    {
		// セッションデータのセット
	    $this->session([
		        'Auth' => [
		            'User' => [
		                'id' => 1,
		                'username' => 'admin3'
		            ]
		        ]
	    ]);

      //debug($this->session);

	    $this->get('/orders/index');
	    //$this->assertResponseOk();

      $this->assertSession('9999', 'works');
      $this->session(['works' => '9999']);

      $this->get('/orders/index');
      //$this->post('/orders/index',['test' => 'aaaa']);

      $this->assertSession('8888', 'works');


    }



    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
