<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 */
class MessagesController extends AppController
{
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['chat','add']);
    }
    
    /**
     * Chat method
     *
     * @return \Cake\Network\Response|null
     */

    public function chat(){

        $operators = TableRegistry::get('Users')->find('all',
            ['conditions'=>['Users.role'=>'operator']]
        )->select('id')
        ->toArray();

        $index = rand(0, count($operators) - 1);

        $operator = 
            TableRegistry::get('Users')->find('all',
                [
                    'conditions'=>['Users.role'=>'operator','Users.id' => $operators[$index]->id]
                ]
            )->first();

        $messages = TableRegistry::get('Messages')->find('all',
            ['conditions'=>[
                    'token'=>$this->request->query['token'],
                    'operator_id'=>$operator->id
                ]
            ]
        )->order(['Messages.created'=>'ASC']);

        $this->set('operator',$operator);
        $this->set('messages',$messages);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $msg = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $data = [];
            $data['message'] = strip_tags(@$this->request->data['message']);
            $data['operator_id'] = @$this->request->data['operator_id']; 
            $data['sender_ip'] =  $this->request->clientIp();
            $data['token'] = @$this->request->data['token'];
            $data['author'] = 'user';
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
