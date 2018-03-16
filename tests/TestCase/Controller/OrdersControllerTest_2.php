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
  //public $fixtures = ['app.orders'];

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
    // セッションデータの擬似的にセット
    $this->session([
      'Auth' => [
        'User' => [
          'id' => 1,
          'username' => 'admin3'
        ]
      ]
    ]);

    //ログイン後のページへアクセス
    $this->get('/orders/index');

    //ページ遷移が成功(http=200)したか確認。
    $this->assertResponseOk();
  }

}
