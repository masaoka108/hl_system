<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;               //複数テーブルを扱う為に追記
use Cake\Datasource\ConnectionManager;    //トランザクションを使う為に追記
use \Exception;                           //try-catch を有効にする為に追記

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{
  //共通関数ファイル読み込み
  public $components = array('Utility','Order');  //Controller\Component\UtilityComponent.php
//  public $components = array('Order');

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

        $this->paginate = [
            'contain' => ['m_customers'],
            'limit' => 10,
        ];


        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);

        //共通関数の呼び出しテスト
        //$st = $this->Utility->getHello();
        //echo $st;
    }



    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->paginate = [
            'contain' => ['m_customers']
        ];

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }





    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Entityとは →　DBテーブルの1行分のデータ
        $order = $this->Orders->newEntity();

        //post であれば登録処理
        if ($this->request->is('post')) {



            //デバック用
/*
            $test1 = $this->request->data['m_record_types_id_1'];
            $test2 = $this->request->data['m_record_types_id_2'];
            $test3 = $this->request->data['m_record_types_id_3'];
            echo("test1:".$test1."<br>");
            echo("test2:".$test2."<br>");
            echo("test3:".$test3."<br>");
*/
            //debug($this->request->data);  //POSTデータ全体を確認する

            //$test1 = $this->request->data['order_details_0_m_record_types_id'];
            //echo("test1:".$test1."<br>");


            //die();



            // トランザクション
            $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
            $connection = ConnectionManager::get('default');
            //$connection->begin();
            $this->Orders->connection()->begin();
            $this->Orders_Details->connection()->begin();

            //SQLの履歴を残す為に必要
            $conn = \Cake\Datasource\ConnectionManager::get('default');
            $conn->logQueries(true);

            try{

                //******Orders 登録
                $order = $this->Orders->patchEntity($order, $this->request->data);

                if ($this->Orders->save($order)) {

                    $newId = $order->id;

                    //$this->Flash->success(__('The order has been saved.'));

                    //一覧へ遷移
                    //return $this->redirect(['action' => 'index']);
                } else {
                    throw new Exception(Configure::read("M.ERROR.INVALID"));
                }


                //******orders_details 登録

                //データ取得
                $arOrdersDetails = $this->Order->getOrdersDetails($newId,$this->request->data);

                // 実行クエリ
                $query = $this->Orders_Details->query();
                $query->insert(['orders_i', 'm_record_types_id','qty','rpm','artist_name','title','track_list']);

//debug($this->request->data);  //POSTデータ全体を確認する
//debug($arOrdersDetails);
//die();

                // dataの数だけvalues追加
                foreach ($arOrdersDetails as $d) {
                    $query->values($d);
                }
                // 実行
                $query->execute();

/*
                //これは一応、更新自体は出来た。（ただ1行のみ）
                $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
                $orders_detail = $this->Orders_Details->newEntity();
                $orders_detail['orders_id'] = $newId;
                $orders_detail['m_record_types_id'] = 1;
                //$orders_detail = $this->OrderDetails->patchEntity($orders_detail, $this->request->data);
                if ($this->Orders_Details->save($orders_detail)) {
                } else {
                  throw new Exception(Configure::read("M.ERROR.INVALID"));
                }
*/


                $this->Orders->connection()->commit();
                $this->Orders_Details->connection()->commit();

            } catch(Exception $e){

                $this->Flash->error($e);

                //$connection->rollback(); //ロールバック
                $this->Orders->connection()->rollback();
                $this->Orders_Details->connection()->rollback();

                //SQLの履歴を残す為に必要
                $conn->logQueries(false);

                //一覧へ遷移
                //return $this->redirect(['action' => 'index']);

                //入力データは保持したままエラーメッセージ表示


            }
//            finally{
//            }

          //SQLの履歴を残す為に必要
          $conn->logQueries(false);

          //              echo 'ddd';
          //              die();

          $this->Flash->success(__('オーダーを新規登録しました。'));

          //一覧へ遷移
          return $this->redirect(['action' => 'index']);





/*
            //Orders 登録
            $order = $this->Orders->patchEntity($order, $this->request->data);

            if ($this->Orders->save($order)) {
                echo "今登録されたID：".$order->id;

                //$this->Flash->success(__('The order has been saved.'));

                //一覧へ遷移
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
*/


/*
            //OrderDetails 登録
            $this->loadModel('OrderDetails');   //OrderDetailsモデルを使用出来るように呼び出し

            $order_detail = $this->OrderDetails->newEntity();

            //$comments = $this->Comment->findAllByPostId($id);

           $order_detail->orders_id



            $order_detail = $this->OrderDetails->patchEntity($order_detail, $this->request->data);

            if ($this->OrderDetails->save($order_detail)) {
                //$this->Flash->success(__('The order has been saved.'));

                //一覧へ遷移
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
*/


            //一気に登録

/*
             try
             {

               //SQLの履歴を残す為に必要
               $conn = \Cake\Datasource\ConnectionManager::get('default');
               $conn->logQueries(true);

                 //$order = $this->Orders->patchEntity($order, $this->request->data, ['associated' => ['Items']]);
                $this->request->data['Orders_Details']['m_record_types_id'] = 1;
                //echo $this->request->data['Orders_Details']['m_record_types_id'];
                //die();

                 //$order = $this->Orders->patchEntity($order, $this->request->data, ['associated' => ['Orders_Details']]);
                 $order = $this->Orders->patchEntity($order, $this->request->data);

                 if ($this->Orders->save($order))
                 {
                     $this->Flash->success(__('The order has been saved.'));
                     return $this->redirect(['action' => 'index']);
                 } else
                 {
                     $this->Flash->error(__('The order could not be saved. Please, try again.'));
                 }

             } catch (PDOException $e) {


                //echo "a";
                //die();

           			if (isset($query->queryString)) {
           				$e->queryString = $query->queryString;
           			} else {
           				$e->queryString = $sql;
           			}
           			//throw $e;

                echo $e;
             }
             finally{
               //SQLの履歴を残す為に必要
               $conn->logQueries(false);
             }

*/



        }

        //カスタマーDDL
        //$users = $this->Orders->Users->find('list', ['limit' => 200]);
        $m_customers = $this->Orders->m_customers->find('list', ['limit' => 200]);
        //$this->set(compact('order', 'users'));

        //レコード盤 DDL
        $this->m_record_types = TableRegistry::get('m_record_types');   //別モデルを呼び出し
        //$m_record_types = $this->m_record_types->find();
        //$m_record_types = $this->m_record_types->find('list', array('fields' => array('id', 'record_type_name')));
        //$m_record_types = $this->m_record_types->find()->select(array('id', 'record_type_name'));
        $m_record_types = $this->m_record_types->find('list', ['keyField' => 'id','valueField' => 'record_type_name']);

        //FINDした結果のデバッグ
        //debug(json_encode($m_record_types, JSON_PRETTY_PRINT));
        //debug($m_record_types->toArray());




        //$m_record_types = $this->m_record_types->find('list');

//        print_r($m_record_types);

        //$this->set('tests', $this->testdatas->find()->limit(10));
//        $this->loadModel('m_record_types');   //OrderDetailsモデルを使用出来るように呼び出し
//        $m_record_types = $this->Orders->m_customers->find('list', ['limit' => 200]);

        //RPM DDL
        $arRPM = $this->Utility->arRPM;



        //オーダー内容(OrdersDetails)
        $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
        $Orders_Details=$this->Orders_Details->newEntity();


        //compactで配列を生成。
        //下記2行と同じ事を1行で実行している。
        //$this->set("order", $order);
        //$this->set("m_customers", $m_customers);
        $this->set(compact('order', 'm_customers','m_record_types','arRPM','Orders_Details'));
        $this->set('_serialize', ['order']);
    }






    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put'])) {



/*
          $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
          $order_d = $this->Orders_Details->get(22);
          if ($this->Orders_Details->delete($order_d)) {

            echo "del1111";
            die();

              $this->Flash->success(__('The order has been deleted.'));
          }

          echo "del";
          die();
*/





//echo $order['id'];
//debug($order);
//die();
            // トランザクション
            $connection = ConnectionManager::get('default');
            $connection->begin();

            //SQLの履歴を残す為に必要
            $conn = \Cake\Datasource\ConnectionManager::get('default');
            $conn->logQueries(true);

            try{

                //******Orders 更新
                $order = $this->Orders->patchEntity($order, $this->request->data);

                if ($this->Orders->save($order)) {
                    //$this->Flash->success(__('The order has been saved.'));
                    //return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The order could not be saved. Please, try again.'));
                }


                //******Orders_Details更新
                //******delete > insert　で実行

                $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し

                //****DELETE
                // $idからエンティティーを取得。データがなければ、NotFoundExceptionが投げられる。
                //$now_Orders_Details =  $this->Orders_Details->find()->where(['orders_id' => $order['id']]);

//debug($now_Orders_Details);
//die();


                // 削除成功
                //if ($this->Orders_Details->deleteAll($now_Orders_Details)) {
                if ($this->Orders_Details->deleteAll(array('orders_id' => $order['id']))) {

                  $this->Orders_Details->connection()->commit();

                  //echo 'del___aaaa';
                  //die();

                  //$this->Flash->success(__('削除されました。'));
                  //return $this->redirect(['action' => 'index']);
                }
                else {
                  //echo 'ccc';
                  //die();
                }


                //****INSERT
                //データ取得
                $arOrdersDetails = $this->Order->getOrdersDetails($order['id'],$this->request->data);

                // 実行クエリ
                $query = $this->Orders_Details->query();
                $query->insert(['orders_id', 'm_record_types_id','qty','rpm','artist_name','title','track_list']);

                // dataの数だけvalues追加
                foreach ($arOrdersDetails as $d) {
                    $query->values($d);
                }

                // 実行
                $query->execute();

                $this->Orders_Details->connection()->commit();

            } catch(Exception $e){
                $this->Flash->error($e);
                $connection->rollback(); //ロールバック

            }
            finally{
              //SQLの履歴を残す為に必要
              $conn->logQueries(false);
              $this->Flash->success(__('変更しました。'));

              //一覧へ遷移
              return $this->redirect(['action' => 'index']);
            }
        }

        //$users = $this->Orders->Users->find('list', ['limit' => 200]);

        //カスタマーDDL
        $m_customers = $this->Orders->m_customers->find('list', ['limit' => 200]);

        //レコード盤 DDL
        $this->m_record_types = TableRegistry::get('m_record_types');   //別モデルを呼び出し
        $m_record_types = $this->m_record_types->find('list', ['keyField' => 'id','valueField' => 'record_type_name']);

        //RPM DDL
        $arRPM = $this->Utility->arRPM;

        //オーダー内容(OrdersDetails)
        $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
        //$this->m_record_types = TableRegistry::get('m_record_types');   //別モデルを呼び出し  これ、上と同じ事？？

        $Orders_Details = $this->Orders_Details->find()->where(['orders_id' => $id]);
        //$order = $this->Orders->newEntity();
        //$Orders_Details=$this->Orders_Details->newEntity();
//debug($Orders_Details);
//die();

        $this->set(compact('order', 'm_customers','m_record_types','arRPM','Orders_Details'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
