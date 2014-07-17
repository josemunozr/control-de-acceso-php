<?php

class AdministradorController extends BaseController {

    protected $nameController = "administrador";
    protected $user; //Usuario que ingresa

    //vars home
    protected  $name;
    protected  $empresa;
    protected  $correo;

    //library
    protected $pdf;

    //models
    protected $modelHome;
    protected $modelAddUser;

    public function __construct()
    {

        session_start();

        $this->modelHome = $this->loadModels('datosHome');
        $this->modelAddUser = $this->loadModels('setDatos');

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
        $dato = $this->modelHome->getCorreoUser($this->user);
        return $dato['correo'];
    }


    public function getEmpresa()
    {
        $dato = $this->modelHome->getNombreEmpresaUser($this->user);
        return $dato['nombre'];
    }


    public function getName()
    {
        $dato = $this->modelHome->getNombreApellidoUser($this->user);
        return $dato['nombre'] . " " .  $dato['apellido'];
    }

    public function getNameController()
    {
        return $this->nameController;
    }




}