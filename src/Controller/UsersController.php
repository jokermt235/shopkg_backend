<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Login method
     *
     * @return \Cake\Network\Response|null
     */


    public function beforeFilter(Event $event){

        parent::beforeFilter($event);
        $this->Auth->allow('register');
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    public function login(){
        if($this->request->is('POST')){
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if($user['role'] == 'admin'){
                    return $this->redirect(['controller'=>'Admins','action'=>'index']);
                }
                return $this->redirect(['controller'=>'Products','action'=>'index']);
            }
            
            $this->Flash->error(__('Wrong username or password!!!'));
            $this->viewBuilder()->layout('login');

        }else{
            $this->viewBuilder()->layout('login');
        }
    }

     public function register(){
         $this->viewBuilder()->layout('register');
         $user = $this->Users->newEntity();
         if($this->request->is('post')){
            
            if($this->request->data['role'] == 'admin'){
                $this->request->data['role'] = 'user';
            }

            $user = $this->Users->patchEntity($user, $this->request->data);
            $username = $this->Users->findByUsername($this->request->data['username'])->first();
            $email = $this->Users->findByEmail($this->request->data['email'])->first();
 
            if(!empty($username)){
                $this->Flash->error(
                    __(sprintf("The username '%s' is already exists!",$username->username))
                );
                return;
            }

            if(!empty($email)){
                $this->Flash->error(__(sprintf("The email '%s' is already exists!",$email->email)));
                return;
            }

            if($this->request->data['password'] == $this->request->data['ret_password']){
                $register = false;
            }else{
                $this->Flash->error(__("The passwords do not match!"));
                return;
            }

            $user->token = md5(time());
            $user->password = (new DefaultPasswordHasher)->hash($user->password);
            if($this->Users->save($user)){
                $this->Auth->setUser($user);       
                return $this->redirect(['controller'=>'Products','action' => 'index']);
            }else{
                $this->Flash->error(__('The registration failed!'));
            }
        }

        if ($this->Auth->user()) {
            return $this->redirect(['controller'=>'Products','action'=>'index']);
        }

     }
}
