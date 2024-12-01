<?php

namespace App\Controllers;

use App\Models\ImageModel;
class ImageController extends BaseController
{
    
    public function index()
    {
        $session = session();
        if ($session->get('login')) {
            return redirect()->to('login');
        }

        
        if ($session->get('user_type') === 'adm') {
            $model = new ImageModel();
            $data['images'] = $model->orderBy('user_id','asc')->findAll();
    
            return view('image_dashboard', $data);  

        }

        else{
        $model = new ImageModel();
        $data['images'] = $model->where('user_id', $session->get('user_id'))->findAll();

        return view('image_dashboard', $data);
    }
    }

    public function upload()
    {
        
        $session = session();
        $model = new ImageModel();
        $uploadPath = WRITEPATH . '../public/assets';
        if ($imageFile = $this->request->getFile('image')) {
            
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $newName = $imageFile->getRandomName();
                
                $imageFile->move($uploadPath, $newName);

                $model->save([
                    'user_id'  => $session->get('user_id'),
                    'filename' => $newName,
                ]);

                return redirect()->to('/dashboard');
            }
        }
    }

    public function delete($id)
    {
        $model = new ImageModel();
        $model->delete($id);
        return redirect()->to('/dashboard');
    }
}
