<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

//Llano a los modelos
use App\Models\UsuarioModel;
use App\Models\PruebaModel;
use App\Models\ClienteModel;
use App\Models\PagoModel;
use App\Models\CarteraModel;
use App\Models\EmpresaModel;
use App\Models\SeguimientoModel;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller {
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $CI_VERSION = \CodeIgniter\CodeIgniter::CI_VERSION;
    public $system_version = "1.0";
    public $session = null;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form', 'html'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->db = \Config\Database::connect();
        $this->usuarioModel = new UsuarioModel($this->db);
        $this->pruebaModel = new PruebaModel($this->db);
        $this->carteraModel = new CarteraModel($this->db);
        $this->pagoModel = new PagoModel($this->db);
        $this->clienteModel = new ClienteModel($this->db);
        $this->empresaModel = new EmpresaModel($this->db);
        $this->seguimientoModel = new SeguimientoModel($this->db);

        // E.g.: $this->session = \Config\Services::session();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
    }
}
