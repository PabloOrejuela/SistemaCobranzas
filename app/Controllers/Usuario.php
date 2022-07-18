<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Usuario extends BaseController {

    public function index(){

        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['lista_usuarios'] = $this->usuarioModel->findAll();

            $data['version'] = $this->system_version;
            $data['title']='Usuarios';
            $data['main_content']='usuarios/lista_usuarios';
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

    public function nuevo_usuario(){

        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {


            $data['version'] = $this->system_version;
            $data['title']='Usuarios';
            $data['main_content']='usuarios/frm_nuevo_usuario';
            return view('includes/template', $data);
        }else{
            $this->logout();
        } 
    }

    public function recibe_nuevo_usuario(){

        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data = array(
                'nombre' => $this->request->getPostGet('nombre'),
                'cedula' => $this->request->getPostGet('cedula'),
                'telefono' => $this->request->getPostGet('telefono'),
                'email' => $this->request->getPostGet('email'),
                'direccion' => $this->request->getPostGet('direccion'),
                'idrol' => $this->request->getPostGet('idrol')
            );
            //echo '<pre>'.var_export($data, true).'</pre>';exit;
            $this->validation->setRuleGroup('newUser');
            
            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{ 
                //echo '<pre>'.var_export($data, true).'</pre>';exit
                $this->usuarioModel->save($data);
                $lastId = $this->db->insertID();

                $user = [
                    'password' => md5($data['cedula'])
                ];
                
                $this->usuarioModel->update($lastId, $user);
                
                return redirect()->to('/usuarios');
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
