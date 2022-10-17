<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cartera extends BaseController{

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;

        if ($data['logged_in'] == 1) {

            if ($this->session->idempresa) {
                $data['idempresa'] = $this->session->idempresa;
                $data['cartera'] = $this->carteraModel->_getDataTableCartera($data['idempresa']);
                $data['version'] = $this->system_version;
                $data['title']='Cartera';
                $data['main_content']='cartera/lista_cartera';
                return view('includes/template', $data);
            }else{
                return redirect()->to('/inicio');
            }
        }else{
            $this->logout();
        }
    }

    public function lista_cartera(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;

        if ($data['logged_in'] == 1) {
            
            $data['idempresa'] = $this->request->getPostGet('idempresa');

            $sessiondata = ['idempresa' => $data['idempresa']];
            $this->session->set($sessiondata);
            $this->idempresa = $data['idempresa'];
            
            $data['cartera'] = $this->carteraModel->_getDataTableCartera($data['idempresa']);
            //$data['abonos'] = $this->pagoModel->_getSumaPago(745);
            //echo '<pre>'.var_export($data['abonos'], true).'</pre>';exit;

            $data['version'] = $this->system_version;
            $data['title']='Cartera';
            $data['main_content']='cartera/lista_cartera';
            return view('includes/template', $data);
        }else{
            $this->logout();
        }
    }

    public function frm_subir_excel(){
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;

        if ($data['logged_in'] == 1) {
            $data['idempresa'] = $this->session->idempresa;
            $data['version'] = $this->system_version;
            $data['empresas'] = $this->empresaModel->findAll();
            $data['title']='Cartera';
            $data['main_content']='cartera/frm_subirExcel';
            return view('includes/template', $data);
        }else{
            $this->logout();
        }
    }

    public function getExcel(){
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
                //echo '<pre>'.var_export($filas[1], true).'</pre>';exit;
                foreach ($filas as $key => $fila) {
                    if ($key != 0) {
                        $datos = explode(";", $fila);
                        
                        //Base Alangasi
                        /*

                        if ($datos[6] == 'SOLTERO') {
                            $idestado_civil = 1;
                        }else if ($datos[6] == 'CASADO') {
                            $idestado_civil = 2;
                        }else if ($datos[6] == 'DIVORCIADO') {
                            $idestado_civil = 3;
                        }else{
                            $idestado_civil = 4;
                        }

                        $cliente = array(
                            'nombre' => trim($datos[4]),
                            'cedula' => trim($datos[3]),
                            'idestado_civil' => $idestado_civil,
                            'calificacion' => trim($datos[18]),
                            'direccion' => trim($datos[30]),
                            'dir_trabajo' => trim($datos[31]),
                            'telefono_domicilio' => trim($datos[32]),
                            'telefono_trabajo' => trim($datos[33]),
                        );
                        $exist = $this->clienteModel->_getClienteId($cliente['cedula']);

                        if ($exist == 0) {
                            $this->clienteModel->save($cliente);
                            $idcliente = $this->db->insertID();
                            $registro = array(
                                'idcliente' => $idcliente,
                                'credito' => $datos[5],
                                'fecha_emision' => $datos[9],
                                'fecha_culminacion' => $datos[10],
                                'saldo_fecha' => $datos[19],
                                'valor_cuota' => $datos[20],
                                'cuotas_cancelar' => $datos[21],
                                'cuotas_canceladas' => $datos[22],
                                'tasa_interes' => $datos[14],
                                'tasa_mora' => $datos[15],
                                'subtotal' => $datos[55],
                                'comision' => $datos[56],
                                'coactiva' => $datos[57],
                                'total' => $datos[58],
                                'idempresa' => $idempresa
                            );
                            $this->carteraModel->save($registro);
                        }else{
                            $idcliente = $exist;
                            $registro = array(
                                'idcliente' => $idcliente,
                                'credito' => $datos[5],
                                'fecha_emision' => $datos[9],
                                'fecha_culminacion' => $datos[10],
                                'saldo_fecha' => $datos[19],
                                'valor_cuota' => $datos[20],
                                'cuotas_cancelar' => $datos[21],
                                'cuotas_canceladas' => $datos[22],
                                'tasa_interes' => $datos[14],
                                'tasa_mora' => $datos[15],
                                'subtotal' => $datos[55],
                                'comision' => $datos[56],
                                'coactiva' => $datos[57],
                                'total' => $datos[58],
                                'idempresa' => $idempresa
                            );
                            $this->carteraModel->save($registro);
                        }
                        

                        //Base Don Bosco

                        if ($datos[2] == 'SOLTERO') {
                            $idestado_civil = 1;
                        }else if ($datos[2] == 'CASADO') {
                            $idestado_civil = 2;
                        }else if ($datos[2] == 'DIVORCIADO') {
                            $idestado_civil = 3;
                        }else{
                            $idestado_civil = 4;
                        }
                        
                        $cliente = array(
                            'nombre' => trim($datos[1]),
                            'cedula' => trim($datos[0]),
                            'idestado_civil' => $idestado_civil,
                            'calificacion' => trim($datos[7]),
                            'direccion' => 'N/A',
                            'dir_trabajo' => 'N/A',
                            'telefono_domicilio' => 'N/A',
                            'telefono_trabajo' => 'N/A',
                        );
                        //pablo podria traer todo el objeto y verificar el crédito y si es null poner 1, si es 1 poner 2, etc
                        $exist = $this->clienteModel->_getClienteId($cliente['cedula']);
                        //echo '<pre>'.var_export($exist, true).'</pre>';exit;
                        if ($exist == 0) {
                            $this->clienteModel->save($cliente);
                            $idcliente = $this->db->insertID();
                            $registro = array(
                                'idcliente' => $idcliente,
                                'credito' => $datos[3],
                                'fecha_emision' => $datos[6],
                                'fecha_culminacion' => $datos[8],
                                'saldo_fecha' => $datos[21],
                                'valor_cuota' => $datos[15],
                                'cuotas_cancelar' => $datos[11],
                                'cuotas_canceladas' => $datos[12],
                                'tasa_interes' => $datos[17],
                                'tasa_mora' => $datos[18],
                                'subtotal' => $datos[33],
                                'comision' => $datos[34],
                                'coactiva' => $datos[36],
                                'total' => $datos[37],
                                'idempresa' => $idempresa
                            );
                            $this->carteraModel->save($registro);
                        }else{
                            $idcliente = $exist;
                            $registro = array(
                                'idcliente' => $idcliente,
                                'credito' => $datos[3],
                                'fecha_emision' => $datos[6],
                                'fecha_culminacion' => $datos[8],
                                'saldo_fecha' => $datos[21],
                                'valor_cuota' => $datos[15],
                                'cuotas_cancelar' => $datos[11],
                                'cuotas_canceladas' => $datos[12],
                                'tasa_interes' => $datos[17],
                                'tasa_mora' => $datos[18],
                                'subtotal' => $datos[33],
                                'comision' => $datos[34],
                                'coactiva' => $datos[36],
                                'total' => $datos[37],
                                'idempresa' => $idempresa
                            );
                            $this->carteraModel->save($registro);
                        }
                        */

                        //Base Chirijo

                        if ($datos[6] == 'SOLTERO') {
                            $idestado_civil = 1;
                        }else if ($datos[6] == 'CASADO') {
                            $idestado_civil = 2;
                        }else if ($datos[6] == 'DIVORCIADO') {
                            $idestado_civil = 3;
                        }else{
                            $idestado_civil = 4;
                        }
                        
                        $cliente = array(
                            'nombre' => trim($datos[4]),
                            'cedula' => trim($datos[2]),
                            'idestado_civil' => $idestado_civil,
                            'calificacion' => "E",
                            'direccion' => trim($datos[32]),
                            'dir_trabajo' => 'N/A',
                            'telefono_domicilio' => trim($datos[34]),
                            'telefono_trabajo' => 'N/A',
                        );
                        
                        $exist = $this->clienteModel->_getClienteId($cliente['cedula']);
                        //echo '<pre>'.var_export($exist, true).'</pre>';exit;
                        if ($exist == 0) {
                            $this->clienteModel->save($cliente);
                            $idcliente = $this->db->insertID();
                            $registro = array(
                                'idcliente' => $idcliente,
                                'credito' => $datos[3],
                                'fecha_emision' => $datos[7],
                                'fecha_culminacion' => $datos[8],
                                'saldo_fecha' => $datos[19],
                                'valor_cuota' => "0.00",
                                'cuotas_cancelar' => $datos[21],
                                'cuotas_canceladas' => $datos[22],
                                'tasa_interes' => $datos[11],
                                'tasa_mora' => $datos[12],
                                'subtotal' => $datos[50],
                                'comision' => $datos[51],
                                'coactiva' => $datos[52],
                                'total' => $datos[53],
                                'idempresa' => $idempresa
                            );
                            $this->carteraModel->save($registro);
                        }else{
                            $idcliente = $exist;
                            $registro = array(
                                'idcliente' => $idcliente,
                                'credito' => $datos[3],
                                'fecha_emision' => $datos[7],
                                'fecha_culminacion' => $datos[8],
                                'saldo_fecha' => $datos[19],
                                'valor_cuota' => "0.00",
                                'cuotas_cancelar' => $datos[21],
                                'cuotas_canceladas' => $datos[22],
                                'tasa_interes' => $datos[11],
                                'tasa_mora' => $datos[12],
                                'subtotal' => $datos[50],
                                'comision' => $datos[51],
                                'coactiva' => $datos[52],
                                'total' => $datos[53],
                                'idempresa' => $idempresa
                            );
                            $this->carteraModel->save($registro);
                        }
                        

                        //echo '<pre>'.var_export($cliente, true).'</pre>';
                    }
                    
                }       
            return redirect()->to('/cartera');
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
