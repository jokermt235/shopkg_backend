<?php
namespace App\Controller\Component;

use Cake\Core\Configure;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;


/**
 * Image component
 */
class ImageComponent extends Component
{
    
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    private $image_extensions = ['png','jpg','jpeg','gif','bmp'];


    public function upload($data){
        $fileUrl = '';
        if($data){
            $extension = $this->getImageExtension($data['images']['name']);
            if(in_array($extension, $this->image_extensions)){
                $fileUrl = time().'_'.md5($data['images']['name']).".$extension";
                $move_dir = Configure::read('Images.image_path').$fileUrl;
                move_uploaded_file($data['images']['tmp_name'], $move_dir);
            }
        }

        return $fileUrl;
    }

    private function getImageExtension($uploadfile){
        return substr(strtolower(strrchr($uploadfile, '.')), 1);
    }

    public function delete($image){
       unlink(Configure::read('Images.image_path').$image); 
    }
}
