<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\I18n\I18n;
use Cake\Filesystem\File;


class AdminsController extends AppController
{
    public $paginate = [
        'Users' => [
            'limit' => 10,
        ],
    ];
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->loadModel('Users');
        $this->loadComponent('Paginator');
        $this->viewBuilder()->layout('admin_layot');
        I18n::locale('en-US');
//        $this->loadComponent('Csrf');
//        $this->Auth->allow(['edit']);
    }
    
    public function index(){

    }
    
    public function users(){
        
        $users = $this->paginate($this->Users->find('all')
                                            ->select($this->Users )
                                            ->where(['Users.role !=' => 'superuser']));
        
        $this->set('title_for_layout_include', 'Admin Area Users list');

        $this->set('users', $users);
    }
    
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $entity = $this->Users->get($id, [
            'contain' => ['Profiles','Files']
        ]);
        
        if(!empty($entity['files'])){
            foreach ($entity['files'] as $value){
                $this->Files->delete($value);
                if(file_exists(WWW_ROOT.'system'.DS.'documents'.DS.$value['file_path'])){
                    unlink(WWW_ROOT.'system'.DS.'documents'.DS.$value['file_path']);
                }
            }    
        }
        
        if(!empty($entity['profile']['image_path']) && file_exists(WWW_ROOT.'system'.DS.'uploads'.DS.$entity['profile']['image_path'])){
            unlink(WWW_ROOT.'system'.DS.'uploads'.DS.$entity['profile']['image_path']);
        }
        
        if ($this->Users->delete($entity) && $this->Profiles->delete($entity['profile'])) {
            $this->Flash->success(__d('Users', 'The user has been deleted'));
        } else {
            $this->Flash->error(__d('Users', 'The user could not be deleted'));
        }
        return $this->redirect(['action' => 'users']);
    }
    
    public function approveUser($id = null){
        $entity = $this->Users->get($id, [
            'contain' => []
        ]);
        $entity->approved = '1';
        if ($this->Users->save($entity)) {
            $this->Flash->success(__d('Users', 'The user has been Approved'));
        } else {
            $this->Flash->error(__d('Users', 'The user could not be approved'));
        }
        return $this->redirect(['action' => 'users']);
    }
    
    public function decilneUser($id = null){
        $entity = $this->Users->get($id, [
            'contain' => []
        ]);
        $entity->approved = '0';
        if ($this->Users->save($entity)) {
            $this->Flash->success(__d('Users', 'The user has been Declined'));
        } else {
            $this->Flash->error(__d('Users', 'The user could not be declined'));
        }
        return $this->redirect(['action' => 'users']);
    }
    
    public function viewUser($id = null){
        $entity = $this->Users->get($id);
        $file = [];
        if (!empty($entity->files)) {
            foreach ($entity->files as $key => $value) {
                $file[$value->file_type][$value->id] = $value;
            }
        }
        $this->set('file', $file);
        $this->set('user', $entity);
    }
    
    public function approveFile(){
         if($this->request->is(['ajax'])){
            $this->loadModel('Files');
            $entity = $this->Files->get($this->request->data['id']);
            $entity->approved = 1;
            $result = $this->Files->save($entity);
            if ($result) {
                $status['success'] = True; 
                $this->response->body(json_encode($status));
                return $this->response;
            }   
        }
    }
    public function download($filename=null) {

        $file = $this->response->file(
           WWW_ROOT.'/system'.DS.'documents/'.$filename,
            ['download' => true, 'name' => $filename]
        );
    }
    
}
