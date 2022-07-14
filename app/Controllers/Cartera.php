<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cartera extends BaseController{

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        if ($data['logged_in'] == 1) {
            $data['version'] = $this->system_version;
            $data['title']='Cartera';
            $data['main_content']='cartera/lista_cartera';
            return view('includes/template', $data);
        }else{
            $this->session->destroy();
            $user = [
                'logged' => 0
            ];
            
            $this->usuarioModel->update($data['idusuario'], $user);
            return redirect()->to('/');
        }
    }
}
