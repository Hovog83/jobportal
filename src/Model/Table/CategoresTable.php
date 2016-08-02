<?php
// src/Model/Table/ProfilesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoresTable extends Table{



    public function initialize(array $config){

       $this->hasMany('Companes', [
            'className' => 'Companes',
            ]);

    }

}
