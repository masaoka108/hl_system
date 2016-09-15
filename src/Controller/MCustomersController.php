<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;               //複数テーブルを扱う為に追記
use Cake\Datasource\ConnectionManager;    //トランザクションを使う為に追記
use \Exception;                           //try-catch を有効にする為に追記

/**
 * MCustomers Controller
 *
 * @property \App\Model\Table\MCustomersTable $MCustomers
 */
class MCustomersController extends AppController
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


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $mCustomers = $this->paginate($this->MCustomers);

        $this->set(compact('mCustomers'));
        $this->set('_serialize', ['mCustomers']);
    }

    /**
     * View method
     *
     * @param string|null $id M Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mCustomer = $this->MCustomers->get($id, [
            'contain' => []
        ]);

        $this->set('mCustomer', $mCustomer);
        $this->set('_serialize', ['mCustomer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mCustomer = $this->MCustomers->newEntity();
        if ($this->request->is('post')) {
            $mCustomer = $this->MCustomers->patchEntity($mCustomer, $this->request->data);
            if ($this->MCustomers->save($mCustomer)) {
                $this->Flash->success(__('登録が完了しました'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The m customer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mCustomer'));
        $this->set('_serialize', ['mCustomer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id M Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mCustomer = $this->MCustomers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mCustomer = $this->MCustomers->patchEntity($mCustomer, $this->request->data);
            if ($this->MCustomers->save($mCustomer)) {
                $this->Flash->success(__('変更が完了しました'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The m customer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mCustomer'));
        $this->set('_serialize', ['mCustomer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id M Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);


        //コネクション
        $connection = ConnectionManager::get('default');
        $this->MCustomers->connection()->begin();

        //SQLの履歴を残す為に必要
        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $conn->logQueries(true);

        try{

            $mCustomer = $this->MCustomers->get($id);
            if ($this->MCustomers->delete($mCustomer)) {
                $this->Flash->success(__('The m customer has been deleted.'));
            } else {
                $this->Flash->error(__('The m customer could not be deleted. Please, try again.'));
            }

            //commit
            $this->MCustomers->connection()->commit();
            return $this->redirect(['action' => 'index']);

        } catch(Exception $e){
            $err = true;

            $this->Flash->error($e);
            $this->MCustomers->connection()->rollback();
        }


        return $this->redirect(['action' => 'index']);
    }


    public function MCustomerslist($gid=0) {

/*
      if (!$this->RequestHandler->isAjax()) {
        $this->cakeError('error404');
      }
*/

      // 今回はJSONのみを返すためViewのレンダーを無効化
      $this->autoRender = false;
      // Ajax以外の通信の場合
      if(!$this->request->is('ajax')) {
        //throw new BadRequestException();
        die();
      }

      $result = $this->MCustomers->get($gid);
      $status = !empty($result);
      if(!$status) {
            $error = array(
              'message' => 'データがありません',
              'code' => 404
            );
          }

          echo json_encode(array('result' => $result));

/*
      echo json_encode(array('result' => $result,
                             'status' => $status,
                             'error' => $error
                            ));
*/
      //この方法でJSONデータをJSに渡せるという話だったがダメだった。
      //$this->set('result', $result);
      //$this->set('_serialize', ['result']);
    }
}
