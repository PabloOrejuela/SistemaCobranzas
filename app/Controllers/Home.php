<?php

namespace App\Controllers;

class Home extends BaseController{
    
    public function index($mensaje = ''){
        $data['mensaje'] = $mensaje;
        //echo '<pre>'.var_export($usuario, true).'</pre>';exit;
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

            $usuario = $this->usuarioModel->_verifica($data);
            if ($usuario != 0) {
                //valido el login y pongo el id en sesion
                $sessiondata = [
                    'logged_in' => 1,
                ];

                $user = [
                    'logged' => 1
                ];
                
                $this->usuarioModel->update($usuario, $user);

                $this->session->set($sessiondata);

                return redirect()->to('/inicio');
            }else{
                return redirect()->to('/', 0);
            }
        }
        
    }

    public function inicio(){

        $data['idusuario'] = $this->session->idusuario;

        $data['version'] = $this->system_version;
        $data['title']='Inicio';
        $data['main_content']='inicio';
        return view('includes/template', $data);
    }
}
