<?php

namespace App\Models;

use CodeIgniter\Model;

class SeguimientoModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'seguimientos';
    protected $primaryKey       = 'idseguimiento';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idusuario', 'idcartera', 'observacion'];

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

    function _getDataSeguimiento($idcartera){
        $builder = $this->db->table('seguimientos');
        $builder->select('seguimientos.created_at as fecha, nombre, observacion');
        $builder->where('seguimientos.idcartera', $idcartera);
        $builder->join('cartera', 'cartera.idcartera = seguimientos.idcartera');
        $builder->join('usuarios', 'usuarios.idusuario = seguimientos.idusuario');
        $builder->orderBy('seguimientos.created_at', 'ASC');
        //$builder->join('clientes', 'clientes.idcliente = cartera.idcliente');
        $query = $builder->get();
        //echo $this->db->getLastQuery();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $dataTable[] = $row;
            }
            
            return $dataTable;
        }
    }
}
