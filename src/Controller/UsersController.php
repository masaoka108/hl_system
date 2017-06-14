<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;               //複数テーブルを扱う為に追記
use Cake\Datasource\ConnectionManager;    //トランザクションを使う為に追記
use \Exception;                           //try-catch を有効にする為に追記

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
  //共通関数ファイル読み込み
  public $components = array('Utility','Order');  //Controller\Component\UtilityComponent.php

  public function initialize()
  {
      parent::initialize();

      //layoutファイルを変更
      $this->viewBuilder()->layout('hl');

      //ログイン判定
      if(is_null($this->Auth->user())){
        //ログインしていない場合
      }else{
        //ログインしている場合
        $this->set('username', $this->Auth->user('username'));
      }


  }

  //paginatorのテンプレートを使う為
  //これで config フォルダ内の paginator-templates.php を使用するように設定される。
  public $helpers = [
      'Paginator' => ['templates' =>
          'paginator-templates']
  ];

  public function beforeFilter(\Cake\Event\Event $event) {
  	parent::beforeFilter($event);

  	//add はログインしていなくても閲覧許可
    $this->Auth->allow(['add']);
  }

    /**
     * ログインページ
     * @return type
     */
    public function login()
    {
// throw new exception ('test');


      $this->viewBuilder()->layout('hl_login');

      if($this->request->is('post')){
          $user = $this->Auth->identify(); // Postされたユーザー名とパスワードをもとにデータベースを検索。ユーザー名とパスワードに該当するユーザーがreturnされる

         if ($user) { // 該当するユーザーがいればログイン処理

             //setUser()はセッション内にユーザー情報を保持してくれます。ちなみに、ここで保存されたデータは$this->Auth->user()で取得することができます。
             $this->Auth->setUser($user);
             //return $this->Auth->redirectUrl();

             return $this->redirect($this->Auth->redirectUrl());
         } else { // 該当するユーザーがいなければエラー
             //throw new UnauthorizedException('メールアドレスかパスワードが間違っています');
             $this->Flash->error('usernameかpasswordが間違っています。');
         }
      }
    }

    public function logout()
    {
        $this->request->session()->destroy(); // セッションの破棄
        return $this->redirect($this->Auth->logout()); // ログアウト処理
    }



    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

          //SQLの履歴を残す為に必要
          $conn = \Cake\Datasource\ConnectionManager::get('default');
          $conn->logQueries(true);


            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }

            //SQLの履歴を残す為に必要
            $conn->logQueries(false);

        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
