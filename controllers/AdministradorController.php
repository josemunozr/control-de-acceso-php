<?php

class AdministradorController extends BaseController {

    protected $nameController = "administrador";
    protected $user; //Usuario que ingresa

    //vars index

    protected  $name;
    protected  $empresa;
    protected  $correo;

    protected $pdf;
    protected $model;

    public function __construct()
    {

        session_start();

        $this->model = $this->loadModels('datosHome');
        $this->user = $_SESSION["usuarioActual"];


        $this->getLibrary('fpdf');
        $this->pdf = new FPDF();

    }

    //VISTAS
    public function indexAction()
    {

        return new View('home', $this->getNameController(),[

            'nombre' => $this->getName(),
            'empresa' => $this->getEmpresa(),
            'correo' => $this->getCorreo()

        ]);
    }

    public function modifyUserAction()
    {
        return new View('modifyUser', $this->getNameController());
    }

    public function addUserAction()
    {
        return new View('addUser', $this->getNameController());
    }

    public function accessRequestAction()
    {
        return new View('accessRequest', $this->getNameController());
    }

    public function reportsAction()
    {
        return new View('reports', $this->getNameController());
    }


    //LIRABRY
    public function reportPdfAction()
    {

       $name = $this->getName();

        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(40,10,utf8_decode('¡Hola, ' . $name . '!'));
       // $this->pdf->Output("prueba.pdf", "D");
        $this->pdf->Output();

    }


    /*
     * GETTERS
     */

    public function getCorreo()
    {
        $dato = $this->model->getCorreoUser($this->user);
        return $dato['correo'];
    }


    public function getEmpresa()
    {
        $dato = $this->model->getNombreEmpresaUser($this->user);
        return $dato['nombre'];
    }


    public function getName()
    {
        $dato = $this->model->getNombreApellidoUser($this->user);
        return $dato['nombre'] . " " .  $dato['apellido'];
    }

    public function getNameController()
    {
        return $this->nameController;
    }




}