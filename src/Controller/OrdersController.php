<?php
namespace App\Controller;

use App\Controller\AppController2;
use Cake\ORM\TableRegistry;               //複数テーブルを扱う為に追記
use Cake\Datasource\ConnectionManager;    //トランザクションを使う為に追記
use \Exception;                           //try-catch を有効にする為に追記
use Cake\I18n\Time;						  //
use Cake\I18n\Date;						  //
use Cake\Validation\Validator;            //バリデーション用

/**
* Orders Controller
*
* @property \App\Model\Table\OrdersTable $Orders
*/
class OrdersController extends AppController
{
    //共通関数ファイル読み込み
    public $components = array('Utility','Order');  //Controller\Component\UtilityComponent.php
    //public $helpers = array('Order');

    public function initialize()
    {
        parent::initialize();

        //search plugin 使用の為
        $this->loadComponent('Search.Prg', [
            // This is default config. You can modify "actions" as needed to make
            // the PRG component work only for specified methods.
            'actions' => ['index', 'lookup']
        ]);

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
        'Paginator' => ['templates' =>'paginator-templates'],
        'Color',
        'DatePicker',
        'Utility'
    ];

    /**
    * Index method
    *
    * @return \Cake\Network\Response|null
    */
    public function index()
    {
        //debug($this->request->session()->read('works'));


        //search plugin 使用の為
        $query = $this->Orders
        // Use the plugins 'search' custom finder and pass in the
        // processed query params
        ->find('search', ['search' => $this->request->query])
        // You can add extra things to the query if you need to
        //->contain(['orders_details','m_customers']);
        ->contain(['m_customers']);
        //->where(['orders_id IS NOT' => null]);

        $this->set('orders', $this->paginate($query));


        //datapicker の検索条件をセット
        if(array_key_exists('srhOrderDateFrom',$this->request->data))
        {
            $this->set('srhOrderDateFrom',$this->request->data['srhOrderDateFrom']);
        }
        else {
            $this->set('srhOrderDateFrom',null);
        }

        if(array_key_exists('srhOrderDateTo',$this->request->data))
        {
            $this->set('srhOrderDateTo',$this->request->data['srhOrderDateTo']);
        }
        else {
            $this->set('srhOrderDateTo',null);
        }


        if ($this->request->session()->read('works') == '9999') {
            $this->request->session()->write('works', '8888');
        } else {
            $this->request->session()->write('works', '9999');
        }


        //debug($this->request->session()->read('works'));


        //WORKS掲載 DDL
        $arWorks = $this->Utility->arWorks;
        $this->set('arWorks',$arWorks);
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

        $err = false;

        //post であれば登録処理
        if ($this->request->is(['patch', 'post', 'put'])) {

            // トランザクション
            $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
            $connection = ConnectionManager::get('default');
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
                } else {
                    throw new Exception('入力内容を確認して下さい。');
                }

                //******orders_details 登録

                //データ取得
                $arOrdersDetails = $this->Order->getOrdersDetails($newId,$this->request->data);

                // 実行クエリ
                $query = $this->Orders_Details->query();
                $query->insert(['orders_id', 'm_record_types_id','qty','rpm','artist_name','title','track_list']);

                // dataの数だけvalues追加
                foreach ($arOrdersDetails as $d) {
                    $query->values($d);
                }
                // 実行
                $query->execute();

                // コミット
                $this->Orders->connection()->commit();
                $this->Orders_Details->connection()->commit();

            } catch(Exception $e){

                $err = true;

                $this->Flash->error($e);

                //****** ロールバック
                $this->Orders->connection()->rollback();
                $this->Orders_Details->connection()->rollback();

                //****** SQLの履歴を残す為に必要
                //$conn->logQueries(false);


                //******入力データは保持したままエラーメッセージ表示

            }

            //SQLの履歴を残す為に必要
            $conn->logQueries(false);

            if($err== false)
            {
                $this->Flash->msg1(__('オーダーを新規登録しました。'));

                //一覧へ遷移
                return $this->redirect(['action' => 'index']);
            }



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
$m_customers = $this->Orders->m_customers->find('list', [
    'keyField' => 'id',
    'valueField' => 'full_name',
    'limit' => 200
]);

//WORKS掲載 DDL
$arWorks = $this->Utility->arWorks;

//レコード盤 DDL
$this->m_record_types = TableRegistry::get('m_record_types');   //別モデルを呼び出し
$m_record_types = $this->m_record_types->find('list', ['keyField' => 'id','valueField' => 'record_type_name']);

//RPM DDL
$arRPM = $this->Utility->arRPM;

if($err== false)
{
    //オーダー内容(OrdersDetails)
    $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
    $Orders_Details=$this->Orders_Details->newEntity();

    //**compactで配列を生成。
    //**下記2行と同じ事を1行で実行している。
    //**$this->set("order", $order);
    //**$this->set("m_customers", $m_customers);
    $this->set(compact('order', 'm_customers','m_record_types','arRPM','arWorks','Orders_Details'));
    $this->set('_serialize', ['order']);
    $this->set('_serialize', ['Orders_Details']);
}
else
{
    //******エラー発生時(入力内容を保持したまま画面遷移しない)

    //データ取得
    $arOrdersDetails = $this->Order->getOrdersDetails(0,$this->request->data);

    //set
    $this->set(compact('order', 'm_customers','m_record_types','arRPM','arWorks'));
    $this->set("Orders_Details", $arOrdersDetails);
    $this->set('_serialize', ['order']);
    $this->set('_serialize', ['Orders_Details']);
}


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
    $order["order_date"]->format('Y/m/d');

    $err = false;

    if ($this->request->is(['patch', 'post', 'put'])) {

        // トランザクション
        $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
        $connection = ConnectionManager::get('default');
        $this->Orders->connection()->begin();
        $this->Orders_Details->connection()->begin();

        //SQLの履歴を残す為に必要
        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $conn->logQueries(true);

        try{
            //先に画面のorders_detailsを取得しておく。
            $arOrdersDetails = $this->Order->getOrdersDetails($order['id'],$this->request->data);

            //******Orders 更新
            $order = $this->Orders->patchEntity($order, $this->request->data);

            if ($this->Orders->save($order)) {

            } else {
                throw new Exception('オーダーデータの登録が失敗しました。');
            }


            //******Orders_Details更新
            //******delete > insert　で実行

            //****DELETE
            if ($this->Orders_Details->deleteAll(array('orders_id' => $order['id']))) {
            }
            else {
                throw new Exception('オーダー詳細データの削除が失敗しました。');
            }


            //****INSERT

            // 実行クエリ
            $query = $this->Orders_Details->query();
            $query->insert(['orders_id', 'm_record_types_id','qty','rpm','artist_name','title','track_list']);

            // dataの数だけvalues追加
            foreach ($arOrdersDetails as $d) {
                $query->values($d);
            }

            // 実行
            $query->execute();

            //commit
            $this->Orders->connection()->commit();
            $this->Orders_Details->connection()->commit();

        } catch(Exception $e){
            $err = true;

            $this->Flash->error($e);
            $this->Orders->connection()->rollback();
            $this->Orders_Details->connection()->rollback();
        }

        //SQLの履歴を残す為に必要
        $conn->logQueries(false);

        if($err == false)
        {
            $this->Flash->msg1(__('変更しました。'));

            //一覧へ遷移
            return $this->redirect(['action' => 'index']);
        }
    }

    //カスタマーDDL
    $m_customers = $this->Orders->m_customers->find('list', [
        'keyField' => 'id',
        'valueField' => 'full_name',
        'limit' => 200
    ]);

    //WORKS掲載 DDL
    $arWorks = $this->Utility->arWorks;

    //レコード盤 DDL
    $this->m_record_types = TableRegistry::get('m_record_types');   //別モデルを呼び出し
    $m_record_types = $this->m_record_types->find('list', ['keyField' => 'id','valueField' => 'record_type_name']);

    //RPM DDL
    $arRPM = $this->Utility->arRPM;


    if($err == false)
    {
        //オーダー内容(OrdersDetails)
        $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し

        $Orders_Details = $this->Orders_Details->find()->where(['orders_id' => $id]);

        $this->set(compact('order', 'm_customers','m_record_types','arRPM','arWorks','Orders_Details'));
        $this->set('_serialize', ['order']);
    }else{
        //******エラー発生時(入力内容を保持したまま画面遷移しない)
        //set
        $this->set(compact('order', 'm_customers','m_record_types','arRPM','arWorks'));
        $this->set("Orders_Details", $arOrdersDetails);
        $this->set('_serialize', ['order']);
        $this->set('_serialize', ['Orders_Details']);
    }
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
    $this->request->allowMethod(['post','put', 'delete']);

    // トランザクション
    $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し
    $connection = ConnectionManager::get('default');
    $this->Orders->connection()->begin();
    $this->Orders_Details->connection()->begin();


    //SQLの履歴を残す為に必要
    $conn = \Cake\Datasource\ConnectionManager::get('default');
    $conn->logQueries(true);

    try{

        //****** orders_details 削除
        $this->loadModel('Orders_Details');   //OrderDetailsモデルを使用出来るように呼び出し

        if ($this->Orders_Details->deleteAll(array('orders_id' => $id))) {
        }
        else {
            throw new Exception('オーダー詳細データの削除が失敗しました。');
        }

        //****** orders 削除
        $order = $this->Orders->get($id);

        if ($this->Orders->delete($order)) {
            $this->Flash->msg1(__('オーダー削除が完了しました。'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        //commit
        $this->Orders->connection()->commit();
        $this->Orders_Details->connection()->commit();

        return $this->redirect(['action' => 'index']);

    } catch(Exception $e){
        $err = true;

        $this->Flash->error($e);
        $this->Orders->connection()->rollback();
        $this->Orders_Details->connection()->rollback();
    }
}


public function sales()
{
    $target_year = date('Y'); //とりあえず今年に固定


    $query = $this->Orders->find();

    $query->select(['year' =>   $query->func()->year(['Orders.order_date' => 'identifier']),
    'month' => $query->func()->month(['Orders.order_date' => 'identifier']),
    'total_amount' => $query->func()->sum('Orders.order_amount'),
    'total_profit' => $query->func()->sum('Orders.profit'),
])
->having('year is not null')
->having('total_amount is not null')
->having('total_profit is not null')
->having(['year'=> $target_year])
->group(['year(delivery_date)','month(delivery_date)'])
->order(['year' => 'ASC'])
->order(['month' => 'ASC']);

$data_amount = "";
$data_profit = "";

//配列に変換
$results = $query->toArray();

for ($i = 1; $i < 13; $i++){
    $Flg = false;

    //$queryが該当月のデータを持っているか確認
    foreach ($results as $key => $value){

        if($value['year'] == $target_year &&
        $value['month'] == $i)
        {
            //該当データ あり
            $data_amount = $data_amount."['".(string)$value['year']."-".(string)$value['month']."',".(string)$value['total_amount']."],";
            $data_profit = $data_profit."['".(string)$value['year']."-".(string)$value['month']."',".(string)$value['total_profit']."],";

            $Flg = true;

            break;
        }
    }

    if($Flg == false)
    {
        //該当データ 無しと判断
        $data_amount = $data_amount."['".(string)$target_year."-".(string)$i."',0],";
        $data_profit = $data_profit."['".(string)$target_year."-".(string)$i."',0],";
    }
}

$data_amount = "[".mb_substr($data_amount, 0, mb_strlen($data_amount) - 1)."]";
$data_profit = "[".mb_substr($data_profit, 0, mb_strlen($data_profit) - 1)."]";

$data = "[".$data_amount.",".$data_profit."]";

$this->set('MinDate',(string)$target_year.'-01-01');
$this->set('MaxDate',(string)$target_year.'-12-01');
$this->set('data',$data);
$this->set('target_year',$target_year);
}

    public function makepdf ()
    {
    //     $this->loadComponent('RequestHandler');
    //     $this->layout = false;
    //     $this->RequestHandler->respondAs('pdf', [
    //       // Force download
    //       'attachment' => true,
    //       'charset' => 'UTF-8'
    //   ]);

        //$payment = $this->Payments->get($id);
        // $payment = 5000;
        // $this->set(compact('payment'));
        $this->response->type('pdf');
        $this->response->charset('UTF-8');
        //$this->response->download('receipt.pdf');
        // $this->layout = false;
        $this->viewBuilder()->layout(false);

    }


}
