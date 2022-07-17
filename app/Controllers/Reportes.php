<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reportes extends BaseController {
    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['lista_usuarios'] = $this->usuarioModel->findAll();

            $data['version'] = $this->system_version;
            $data['title']='Usuarios';
            $data['main_content']='reportes/lista_usuarios_reportes';
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
