<?php

namespace App\Controllers;

class Home extends BaseController{
    
    public function index(){
        
        $data['version'] = $this->system_version;
        $data['title']='Acceso al sistema:';
        $data['main_content']='login';
        return view('includes/template', $data);
    
    }

    public function validate_credentials(){
        $data = array(
            'name' => $this->request->getPostGet('name'),
            'password' => $this->request->getPostGet('password'),
        );
        $this->validation->setRuleGroup('login');
        
        echo '<pre>'.var_export($data, true).'</pre>';
        exit;
        
        
    }
}
