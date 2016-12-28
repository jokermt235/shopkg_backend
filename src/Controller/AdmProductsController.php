<?php
namespace App\Controller;

use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * AdmProducts Controller
 *
 * @property \App\Model\Table\AdmProductsTable $AdmProducts
 */
class AdmProductsController extends AppController
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
        $products = $this->paginate(TableRegistry::get('Products')->find('all'));
        $product_types = TableRegistry::get('ProductTypes')->find('all');
        foreach($products as $product){
            $product->product_type = TableRegistry::get('ProductTypes')->get($product->product_type_id,[
            'contain'=>[]])->name;
        }
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Adm Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admProduct = TableRegistry::get('Products')->get($id, [
            'contain' => []
        ]);

        $this->set('admProduct', $admProduct);
        $this->set('_serialize', ['admProduct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admProduct = TableRegistry::get('Products')->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['images'] = base64_encode($this->request->data['upload_images']);
            $admProduct = TableRegistry::get('Products')->patchEntity($admProduct, $this->request->data);
            if (TableRegistry::get('Products')->save($admProduct)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        
        $this->set('product_types', TableRegistry::get('ProductTypes')->find('list'));

        $this->set(compact('admProduct'));
        $this->set('_serialize', ['admProduct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admProduct = TableRegistry::get('Products')->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['images'] = base64_encode($this->request->data['upload_images']);
            $admProduct = TableRegistry::get('Products')->patchEntity($admProduct, $this->request->data);
            if (TableRegistry::get('Products')->save($admProduct)) {
                $this->Flash->success(__('The Product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Product could not be saved. Please, try again.'));
            }
        }
        
        $this->set('product_types', TableRegistry::get('ProductTypes')->find('all'));

        $this->set(compact('admProduct'));
        $this->set('_serialize', ['admProduct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admProduct = TableRegistry::get('Products')->get($id);
        $images = json_decode(base64_decode($admProduct->images));
        if (TableRegistry::get('Products')->delete($admProduct)) {
            if(!empty($images)){
                foreach($images as $image){
                    unlink(Configure::read('Images.image_path').$image);
                }
            }
        } else {
            $this->Flash->error(__('The Product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function upload(){
        $this->viewBuilder()->layout('ajax');
        $imageUrl = $this->Image->upload($this->request->data);
        $this->set('image',$imageUrl);
    }


    public function deleteImage(){
        $this->Image->delete($this->request->data['image']);
    }

}
