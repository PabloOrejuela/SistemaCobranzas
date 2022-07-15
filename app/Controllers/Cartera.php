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

            $data['cartera'] = $this->carteraModel->_getDataTableCartera();

            $data['version'] = $this->system_version;
            $data['title']='Cartera';
            $data['main_content']='cartera/lista_cartera';
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
            $data['version'] = $this->system_version;
            $data['title']='Cartera';

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

                        if ($datos[4] == 'SOLTERO') {
                            $idestado_civil = 1;
                        }elseif ($datos[4] == 'CASADO') {
                            $idestado_civil = 2;
                        }elseif ($datos[4] == 'DIVORCIADO') {
                            $idestado_civil = 3;
                        }else{
                            $idestado_civil = 4;
                        }

                        $cliente = array(
                            'nombre' => trim($datos[3]),
                            'cedula' => $datos[2],
                            'idestado_civil' => $idestado_civil,
                            'calificacion' => $datos[16],
                            'direccion' => trim($datos[28]),
                            'dir_trabajo' => trim($datos[29]),
                            'telefono_domicilio' => $datos[30],
                            'telefono_trabajo' => $datos[31],
                        );

                        $this->clienteModel->save($cliente);
                        $idcliente = $this->db->insertID();

                        $registro = array(
                            'idcliente' => $idcliente,
                            'fecha_emision' => $datos[7],
                            'fecha_culminacion' => $datos[8],
                            'saldo_fecha' => $datos[17],
                            'valor_cuota' => $datos[18],
                            'cuotas_cancelar' => $datos[19],
                            'cuotas_canceladas' => $datos[20],
                            'tasa_interes' => $datos[12],
                            'tasa_mora' => $datos[13],
                            'subtotal' => $datos[34],
                            'comision' => $datos[35],
                            'coactiva' => $datos[36],
                            'total' => $datos[37],
                        );
                        $this->carteraModel->save($registro);
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
