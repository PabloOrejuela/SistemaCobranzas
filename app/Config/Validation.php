<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig {
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $login = [
        'user'  => 'required',
        'password'   => 'required',
    ];

    public $login_errors = [
        'user' => [
            'required' => 'El campo "Usuario" es obligatorio',
        ],
        'password' => [
            'required' => 'El campo "Contraseña" es obligatorio',
        ]
    ];

    public $newUser = [
        'nombre'  => 'required',
        'cedula'   => 'required|numeric|is_unique[usuarios.cedula]',
        'email'   => 'required|valid_email',
        'telefono'   => 'required|numeric',
        'direccion'   => 'required',
        'idrol'   => 'required|greater_than[0]',
    ];

    public $newUser_errors = [
        'nombre' => [
            'required' => 'El campo "Usuario" es obligatorio',
        ],
        'cedula' => [
            'required' => 'El campo "Cédula" es obligatorio',
            'numeric' => 'El campo "Cédula" solo acepta números',
            'is_unique' => 'Este número de cédula ya está siendo usado por un usuario',
        ],
        'email' => [
            'required' => 'El campo "Email" es obligatorio',
            'valid_email' => 'El campo "Email" debe tener un email válido',
        ],
        'telefono' => [
            'required' => 'El campo "Teléfono" es obligatorio',
            'numeric' => 'El campo "Teléfono" solo acepta números',
        ],
        'direccion' => [
            'required' => 'El campo "Dirección" es obligatorio',
        ],
        'idrol' => [
            'required' => 'El campo "idrol" es obligatorio',
            'greater_than' => 'Debe elegir un rol para el usuario',
        ]
    ];

    public $uploadFile = [
        'tablaCartera' => 'uploaded[tablaCartera]',
    ];

    public $uploadFile_errors = [
        'tablaCartera' => [
            'uploaded' => 'Es necesario seleccionar un archivo para poder subirlo',
        ]
    ];
}
