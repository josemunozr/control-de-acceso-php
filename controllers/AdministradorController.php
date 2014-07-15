<?php

class AdministradorController extends BaseController {

    protected $nameController = "administrador";


    //vars index
    protected  $name     = "Nombre Administrador";
    protected  $empresa  = "Nombre Empresa";
    protected  $correo   = "Correo Usuario";

    protected $pdf;

    public function __construct()
    {
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
        return $this->correo;
    }


    public function getEmpresa()
    {
        return $this->empresa;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getNameController()
    {
        return $this->nameController;
    }




}