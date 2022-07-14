<?php

namespace App\Controllers;

class Home extends BaseController{
    
    public function index($message = NULL){
        $data['mensaje'] = $this->request->getPostGet('message');

        $data['version'] = $this->system_version;
        $data['title']='Acceso al sistema:';
        $data['main_content']='login';
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

                return redirect()->to('/inicio');
            }else{

                return redirect()->to('/');
            }
        }
        
    }

    public function inicio(){

        $data['idrol'] = $this->session->idrol;

        $data['version'] = $this->system_version;
        $data['title']='Inicio';
        $data['main_content']='inicio';
        return view('includes/template', $data);
    }
}
