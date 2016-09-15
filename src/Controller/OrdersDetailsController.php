<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrdersDetails Controller
 *
 * @property \App\Model\Table\OrdersDetailsTable $OrdersDetails
 */
class OrdersDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'MRecordTypes']
        ];
        $ordersDetails = $this->paginate($this->OrdersDetails);

        $this->set(compact('ordersDetails'));
        $this->set('_serialize', ['ordersDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Orders Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersDetail = $this->OrdersDetails->get($id, [
            'contain' => ['Orders', 'MRecordTypes']
        ]);

        $this->set('ordersDetail', $ordersDetail);
        $this->set('_serialize', ['ordersDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersDetail = $this->OrdersDetails->newEntity();
        if ($this->request->is('post')) {
            $ordersDetail = $this->OrdersDetails->patchEntity($ordersDetail, $this->request->data);
            if ($this->OrdersDetails->save($ordersDetail)) {
                $this->Flash->success(__('The orders detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orders detail could not be saved. Please, try again.'));
            }
        }
        $orders = $this->OrdersDetails->Orders->find('list', ['limit' => 200]);
        $mRecordTypes = $this->OrdersDetails->MRecordTypes->find('list', ['limit' => 200]);
        $this->set(compact('ordersDetail', 'orders', 'mRecordTypes'));
        $this->set('_serialize', ['ordersDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Orders Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordersDetail = $this->OrdersDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersDetail = $this->OrdersDetails->patchEntity($ordersDetail, $this->request->data);
            if ($this->OrdersDetails->save($ordersDetail)) {
                $this->Flash->success(__('The orders detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orders detail could not be saved. Please, try again.'));
            }
        }
        $orders = $this->OrdersDetails->Orders->find('list', ['limit' => 200]);
        $mRecordTypes = $this->OrdersDetails->MRecordTypes->find('list', ['limit' => 200]);
        $this->set(compact('ordersDetail', 'orders', 'mRecordTypes'));
        $this->set('_serialize', ['ordersDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Orders Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersDetail = $this->OrdersDetails->get($id);
        if ($this->OrdersDetails->delete($ordersDetail)) {
            $this->Flash->success(__('The orders detail has been deleted.'));
        } else {
            $this->Flash->error(__('The orders detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
