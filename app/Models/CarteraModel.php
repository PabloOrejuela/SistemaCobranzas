<?php

namespace App\Models;

use CodeIgniter\Model;

class CarteraModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'cartera';
    protected $primaryKey       = 'idcartera';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'idcliente','fecha_emision','fecha_culminacion','saldo_fecha','valor_cuota',
        'cuotas_cancelar','cuotas_canceladas','tasa_interes','tasa_mora','subtotal',
        'comision','coactiva','total',
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

    function _getDataTableCartera($idempresa){
        
        $builder = $this->db->table('cartera');
        $builder->select('*')->where('estado', 0);
        $builder->join('clientes', 'clientes.idcliente = cartera.idcliente');
        $builder->join('empresas', 'empresas.idempresa = cartera.idempresa');
        $builder->where('cartera.idempresa', $idempresa);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable[] = $row;
            }
            return $dataTable;
        }
        //echo $this->db->getLastQuery();
    }

    function _getDataDeuda($idcartera){
        
        $builder = $this->db->table('cartera');
        $builder->select('*')->where('idcartera', $idcartera);
        $builder->join('clientes', 'clientes.idcliente = cartera.idcliente');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $data = $row;
            }
            return $data;
        }
        //echo $this->db->getLastQuery();
    }
}
