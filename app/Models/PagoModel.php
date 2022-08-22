<?php

namespace App\Models;

use CodeIgniter\Model;

class PagoModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'pagos';
    protected $primaryKey       = 'idpagos';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'abono','idmetodo_pago','documento','img_documento','idusuario','idcartera', 'fecha_pago'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function _getDataCobrosUsuario($data){
        $builder = $this->db->table('pagos');
        $builder->select('*');
        $builder->where('idusuario', $data['idusuario']);
        $builder->join('metodo_pago', 'metodo_pago.idmetodo_pago = pagos.idmetodo_pago');
        $builder->join('cartera', 'cartera.idcartera = pagos.idcartera');
        $builder->join('clientes', 'clientes.idcliente = cartera.idcliente');
        $builder->orderBy('nombre', 'ASC');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable[] = $row;
            }
            return $dataTable;
        }
    }

    function _getDataCobrosCartera($idcartera){
        $builder = $this->db->table('pagos');
        $builder->select('pagos.fecha_pago as fecha, abono, metodo_pago, documento');
        $builder->where('pagos.idcartera', $idcartera);
        $builder->join('metodo_pago', 'metodo_pago.idmetodo_pago = pagos.idmetodo_pago');
        $builder->join('cartera', 'cartera.idcartera = pagos.idcartera');
        $builder->join('usuarios', 'usuarios.idusuario = pagos.idusuario');
        $builder->orderBy('pagos.fecha_pago', 'ASC');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable[] = $row;
            }
            return $dataTable;
        }
    }

    function _getPagosCooperativa($data){
        //echo '<pre>'.var_export($data['date_hasta'], true).'</pre>';exit;
        $builder = $this->db->table('pagos');
        $builder->select('*');
        $builder->where('idempresa', $data['idempresa']);
        $builder->where('pagos.fecha_pago >=', $data['date_desde']);
        $builder->where('pagos.fecha_pago <', date("Y-m-d",strtotime($data['date_hasta']."+ 1 days")) );
        $builder->join('metodo_pago', 'metodo_pago.idmetodo_pago = pagos.idmetodo_pago');
        $builder->join('cartera', 'cartera.idcartera = pagos.idcartera');
        $builder->join('clientes', 'clientes.idcliente = cartera.idcliente');
        $builder->orderBy('nombre', 'ASC');
        $query = $builder->get();
        //echo $this->db->getLastQuery();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable[] = $row;
            }
            return $dataTable;
        }
    }

    function _getPagosCooperativaList($idempresa){
        //echo '<pre>'.var_export($data['date_hasta'], true).'</pre>';exit;
        $builder = $this->db->table('pagos');
        $builder->select('*');
        $builder->where('idempresa', $idempresa);
        $builder->join('metodo_pago', 'metodo_pago.idmetodo_pago = pagos.idmetodo_pago');
        $builder->join('cartera', 'cartera.idcartera = pagos.idcartera');
        $builder->join('clientes', 'clientes.idcliente = cartera.idcliente');
        //$builder->orderBy('nombre', 'ASC');
        $query = $builder->get();
        //echo $this->db->getLastQuery();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable[] = $row;
            }
            return $dataTable;
        }
    }

    function _getPagosTotal($data){
        //echo '<pre>'.var_export($data['date_hasta'], true).'</pre>';exit;
        $builder = $this->db->table('pagos');
        $builder->select('*');
        $builder->where('pagos.fecha_pago >=', $data['date_desde']);
        $builder->where('pagos.fecha_pago <', date("Y-m-d",strtotime($data['date_hasta']."+ 1 days")) );
        $builder->join('metodo_pago', 'metodo_pago.idmetodo_pago = pagos.idmetodo_pago');
        $builder->join('cartera', 'cartera.idcartera = pagos.idcartera');
        $builder->join('clientes', 'clientes.idcliente = cartera.idcliente');
        $builder->join('empresas', 'empresas.idempresa = cartera.idempresa');
        $builder->orderBy('nombre', 'ASC');
        $query = $builder->get();
        //echo $this->db->getLastQuery();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable[] = $row;
            }
            return $dataTable;
        }
    }

    function _getDataPago($idpagos){
        //echo '<pre>'.var_export($data['date_hasta'], true).'</pre>';exit;
        $builder = $this->db->table('pagos');
        $builder->select('*');
        $builder->where('idpagos', $idpagos);
        $builder->join('metodo_pago', 'metodo_pago.idmetodo_pago = pagos.idmetodo_pago');
        $builder->join('cartera', 'cartera.idcartera = pagos.idcartera');
        $builder->join('clientes', 'clientes.idcliente = cartera.idcliente');
        $builder->join('empresas', 'empresas.idempresa = cartera.idempresa');
        $query = $builder->get();
        //echo $this->db->getLastQuery();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable = $row;
            }
            return $dataTable;
        }
    }
}
