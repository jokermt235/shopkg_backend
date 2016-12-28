<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * AdmProductTypes Controller
 *
 * @property \App\Model\Table\AdmProductTypesTable $AdmProductTypes
 */
class AdmProductTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
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
        $product_types = TableRegistry::get('ProductTypes');
        $product_types = $this->paginate($product_types->find('all'));
        $this->set(compact('product_types'));
        $this->set('_serialize', ['product_types']);
    }

    /**
     * View method
     *
     * @param string|null $id Adm Product Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admProductType = TableRegistry::get('ProductTypes')->get($id, [
            'contain' => []
        ]);

        $this->set('admProductType', $admProductType);
        $this->set('_serialize', ['admProductType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admProductType = TableRegistry::get('ProductTypes')->newEntity();
        if ($this->request->is('post')) {
            $admProductType = TableRegistry::get('ProductTypes')->patchEntity($admProductType, $this->request->data);
            if (TableRegistry::get('ProductTypes')->save($admProductType)) {
                $this->Flash->success(__('The adm product type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The adm product type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('admProductType'));
        $this->set('_serialize', ['admProductType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm Product Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admProductType = TableRegistry::get('ProductTypes')->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admProductType = TableRegistry::get('ProductTypes')->patchEntity($admProductType, $this->request->data);
            if (TableRegistry::get('ProductTypes')->save($admProductType)) {
                $this->Flash->success(__('The adm product type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The adm product type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('admProductType'));
        $this->set('_serialize', ['admProductType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm Product Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admProductType = TableRegistry::get('ProductTypes')->get($id);
        if (TableRegistry::get('ProductTypes')->delete($admProductType)) {
            $this->Flash->success(__('The adm product type has been deleted.'));
        } else {
            $this->Flash->error(__('The adm product type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
