<?php

namespace App\Controllers;

class Home extends BaseController{
    
    public function index(){
        
        $data['version'] = $this->system_version;
        $data['title']='Lista de miembros';
        $data['main_content']='login';
        return view('includes/template', $data);
    
    }
}
