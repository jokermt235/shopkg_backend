<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Visitors Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class VisitorsController extends AppController{
    
     public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        if($this->isAdmin()){
            $this->viewBuilder()->layout('adm_home');
        }else{
            return $this->redirect(['controller'=>'Products','action'=>'index']);
        }
    }
    
    public function index(){
        $visitors = $this->paginate(TableRegistry::get('Visitors')->find('all')->order(['created'=>'DESC']));
        $this->set(compact('visitors'));
        
        $this->set('paging', $this->request->params['paging']);
        
        $this->set('_serialize', ['visitors']);
    }
    
    public function delete($id=null){
        $this->request->allowMethod(['post', 'delete']);
        $visitor = TableRegistry::get('Visitors')->get($id);
        if (TableRegistry::get('Visitors')->delete($visitor)) {
            $this->Flash->success(__('The Vistor has been deleted!'));
        } else {
            $this->Flash->error(__('The Product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
   
}
