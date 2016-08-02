<?php
// src/Model/Table/ProfilesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class JobsTable extends Table{



    public function initialize(array $config){

        $this->belongsTo('Companes', [
          'foreignKey' => 'company_id',
        ]);

    }
    public function validationDefault(Validator $validator)
    {
        return $validator
                ->notEmpty('job_title', 'Please fill this field')
                ->notEmpty('short_description', 'Please fill this field')
                ->notEmpty('application_url', 'Please fill this field')
                ->notEmpty('location', 'Please fill this field');


    }
}
