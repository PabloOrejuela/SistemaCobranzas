<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pago extends BaseController{

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['cartera'] = $this->carteraModel->_getDataTableCartera();

            $data['version'] = $this->system_version;
            $data['title']='Cobros';
            $data['main_content']='cobros/form_cartera';
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

    public function form_pago($idcartera){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['idcartera'] = $idcartera;
            $data['deuda'] = $this->carteraModel->_getDataDeuda($idcartera);

            $data['version'] = $this->system_version;
            $data['title']='Cobros';
            $data['main_content']='cobros/form_pago';
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
