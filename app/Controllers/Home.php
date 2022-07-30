<?php

namespace App\Controllers;

class Home extends BaseController{
    
    public function index($message = NULL){
        $this->session->destroy();
        $data['mensaje'] = $this->request->getPostGet('message');

        $data['version'] = $this->system_version;
        $data['title']='Acceso al sistema:';
        $data['main_content']='home/login';
        return view('includes/template_login', $data);
    
    }

    public function validate_credentials(){
        $data = array(
            'user' => $this->request->getPostGet('user'),
            'password' => $this->request->getPostGet('password'),
        );

        $this->validation->setRuleGroup('login');
        
        if (!$this->validation->withRequest($this->request)->run()) {
            //Depuración
            //dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }else{ 

            $usuario = $this->usuarioModel->_getUsuario($data);

            if (isset($usuario) && $usuario != NULL) {
                //valido el login y pongo el id en sesion
                //echo '<pre>'.var_export($usuario, true).'</pre>';
                $sessiondata = [
                    'logged_in' => 1,
                    'idusuario' => $usuario->idusuario,
                    'nombre' => $usuario->nombre,
                    'idrol' => $usuario->idrol,
                    'rol' => $usuario->rol,
                    'administracion' => $usuario->administracion,
                    'cobros' => $usuario->cobros,
                    'reportes' => $usuario->reportes
                ];

                $user = [
                    'logged' => 1
                ];
                
                $this->usuarioModel->update($usuario->idusuario, $user);
                $this->session->set($sessiondata);

                return redirect()->to('inicio');
            }else{

                return redirect()->to('/');
            }
        }
        
    }

    public function inicio(){

        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {
            if ($this->session->idempresa) {
                return redirect()->to('/cartera');
                
            }else{
                $data['idempresa'] = $this->session->idempresa;
                $data['empresas'] = $this->empresaModel->findAll();
                //echo '<pre>'.var_export($data['idempresa'], true).'</pre>';
                $data['version'] = $this->system_version;
                $data['title']='Cartera';
                $data['main_content']='home/frm_cooperativas';
                return view('includes/template', $data);
            }
            
        }else{
            $this->salir();
        }
    }

    public function frm_cooperativas(){

        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['idempresa'] = $this->session->idempresa;
            $data['empresas'] = $this->empresaModel->findAll();
            //echo '<pre>'.var_export($data['idempresa'], true).'</pre>';
            $data['version'] = $this->system_version;
            $data['title']='Cartera';
            $data['main_content']='home/frm_cooperativas';
            return view('includes/template', $data);
            
            
        }else{
            $this->salir();
        }
    }

    public function salir(){
        //destruyo la session  y salgo
        $idusuario = $this->session->idusuario;
        $user = [
            'logged' => 0
        ];
        
        $this->usuarioModel->update($idusuario, $user);
        $this->session->destroy();
        return redirect()->to('/');
    }
}
