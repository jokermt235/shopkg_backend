<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Operators Controller
 *
 * @property \App\Model\Table\OperatorsTable $Operators
 */
class OperatorsController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Operator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        if($this->isOperator()){
            $this->viewBuilder()->layout('operator_home');
        }else{
            return $this->redirect(['controller'=>'Products','action'=>'index']);
        }
    }

    public function index(){
        $user = $this->Auth->user();
        $messages = $this->paginate(
            TableRegistry::get('Messages')->find('all',['conditions'=>['operator_id'=>$user['id']]])
            ->where(['Messages.id IN (SELECT MAX(id)
                FROM messages
                GROUP BY token)'])
        );

        $this->set(compact('messages'));
        $this->set('_serialize',['message']);
    }

    public function history($token){
        $operator = $this->Auth->user();
        $messages = 
            TableRegistry::get('Messages')->find('all',
                [
                    'conditions'=>[
                        'operator_id'=>$operator['id'],
                        'token' => $token
                    ]
                ]
            )->order(['created'=>'ASC']);
        $this->set(compact('messages'));
        $this->set('_serialize',['messages']);   
    }

    public function add(){
        $this->Messages = TableRegistry::get('Messages');
        $msg = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $data = [];
            $operator = $this->Auth->user();
            $data['message'] = strip_tags(@$this->request->data['message']);
            $data['operator_id'] = $operator['id'];
            $data['sender_ip'] =  $this->request->clientIp();
            $data['token'] = @$this->request->data['token'];
            $data['author'] = 'operator';
            $msg = $this->Messages->patchEntity($msg, $data);
            if ($this->Messages->save($msg)) {
                $message = $data['message'];
                $this->set(compact('message'));
                $this->set('_serialize',['message']);
            } else {
                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
    }
    
}
