<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CompanesTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
                ->add('comapny_name', [
                    'unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => 'Company alredy exist',
                    ],
                    'notEmpty' =>[
                        'rule' => 'notBlank',
                        'message' => 'Please fill this field',
                    ]
                ])
                ->notEmpty('headline', 'Please fill this field')
                ->notEmpty('location', 'Please fill this field')
                ->notEmpty('employer', 'Please fill this field')
                ->notEmpty('founded', 'Please fill this field')
                ->notEmpty('phone_number', 'Please fill this field')
                ->add('phone_number', 'validFormat', [
                    'rule' => 'numeric',
                    'message' => 'Invalid phone number'
                ])
                ->add('email_address', 'validFormat', [
                    'rule' => 'email',
                    'message' => 'E-mail must be valid'
                ])
                ->notEmpty('summernote_editor', 'Please fill this field');


    }
     public function initialize(array $config){

        $this->belongsTo('Categores', [
          'foreignKey' => 'categores_id',
        ]);

        $this->belongsTo('Jobs', [
          'foreignKey' => 'company_id',
        ]);
        }
}



 ?>