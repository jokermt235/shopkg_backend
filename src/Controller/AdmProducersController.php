<?php
namespace App\Controller;

use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * AdmProducers Controller
 *
 * @property \App\Model\Table\AdmProducersTable $AdmProducers
 */
class AdmProducersController extends AppController
{
    public $components = ['Image'];

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        if($this->isAdmin()){
            $this->viewBuilder()->layout('adm_home');
        }else{
            return $this->redirect(['controller'=>'Products','action'=>'index']);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */


    public function index()
    {
        $producers = $this->paginate(TableRegistry::get('Producers')->find('all'));
        $this->set(compact('producers'));
        
        $this->set('paging', $this->request->params['paging']);
        
        $this->set('_serialize', ['producers']);
    }

    /**
     * View method
     *
     * @param string|null $id Adm Producer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admProducer = TableRegistry::get('Producers')->get($id, [
            'contain' => []
        ]);

        $this->set('admProducer', $admProducer);
        $this->set('_serialize', ['admProducer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admProducer = TableRegistry::get('Producers')->newEntity();
        if ($this->request->is('post')) {
            $admProducer = TableRegistry::get('Producers')->patchEntity($admProducer, $this->request->data);
            if (TableRegistry::get('Producers')->save($admProducer)) {
                $this->Flash->success(__('The producer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The producer could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('admProducer'));
        $this->set('_serialize', ['admProducer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm Producer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admProducer = TableRegistry::get('Producers')->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admProducer = TableRegistry::get('Producers')->patchEntity($admProducer, $this->request->data);
            if (TableRegistry::get('Producers')->save($admProducer)) {
                $this->Flash->success(__('The Producer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Producer could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('admProducer'));
        $this->set('_serialize', ['admProducer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm Producer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admProducer = TableRegistry::get('Producers')->get($id);
        if (TableRegistry::get('Producers')->delete($admProducer)) {
            $this->Flash->error(__('The Producer has been deleted.'));
        } else {
            $this->Flash->error(__('The Producer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
