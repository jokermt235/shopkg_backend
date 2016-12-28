<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Shopbags Controller
 *
 * @property \App\Model\Table\ShopbagsTable $Shopbags
 */
class ShopbagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function beforeRender(Event $event){
        parent::beforeRender($event);
        $productTypes = TableRegistry::get('ProductTypes');
        $product_types = $productTypes->find('all');
        foreach($product_types as $product_type){
            $count = TableRegistry::get('Products')->find('all',
                ['conditions' => ['Products.product_type_id' =>$product_type->id]]
            )->count();
            $product_type->count = $count;
        }
        
        if($this->Auth->user()){
            $user = $this->Auth->user();
            $shopbag_count = $this->Shopbags->find('all',[
                'conditions' => ['Shopbags.user_id'=>$user['id']]
            ])->count();

            $this->set(compact('shopbag_count'));
        }

        $this->set(compact('product_types'));    
    }

    public function index()
    {
        if($this->Auth->user()){
            $user = $this->Auth->user();
            $shopbags = $this->paginate(
                $this->Shopbags->find('all',
                    [
                        'conditions'=>['user_id' => $user['id']]
                    ]
                )
            );

            $products = TableRegistry::get('Products');           

            foreach($shopbags as $shopbag){
                $shopbag->product = $products->find('all',
                    [
                        'conditions'=>['id'=>$shopbag->product_id]
                    ]
                )->first();
            }
            
            $this->set(compact('shopbags'));
            
            $this->set('_serialize', ['shopbags']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Shopbag id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shopbag = $this->Shopbags->get($id, [
            'contain' => []
        ]);

        $this->set('shopbag', $shopbag);
        $this->set('_serialize', ['shopbag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shopbag = $this->Shopbags->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Auth->user();   
            $this->request->data['user_id'] = $user['id'];
            $shopbag = $this->Shopbags->patchEntity($shopbag, $this->request->data);
            if ($this->Shopbags->save($shopbag)) {
            }
        }
        $this->set(compact('shopbag'));
        $this->set('_serialize', ['shopbag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shopbag id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shopbag = $this->Shopbags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shopbag = $this->Shopbags->patchEntity($shopbag, $this->request->data);
            if ($this->Shopbags->save($shopbag)) {
                $this->Flash->success(__('The shopbag has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The shopbag could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shopbag'));
        $this->set('_serialize', ['shopbag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shopbag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shopbag = $this->Shopbags->get($id);
        if ($this->Shopbags->delete($shopbag)) {
            $this->Flash->success(__('The shopbag has been deleted.'));
        } else {
            $this->Flash->error(__('The shopbag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
