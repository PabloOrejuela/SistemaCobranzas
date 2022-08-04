<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'clientes';
    protected $primaryKey       = 'idcliente';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nombre','cedula', 'estado_civil', 'calificacion','direccion','dir_trabajo','telefono_domicilio','telefono_trabajo'
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

    function _getDataCliente($idcartera){
        $builder = $this->db->table('clientes');
        $builder->select('*');
        $builder->where('cartera.idcartera', $idcartera);
        $builder->join('cartera', 'cartera.idcliente = clientes.idcliente');
        $builder->join('empresas', 'empresas.idempresa = cartera.idempresa');
        $query = $builder->get();
        //echo $this->db->getLastQuery();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable[] = $row;
            }
            
            return $dataTable;
        }
    }

    function _getClienteId($cedula){echo $cedula;
        $idcliente = 0;
        $builder = $this->db->table('clientes');
        $builder->select('idcliente');
        $builder->where('cedula', $cedula);
        $query = $builder->get();
        echo $this->db->getLastQuery();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $idcliente = $row->idcliente;
            }
            
        }
        return $idcliente;
    }


    
}
