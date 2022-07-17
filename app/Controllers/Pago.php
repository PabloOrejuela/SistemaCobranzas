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
            $this->logout();
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
            $this->logout();
        }
    }

    public function insertPago(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $registro = array(
                'abono' => $this->request->getPostGet('abono'),
                'idmetodo_pago' => $this->request->getPostGet('idmetodo_pago'),
                'idcartera' => $this->request->getPostGet('idcartera'),
                'documento' => $this->request->getPostGet('documento'),
            );

            $this->validation->setRuleGroup('pago');
        
            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{
                $registro['idusuario'] = $this->session->idusuario;
                //echo '<pre>'.var_export($data, true).'</pre>';
                $r = $this->pagoModel->save($registro);
                echo '<pre>'.var_export($r, true).'</pre>';
                return redirect()->to('/cobros');
            }
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
