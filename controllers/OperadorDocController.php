<?php

class OperadorDocController extends BaseController {

    protected $nameController = "operadorDoc";

    //vars index
    protected  $name;
    protected  $empresa;
    protected  $correo;

    protected $pdf;
    protected $modelHome;
    protected $modelAddUser;
    protected $modelGetData;

    public function __construct()
    {
        session_start();

        $this->modelHome = $this->loadModels('datosHome');
        $this->modelAddUser = $this->loadModels('setDatos');
        $this->modelGetData = $this->loadModels('getDatos');


        $this->user = $_SESSION["usuarioActual"];

        $this->getLibrary('fpdf');
        $this->pdf = new FPDF();
    }

    // HOME
    public function indexAction()
    {

        return new View('home',$this->getNameController(), [

            'nombre' => $this->getName(),
            'correo' => $this->getCorreo(),
            'empresa'=> $this->getEmpresa()

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
        $ListaEmpresa = $this->modelGetData->getListEmpresa();


        return new View('visits', $this->getNameController(),[
            'listEmpresa' => $ListaEmpresa
        ]);
    }

    public function viewVisitsAction()
    {
        return new View('viewVisits',$this->getNameController() );
    }

    public function reportsAction()
    {
        $ListaEmpresa = $this->modelGetData->getListEmpresa();

        return new View('reports', $this->getNameController(),[
                'listEmpresa' => $ListaEmpresa
            ]);
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


    public function newUserAction()
    {

        $user = utf8_decode($_POST['rutUsuario']);
        $nombre = utf8_decode($_POST['nombreUsuario']);
        $apellido = utf8_decode($_POST['apellidoUsuario']);
        $dateIni =  utf8_decode($_POST['fechaInicio']);
        $dateFin = utf8_decode($_POST['fechaFin']);
        $pass =  utf8_decode($_POST['passUsuario']);
        $tipoPerfil =  utf8_decode($_POST['tipoPerfil']);
        $codEmp =  utf8_decode($_POST['nombreEmpresa']);


        $insert =   $this->modelAddUser->addUser($user,$nombre,$apellido,$dateIni,$dateFin,$pass,$tipoPerfil,$codEmp);

        if($insert == true){
            echo "<script>alert('Datos guardados correctamente')</script>
                      <script>window.location='index'</script>";
        }
        else
        {
            echo "<script>alert('Datos ingresados ya se encuentran en Sistema')</script>
                      <script>window.location='index'</script>";
        }


    }


    /*
     * GETTER
     */

    public function getCorreo()
    {
        $dato = $this->modelHome->getCorreoUser($this->user);
        return $dato['correo'];
    }

    public function getName()
    {
        $dato = $this->modelHome->getNombreApellidoUser($this->user);
        return $dato['nombre'] . " " . $dato['apellido'];
    }


    public function getEmpresa()
    {
        $dato = $this->modelHome->getNombreEmpresaUser($this->user);
        return $dato['nombre'];
    }



    public function getNameController()
    {
        return $this->nameController;
    }





}