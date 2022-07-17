<?php

namespace App\Controllers;
use TCPDF;

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

        $data = array(
            'date_desde' => $this->request->getPostGet('date_desde'),
            'date_hasta' => $this->request->getPostGet('date_hasta'),
            'idusuario' => $this->request->getPostGet('idusuario'),
        );
        //echo '<pre>'.var_export($data, true).'</pre>';
        $registros = $this->pagoModel->_getDataCobrosUsuario($data);
        $usuario = $this->usuarioModel->find($data['idusuario']);
        //echo '<pre>'.var_export($registros, true).'</pre>';
        $this->PdfReporteCobrosUsuarioFechas($registros, $usuario);
        //return redirect()->to('/cobros');
        
    }

    public function PdfReporteCobrosUsuarioFechas($registros, $usuario){

        
        //$lib = include('tcpdf.php');
        //echo '<pre>'.var_export($registros, true).'</pre>';
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
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

        $html = '<img src="'.site_url().'public/img/cashier.svg" alt="logo" id="logo-report"  width="50" />';
        //$pdf->image(PDF_HEADER_LOGO, 15, 12, 20, 15, 'jpg', $link = '', $align = '', false, 50, '', false, false, 1, false, false, false);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->ln(0);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(180, 0, 'Reporte de cobros de '.$usuario->nombre, '', 0, 'C', false);

        $pdf->ln(12);
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(7, 0, 'No.', 'TLRB', 0, 'L', true);
        $pdf->Cell(55, 0, 'Nombre', 'TLRB', 0, 'C', true);
        $pdf->Cell(30, 0, 'Cédula', 'TLRB', 0, 'C', true);
        $pdf->Cell(30, 0, 'Fecha', 'TLRB', 0, 'C', true);
        $pdf->Cell(30, 0, 'Método', 'TLRB', 0, 'C', true);
        $pdf->Cell(30, 0, 'Abono', 'TLRB', 0, 'C', true);
        

        $n=1;
        foreach ($registros as $value) {
            $pdf->ln();
            $pdf->SetFont('helvetica', 'P', 9);
            $pdf->Cell(7, 0, $n, 'TLRB', 0, 'L', false);
            $pdf->Cell(55, 0, $value->nombre, 'TLRB', 0, 'L', false);
            $pdf->Cell(30, 0, $value->cedula, 'TLRB', 0, 'L', false);
            $pdf->Cell(30, 0, $value->created_at, 'TLRB', 0, 'L', false);
            $pdf->Cell(30, 0, $value->metodo_pago, 'TLRB', 0, 'R', false);
            $pdf->Cell(30, 0, $value->abono, 'TLRB', 0, 'R', false);
            
            $n++;
        }

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
