<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reportes extends BaseController {
    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['lista_usuarios'] = $this->usuarioModel->findAll();

            $data['version'] = $this->system_version;
            $data['title']='Usuarios';
            $data['main_content']='reportes/lista_usuarios_reportes';
            return view('includes/template', $data);
        }else{
            $this->logout();
        }
    }

    public function form_reporte_cobro($idusuario) {
        $data['idrol'] = $this->session->idrol;
        $data['idusuario'] = $this->session->idusuario;
        $data['logged_in'] = $this->session->logged_in;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['usuario'] = $this->usuarioModel->find($idusuario);

            
            $data['version'] = $this->system_version;
            $data['title']='Usuarios';
            $data['main_content']='reportes/frm_pide_reporte_usuario';
            return view('includes/template', $data);
        }else{
            $this->logout();
        }
    }

    public function reporteCobrosUsuarioFechas(){

        
        //echo '<pre>'.var_export($publicDir, true).'</pre>';exit;
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));
        $this->response->setHeader('Content-Type', 'application/pdf'); 
        $pdf->SetMargins(15, 10, 15); 
        $pdf->SetLineWidth(0.01);
        $pdf->setCellPaddings(0.8, 0.8, 0.8, 0.8);
        $pdf->SetFillColor(0,200,250);
        
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage(); 

        $html = '<img src="'.site_url().'public/img/cashier.svg" alt="logo" id="logo-report"  width="75" />';
        //$pdf->image(PDF_HEADER_LOGO, 15, 12, 20, 15, 'jpg', $link = '', $align = '', false, 50, '', false, false, 1, false, false, false);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->ln(0);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(190, 0, 'Reporte ', '', 0, 'C', false);

        //$pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('reporte-cobros-usuario.pdf', 'I'); 
        //exit();
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
