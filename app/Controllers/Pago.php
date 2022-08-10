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
            
            $data['cartera'] = $this->carteraModel->_getDataTableCartera($this->session->idempresa);
            $data['idempresa'] = $this->session->idempresa;
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

            $data['idempresa'] = $this->session->idempresa;
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

    public function form_visita($idcartera){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['idempresa'] = $this->session->idempresa;
            $data['idcartera'] = $idcartera;
            $data['deuda'] = $this->carteraModel->_getDataDeuda($idcartera);

            $data['version'] = $this->system_version;
            $data['title']='Registra Visita';
            $data['main_content']='cobros/form_visita';
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
                'fecha_pago' => $this->request->getPostGet('fecha_pago'),            
            );
            //echo '<pre>'.var_export($registro, true).'</pre>';exit;
            $this->validation->setRuleGroup('pago');
        
            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($this->validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{
                $registro['idusuario'] = $this->session->idusuario;
                //echo '<pre>'.var_export($data, true).'</pre>';
                $r = $this->pagoModel->save($registro);
                //echo '<pre>'.var_export($r, true).'</pre>';
                return redirect()->to('/cobros');
            }
        }else{
            $this->logout();
        }
    }

    public function insert_visita(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $registro = array(
                'observacion' => $this->request->getPostGet('observacion'),
                'idcartera' => $this->request->getPostGet('idcartera'),
                'idusuario' => $this->session->idusuario,
            );
            //echo '<pre>'.var_export($registro, true).'</pre>';exit;
            $this->validation->setRuleGroup('visita');
        
            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($this->validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{

                //echo '<pre>'.var_export($registro, true).'</pre>';
                $r = $this->seguimientoModel->save($registro);
                //echo '<pre>'.var_export($r, true).'</pre>';
                return redirect()->to('cobros');
            }
        }else{
            $this->logout();
        }
    }

    public function frm_subir_excel_pagos(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;

        if ($data['logged_in'] == 1) {

            $data['idempresa'] = $this->session->idempresa;
            $data['version'] = $this->system_version;
            $data['empresas'] = $this->empresaModel->findAll();

            $data['title']='Seguimiento y cobros';
            $data['main_content']='cobros/frm_subir_excel_pagos';
            return view('includes/template', $data);
        }else{
            $this->logout();
        }
    }

    public function getExcelPagos(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['idempresa'] = $this->session->idempresa;
            $data['version'] = $this->system_version;
            $data['title']='Cartera';

            $idempresa = $this->request->getPostGet('idempresa');

            $tipo = $_FILES['tablaCartera']['type'];
            $size = $_FILES['tablaCartera']['size'];
            $fileTemp = $_FILES['tablaCartera']['tmp_name'];
            
            $this->validation->setRuleGroup('uploadFile');
        
            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{
                $filas = file($fileTemp);
                $num_registros = count($filas)-1;

                foreach ($filas as $key => $fila) {
                    if ($key != 0) {
                        $datos = explode(";", $fila);
                        
                        $registro = array(
                            'idusuario' => $this->session->idusuario,
                            'nombre' => trim($datos[0]),
                            'cedula' => trim($datos[1]),
                            'abono' => trim($datos[2]),
                            'metodo_pago' => trim($datos[3]),
                            'documento' => trim($datos[4]),
                            'credito' => trim($datos[5]),
                            'observacion' => trim($datos[6]),
                            'fecha_pago' => trim($datos[7]),
                        );

                        if(trim($datos[5]) < 1){
                            $registro['credito'] = 1;
                        }

                        $registro['idcartera'] = $this->carteraModel->_getIdCarteraCedula($registro);
                        //Si es VISITA  
                        if ($registro['metodo_pago'] == 'VISITA') {
                            //echo '<pre>Visita'.var_export($registro, true).'</pre>';
                            $this->seguimientoModel->save($registro);

                        }else  {
                            //echo '<pre>Pago'.var_export($registro, true).'</pre>';
                            $this->pagoModel->save($registro);
                        }
                        //echo '<pre>'.var_export($cliente, true).'</pre>';
                    }
                    
                }     
                return redirect()->to('cobros');
            }
        }else{
            $this->logout();
        }
    }

    public function lista_pagos(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {
            
            $data['pagos'] = $this->pagoModel->_getPagosCooperativaList($this->session->idempresa);
            $data['idempresa'] = $this->session->idempresa;
            $data['version'] = $this->system_version;
            $data['title']='Cobros';
            $data['main_content']='cobros/lista_pagos';
            return view('includes/template', $data);
        }else{
            $this->logout();
        }
    }

    public function editar($idpagos){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['idempresa'] = $this->session->idempresa;
            $data['idpagos'] = $idpagos;
            $data['pago'] = $this->pagoModel->_getDataPago($idpagos);
            //echo '<pre>'.var_export($data['pago'], true).'</pre>';exit;
            $data['version'] = $this->system_version;
            $data['title']='Cobros';
            $data['main_content']='cobros/form_edit_pago';
            return view('includes/template', $data);
        }else{
            $this->logout();
        }
    }
    
    public function actualizar(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $registro = array(
                'idpago' => $this->request->getPostGet('idpago'),
                'abono' => $this->request->getPostGet('abono'),
                'idmetodo_pago' => $this->request->getPostGet('idmetodo_pago'),
                'documento' => $this->request->getPostGet('documento'),
                'fecha_pago' => $this->request->getPostGet('fecha_pago'), 
                'idcartera' => $this->request->getPostGet('idcartera'),            
            );
            //echo '<pre>'.var_export($registro, true).'</pre>';exit;
            $this->validation->setRuleGroup('pago');
        
            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($this->validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{
                $registro['idusuario'] = $this->session->idusuario;
                //echo '<pre>'.var_export($registro, true).'</pre>';exit;
                $r = $this->pagoModel->save($registro);
                //echo $this->db->getLastQuery();
                //echo '<pre>'.var_export($r, true).'</pre>';
                return redirect()->to(site_url().'lista_pagos');
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
