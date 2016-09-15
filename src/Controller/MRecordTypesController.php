<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;               //複数テーブルを扱う為に追記
use Cake\Datasource\ConnectionManager;    //トランザクションを使う為に追記
use \Exception;                           //try-catch を有効にする為に追記


/**
 * MRecordTypes Controller
 *
 * @property \App\Model\Table\MRecordTypesTable $MRecordTypes
 */
class MRecordTypesController extends AppController
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
        $mRecordTypes = $this->paginate($this->MRecordTypes);

        $this->set(compact('mRecordTypes'));
        $this->set('_serialize', ['mRecordTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id M Record Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mRecordType = $this->MRecordTypes->get($id, [
            'contain' => []
        ]);

        $this->set('mRecordType', $mRecordType);
        $this->set('_serialize', ['mRecordType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mRecordType = $this->MRecordTypes->newEntity();
        if ($this->request->is('post')) {
            $mRecordType = $this->MRecordTypes->patchEntity($mRecordType, $this->request->data);
            if ($this->MRecordTypes->save($mRecordType)) {
                $this->Flash->success(__('The m record type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The m record type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mRecordType'));
        $this->set('_serialize', ['mRecordType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id M Record Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mRecordType = $this->MRecordTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mRecordType = $this->MRecordTypes->patchEntity($mRecordType, $this->request->data);
            if ($this->MRecordTypes->save($mRecordType)) {
                $this->Flash->success(__('The m record type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The m record type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mRecordType'));
        $this->set('_serialize', ['mRecordType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id M Record Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mRecordType = $this->MRecordTypes->get($id);
        if ($this->MRecordTypes->delete($mRecordType)) {
            $this->Flash->success(__('The m record type has been deleted.'));
        } else {
            $this->Flash->error(__('The m record type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
