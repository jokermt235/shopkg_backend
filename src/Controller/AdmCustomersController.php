<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\UsersTable $Customers
 */
class AdmCustomersController extends AppController{
    
     public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        if($this->isAdmin()){
            $this->viewBuilder()->layout('adm_home');
        }else{
            return $this->redirect(['controller'=>'Products','action'=>'index']);
        }
    }
    
    public function index(){
        $customers = $this->paginate(TableRegistry::get('Customers')->find('all')->order(['created'=>'DESC']));
        $this->set(compact('customers'));
        
        $this->set('paging', $this->request->params['paging']);
        
        $this->set('_serialize', ['customers']);
    }
    
    public function add(){
         $admCustomer = TableRegistry::get('Customers')->newEntity();
        if ($this->request->is('post')) {
            $admCustomer = TableRegistry::get('Customers')->patchEntity($admCustomer, $this->request->data);
            if (TableRegistry::get('Customers')->save($admCustomer)) {
                $this->Flash->success(__('The adm Customer type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The adm Customer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('admCustomer'));
        $this->set('_serialize', ['admCustomer']);
    }
    
    public function edit($id=null){
    }
    
    public function delete($id=null){
        $this->request->allowMethod(['post', 'delete']);
        $admCustomer = TableRegistry::get('Customers')->get($id);
        if (TableRegistry::get('Customers')->delete($admCustomer)) {
            $this->Flash->success(__('The adm Customer type has been deleted.'));
        } else {
            $this->Flash->error(__('The adm Customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}