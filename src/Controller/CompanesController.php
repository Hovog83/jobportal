<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class CompanesController   extends AppController
{
     public function addCompany() {
        $company_profile = $this->Companes->newEntity();
        if ($this->request->is('post')) {
        $data = $this->request->data();
        
        $company_profile = $this->Companes->patchEntity($company_profile,$data);

        $company_profile['owner_id'] = $this->Auth->user('id');
        $company_profile['profile_url'] = json_encode($data['profile_url']);
        if(!empty($data['Company_profile'])){

            $company_profile['cover'] = $this->_imageUpload($data['Company_profile']['cover']);
            $company_profile['logo'] = $this->_imageUpload($data['Company_profile']['logo']);

        }
// echo "<pre>";
// print_r($company_profile);die;
        if($this->Companes->save($company_profile)){
                return $this->redirect('/');
            }
        }
        // $company_profile['profile_url'] = get_object_vars(json_decode($company_profile['profile_url']));
        // echo "<pre>";
        // print_r($company_profile);die;
        $this->set(compact('company_profile'));

        }
      protected function _imageUpload($data) {
        if(!empty($data)){

            return $this->Upload->image($data);

            }
        }
// $this->redirect($this->referer());
    public function editCompanes($id){
          $data = $this->Companes->find()->where(['company_id' => $id])->andwhere(['owner_id' => $this->Auth->user('id')])->first();
          if(!empty($data)){
            $data['profile_url'] = json_decode($data['profile_url']);
            $company_profile = $this->Companes->newEntity();
            if($this->request->is('post')){
                  $dataForSave = $this->request->data['company_profile'];
                  if($dataForSave['comapny_name'] == $data->comapny_name){
                      unset($dataForSave['comapny_name']);
                  }
                  
                  $dataForSave['Company_profile'] = $this->request->data['Company_profile'];
                  $company_profile =  $this->Companes->newEntity();
                  $company_profile = $this->Companes->patchEntity($company_profile,$dataForSave);

                  $company_profile['company_id'] = $data->company_id;
                  $company_profile['profile_url'] = json_encode($this->request->data['profile_url']);
                  $company_profile['owner_id'] = $this->Auth->user('id');
                  $company_profile['cover'] = $data->cover;
                  $company_profile['logo'] = $data->logo;
                  
                  if(!empty($dataForSave['Company_profile']['logo']['name'])){
                      if (file_exists(WWW_ROOT.'system'.DS.'uploads'.DS.$data['logo'])) {
                              unlink(WWW_ROOT.'system'.DS.'uploads'.DS.$data['logo']);
                      }
                      $company_profile['logo'] = $this->_imageUpload($dataForSave['Company_profile']['logo']);                     
                  }

                  if (!empty($dataForSave['logoDeleted'])) {
                        $company_profile['logo'] = null;
                        if (file_exists(WWW_ROOT.'system'.DS.'uploads'.DS.$data['logo'])) {
                              unlink(WWW_ROOT.'system'.DS.'uploads'.DS.$data['logo']);
                      }
                      
                  }

                  if(!empty($dataForSave['Company_profile']['cover']['name'])){
                      if (file_exists(WWW_ROOT.'system'.DS.'uploads'.DS.$data['cover'])) {
                              unlink(WWW_ROOT.'system'.DS.'uploads'.DS.$data['cover']);
                      }
                      $company_profile['cover'] = $this->_imageUpload($dataForSave['Company_profile']['cover']);                     
                  }
                  if($this->Companes->save($company_profile)){
                      $this->Flash->success(__('Comapny updated secssesfuly'));
                      $this->redirect($this->referer());
                  }else{
                      $this->Flash->error(__('Comapny updated secssesfuly'));

                  }
                }
            $this->request->data['profile_url'] = get_object_vars($data['profile_url']);
            $this->request->data['company_profile'] = $data;

            $this->set(compact('data'));
            $this->set(compact('company_profile'));
          }else{
            $this->redirect($this->referer());
            
          }
    }

    public function manageCompanes($owner_id){
        $this->set('title_for_layout_include', 'Manage Companies');
        if(!empty($owner_id)){
            $companes = $this->Companes->find()
                                       ->select($this->Companes)
                                       ->select($this->Categores)
                                       ->where(['Companes.owner_id' => $owner_id])
                                       ->contain(['Categores'])
                                       ->toArray();

        foreach ($companes as $key => $value) {
             $companes[$key]['Jobs'] = $this->Jobs->find()->where(['Jobs.company_id'=>$value->company_id])->count(); 
        }
           $this->set(compact('companes'));
        }
    }

    public function companyDetail($comp_id){
      
     $company =  $this->Companes->find()
                      ->select($this->Companes)
                      ->select($this->Jobs)
                      ->where(['Companes.company_id' => $comp_id])
                      ->join([
                          'Jobs'=> [
                            'table' => 'Jobs',
                            'conditions' => 'Jobs.company_id = Companes.company_id' 
                          ]
                        ])
                      ->order(['created' => 'DESC'])
                      // ->first()
                      ->toArray();
                      // echo "<pre>";
                      // print_r($company);die;
        $this->set(compact('company'));
    }

    public function addJob(){
      $job = $this->Jobs->newEntity();
      $this->set(compact('job'));
    }

    public function locationAjax($value=''){
                      $status['success'] = True; 
                $this->response->body(json_encode($status));
                return $this->response;
    }


    
}
