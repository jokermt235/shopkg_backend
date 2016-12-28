<?php
namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 */
class AdminsController extends AppController
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

    public function index(){
    }

    public function users(){
        $users = $this->paginate(TableRegistry::get('Users')->find('all'));
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);       
    }

    public function add(){
        $user = TableRegistry::get('ProductTypes')->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['password'] = 
            (new DefaultPasswordHasher)->hash($this->request->data['password']);
            $this->request->data['token'] = md5(time());
            $user = TableRegistry::get('Users')->patchEntity($user, $this->request->data);
            if (TableRegistry::get('Users')->save($user)) {
                $this->Flash->success(__('The  User has been saved.'));
                return $this->redirect(['controller'=>'Admins','action' => 'users']);
            } else {
                $this->Flash->error(__('The User could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function view($id=null){
        $user = TableRegistry::get('Users')->get($id, 
            ['contain'=>[]
        ]);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id=null){
        
        $user = TableRegistry::get('Users')->get($id, 
            ['contain'=>[]
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!empty($this->request->data['password'])){
                $this->request->data['password'] = 
                (new DefaultPasswordHasher)->hash($this->request->data['password']);
            }else{
                $this->request->data['password']= $user->password;
            }
            $this->request->data['token'] = md5(time());
            $user = TableRegistry::get('Users')->patchEntity($user, $this->request->data);
            if (TableRegistry::get('Users')->save($user)) {
                $this->Flash->success(__('The Product has been saved.'));
                return $this->redirect(['controller'=>'Admins','action' => 'users']);
            } else {
                $this->Flash->error(__('The User could not be saved. Please, try again.'));
            }
        }
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    public function delete($id=null){
        $this->request->allowMethod(['post', 'delete']);
        $user = TableRegistry::get('Users')->get($id);
        if (TableRegistry::get('Users')->delete($user)) {
            $this->Flash->success(__('The User deleted!')); 
        } else {
            $this->Flash->error(__('The Product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Admins','action' => 'users']);
    }
    
}
