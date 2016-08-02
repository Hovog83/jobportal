<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;

/*
* Upload component
*/

class UploadComponent extends Component{

    public function image($data){

        if (!empty($data)) {
            $filename = $data['name'];
            $file_tmp_name = $data['tmp_name'];
            $dir = WWW_ROOT.'system'.DS.'uploads';
            $allowed = array('jpg','JPG','png','jpeg');
            if (!in_array(substr ( strrchr ($filename,'.'),1),$allowed)) {
                    return  false;
            }elseif(is_uploaded_file($file_tmp_name)){
                    $namefile = Text::uuid().'-'.$filename;
                    move_uploaded_file($file_tmp_name, $dir.DS.$namefile );
                return $namefile;
            }
        }
    }

    public function doc($data){
        $name = '' ;
        if (!empty($data['name'])) {
            $filename = $data['name'];
            $file_tmp_name = $data['tmp_name'];
            $dir = WWW_ROOT.'system'.DS.'documents';
            $allowed = array('pdf','doc','xsl','xml','docx');
            if (!in_array(substr ( strrchr ($filename,'.'),1),$allowed)) {
                    return false;
            }elseif(is_uploaded_file($file_tmp_name)){
                    $namefile = Text::uuid().'-'.$filename;
                    move_uploaded_file($file_tmp_name, $dir.DS.$namefile);
                    $name = $namefile;
            }
        }

            return $name;
    }
}












 ?>