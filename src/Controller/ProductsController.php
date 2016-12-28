<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{


    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','view']);
    }

    public function beforeRender(Event $event){
        parent::beforeRender($event);
        $productTypes = TableRegistry::get('ProductTypes');
        $product_types = $productTypes->find('all');
        foreach($product_types as $product_type){
            $count = $this->Products->find('all',
                ['conditions' => ['Products.product_type_id' =>$product_type->id]]
            )->count();
            $product_type->count = $count;
        }
        
        if($this->Auth->user()){
            $user = $this->Auth->user();
            $shopbag_count = TableRegistry::get('Shopbags')->find('all',[
                'conditions' => ['Shopbags.user_id'=>$user['id']]
            ])->count();

            $this->set(compact('shopbag_count'));
        }

        $this->set(compact('product_types'));    
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($product_type_id=null)
    {   
        
        if(empty($product_type_id)){
            if(!empty($this->request->query['search'])){
                $term = $this->request->query['search'];
                $conditions = [
                    'OR'=>[
                        'Products.name LIKE' => "%$term%",
                        'Products.title LIKE' => "%$term%",
                        'Products.descr LIKE' => "%$term%"
                    ]
                ];

                $products = $this->paginate(
                    $this->Products->find('all',[
                        'conditions'=>$conditions
                    ])
                );

            }else{
                $products = $this->paginate($this->Products);
            }
        }else{
            $products = $this->paginate($this->Products->find('all',
                ['conditions'=>['Products.product_type_id'=>$product_type_id]])
            );

            $product_type = TableRegistry::get('ProductTypes')->get($product_type_id,[
                'contain' =>[]
            ]);

            $this->set(compact('product_type'));
        }
        
        $this->set('paging', $this->request->params['paging']);
        $this->set(compact('products'));
        $this->set(compact('offset'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);

        $productTypes = TableRegistry::get('ProductTypes');
        $product_types = $productTypes->find('all',
            ['conditions'=>['ProductTypes.id'=>$product->product_type_id]]
        );

        $product->type = $product_types->first()->name;

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }
    
}
