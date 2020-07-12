<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use App\Models\File;

class UploadController extends Controller
{
    /**
     * Upload   Single image
     * @param  mixed  $data['file_name'] Image name
     * @param mixed @data['path']  image path
     * @param mixed @data['delete_file']  image past path
     * @param mixed @data['upload_type']  single or multi images
     * @param mixed |null $data['new_name'] new image name
     * @param array $crud_type crud type and id to upload image
     *
     * $request, $path, $upload_type='single', $delete_file=null,$new_name=null,$crud_type = []
     *
     *  @return Response
     * */
    public static function upload($data = []){
        // If new name  is null then set time of upload is name of image
        if(in_array('new_name',$data)){
            $data['new_name']= $data['new_name'] === null ? time() : $data['new_name'];
        }

        // If Uploaded request has  image Then delete past one and upload new one
        if(request()->hasFile($data['file_name']) && $data['upload_type'] == 'single'){

            // Delete pervious image
           Storage::has($data['delete_file']) ? Storage::delete($data['delete_file']):'';

            // Return Newm image path
            return request()->file($data['file_name'])->store($data['path']);
        }
    }


//     /**
//      *  Get request file
//      * @param  mixed $file
//      * @param mixed $path
//      * @param mixed $deleted_file
//      *  @return string
//      */
//     public function uploadImage($file,$path,$deleted_file){
//         if(request()->hasFile($file)){
//            $data[$file] = $this->upload([
//                'file_name' => $file,
//                'path' => $path,
//                'upload_type' => 'single',
//                'delete_file' => $deleted_file,
//            ]);
//        }
//    }
}


