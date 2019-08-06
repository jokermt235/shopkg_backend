<?php
namespace App\Controller;

use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * AdmSales Controller
 *
 * @property \App\Model\Table\AdmSalesTable $AdmSals
 */
class AdmSalesController extends AppController
{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        if($this->isAdmin()){
            $this->viewBuilder()->layout('adm_home');
        }else{
            return $this->redirect(['controller'=>'Products','action'=>'index']);
        }
    }
    
    public function index()
    {
        $sales = $this->paginate(TableRegistry::get('Sales')->find('all'));
        foreach($sales as $sale){
            $sale->product = TableRegistry::get('Products')->get($sale->product_id);
        }
        $this->set(compact('sales'));
        
        $this->set('paging', $this->request->params['paging']);
        
        $this->set('_serialize', ['sales']);
    }
    
    public function add($product_id=null){
        $admSale = TableRegistry::get('Sales')->newEntity();
        if ($this->request->is('post')) {
            $admSale = TableRegistry::get('Sales')->patchEntity($admSale, $this->request->data);
            if (TableRegistry::get('Sales')->save($admSale)) {
                $this->Flash->success(__('The sale has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
            }
        }
        
        $this->set('product', TableRegistry::get('Products')->get($product_id));
        
        $this->set(compact('admSale'));
        $this->set('_serialize', ['admSale']);
    }
    
     public function edit($id=null){
        $admSale = TableRegistry::get('Sales')->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admSale = TableRegistry::get('Sales')->patchEntity($admSale, $this->request->data);
            if (TableRegistry::get('Sales')->save($admSale)) {
                $this->Flash->success(__('The Sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Sale could not be saved. Please, try again.'));
            }
        }
        
        $this->set('product', TableRegistry::get('Products')->get(TableRegistry::get('Sales')->get($id)->product_id));
        
        $this->set(compact('admSale'));
        $this->set('_serialize', ['admSale']);
    }
    
    public function delete($id=null){
        $this->request->allowMethod(['post', 'delete']);
        $admSale = TableRegistry::get('Sales')->get($id);
        if (TableRegistry::get('Sales')->delete($admSale)) {
            $this->Flash->success(__('The Sale has been deleted.'));
        } else {
            $this->Flash->error(__('The Sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
