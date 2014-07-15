<?php

class OperadorDocController extends BaseController {

    protected $nameController = "operadorDoc";

    //vars index
    protected  $nameOperator   = "Nombre operador Doc";
    protected  $correo         = "Correo Usuario";

    protected $pdf;

    public function __construct()
    {
        $this->getLibrary('fpdf');
        $this->pdf = new FPDF();
    }

    // HOME
   public function indexAction()
    {

        return new View('home',$this->getNameController(), [

            'nombre' => $this->getNameOperator(),
            'correo' => $this->getCorreo()

        ]);
    }

    // ACTION
    public function modifyUserAction()
    {
        return new View('modifyUser',$this->getNameController());
    }

    public function accessRequestAction()
    {
        return new View('accessRequest', $this->getNameController());
    }

    public function addUserAction()
    {
        return new View('addUser', $this->getNameController());
    }

    public function visitsAction()
    {
        return new View('visits', $this->getNameController());
    }

    public function viewVisitsAction()
    {
        return new View('viewVisits',$this->getNameController() );
    }

    public function reportsAction()
    {
        return new View('reports', $this->getNameController());
    }

    public function reportPdfAction()
    {
        $name = $this->getNameOperator();

        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(16,10,utf8_decode('Hola:'),0);
        $this->pdf->Ln();
        $this->pdf->Cell(190,10, utf8_decode($name),0,1,'C');
        $this->pdf->Output();
    }



    /*
     * GETTER
     */

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getNameController()
    {
        return $this->nameController;
    }

    public function getNameOperator()
    {
        return $this->nameOperator;
    }



}

