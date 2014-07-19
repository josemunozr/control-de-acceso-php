<?php

class OperadorDocController extends BaseController {

    protected $nameController = "operadorDoc";
    protected $user;
    protected $perfil;
    //vars index
    protected  $name;
    protected  $empresa;
    protected  $correo;

    protected $pdf;
    protected $modelHome;
    protected $modelSetData;
    protected $modelGetData;

    public function __construct()
    {
        session_start();

        $this->modelHome = $this->loadModels('datosHome');
        $this->modelSetData = $this->loadModels('setDatos');
        $this->modelGetData = $this->loadModels('getDatos');


        $this->user = $_SESSION["usuarioActual"];
        $this->perfil = $_SESSION["perfil"];



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

        $base_perfil = $this->perfil;


        $user = utf8_decode($_POST['rutUsuario']);
        $nombre = utf8_decode($_POST['nombreUsuario']);
        $apellido = utf8_decode($_POST['apellidoUsuario']);
        $dateIni =  utf8_decode($_POST['fechaInicio']);
        $dateFin = utf8_decode($_POST['fechaFin']);
        $pass =  utf8_decode($_POST['passUsuario']);
        $tipoPerfil =  utf8_decode($_POST['tipoPerfil']);
        $codEmp =  utf8_decode($_POST['nombreEmpresa']);
        $correo = utf8_decode($_POST['correoUsuario']);


        $insert =   $this->modelSetData->addUser($user,$nombre,$apellido,$dateIni,$dateFin,$pass,$tipoPerfil,$codEmp,$correo);

        if($insert == true){
            echo "<script>alert('Datos guardados correctamente')</script>
                      <script>window.location='../$base_perfil'</script>";
        }
        else
        {
            echo "<script>alert('Datos ingresados ya se encuentran en Sistema')</script>
                      <script>window.location='addUser'</script>";
        }


    }

    public function newVisitsAction()
    {
        $base_perfil = $this->perfil;
        $cantInput = (integer)$_POST['cantInput'];

        $inputVisitantes = array();
        for($i=1;$i<=$cantInput; $i++)
        {
            $inputVisitantes[$i]=array(
                "nombre$i" => $_POST["nombreUsuario$i"],
                "apellido$i" => $_POST["apellidoUsuario$i"],
                "rut$i" => $_POST["rutUsuario$i"]
            );
        }




        $rutEmp = utf8_decode($_POST["rutEmpresa"]);
        $rutSolicitante = $this->user;
        $motivo = utf8_decode($_POST["motivoVisita"]);
        $fecha = utf8_decode($_POST["fechaVisita"]);
        $hora = utf8_decode($_POST["horaVisita"]);



        $setDatos = $this->modelSetData->accessRequest($cantInput,$inputVisitantes,$rutEmp,$rutSolicitante,$motivo,$fecha,$hora );

            if($setDatos == true)
            {
                echo "<script>alert('Datos guardados correctamente')</script>
                      <script>window.location='../$base_perfil'</script>";
            }
            else
            {
                echo "<script>alert('Datos ingresados ya se encuentran en Sistema')</script>
                      <script>window.location='accessRequest'</script>";
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