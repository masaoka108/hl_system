<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;




/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{


    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [ // Authコンポーネントの読み込み
                    'authenticate' => [
                        'Form' => [ // 認証の種類を指定。Form,Basic,Digestが使える。デフォルトはForm
                            'userModel' => 'Users', //認証に使用するテーブル名
                            'fields' => [ // ユーザー名とパスワードに使うカラムの指定。省略した場合はusernameとpasswordになる
                                'username' => 'username', // ユーザー名のカラムを指定
                                'password' => 'password' //パスワードに使うカラムを指定
                            ],
                            //'passwordHasher' => 'Blowfish',
                            'passwordHasher' => ['className' => 'None'],
                        ]
                    ],
                    'loginRedirect' => [ // ログイン後に遷移するアクションを指定
                        'controller' => 'orders',
                        'action' => 'index'
                    ],
                    'logoutRedirect' => [ // ログアウト後に遷移するアクションを指定
                        'controller' => 'Users',
                        'action' => 'login',
                    ],
                    'authError' => 'ログインできませんでした。ログインしてください。', // ログインに失敗したときのFlashメッセージを指定(省略可)
                ]);


        //認証
/*
         $this->loadComponent('Auth',[
                                     	'authenticate' => [
                                                     		'Form' => [
                                                           			'fields' => [
                                                                     				//'username' => 'email',
                                                                            'username' => 'username',
                                                                     				'password' => 'password'
                                                     			                  ]
                                                     		          ]
                                     	                  ],
                                     	'loginAction' => [
                                                     		'controller' => 'Users',
                                                     		'action' => 'login'
                                     	                 ]
                                      ]
                              );
*/
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    //20160823 okamura add start
/*
    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'logins',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );
*/

/*
    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
    }
*/


/*
    public function beforeFilter() {
        parent::beforeFilter();
        // ユーザー自身による登録とログアウトを許可する
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
*/

    //20160823 okamura add end


}
