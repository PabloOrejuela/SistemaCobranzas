<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cliente extends BaseController {

    public function index($idcartera){
        echo 'Cliente';
    }

    public function resumen($idcartera){

        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;

        if ($data['logged_in'] == 1) {
        
            # Traigo todas las visitas que le han hecho y los pagos
            $data['idempresa'] = $this->session->idempresa;
            $data['version'] = $this->system_version;
            $data['cliente'] = $this->clienteModel->_getDataCliente($idcartera);
            $data['seguimiento'] = $this->seguimientoModel->_getDataSeguimiento($idcartera);
            $data['cobros'] = $this->pagoModel->_getDataCobrosCartera($idcartera);
            //echo $this->db->getLastQuery();
            //echo '<pre>'.var_export($data['cliente'], true).'</pre>';exit;

            //echo '<pre>'.var_export($data['cliente'], true).'</pre>';
            $data['title']='Resumen del seguimiento al Cliente';
            $data['main_content']='cliente/resumen_cliente';
            return view('includes/template', $data);

        }else{
            $this->logout();
        }
    }

    public function logout(){
        //destruyo la session  y salgo
        $data['idusuario'] = $this->session->idusuario;
        $this->session->destroy();
        $user = [
            'logged' => 0
        ];
        
        $this->usuarioModel->update($data['idusuario'], $user);
        return redirect()->to('/');
    }
}
