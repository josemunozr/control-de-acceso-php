<?php

class AdministradorController extends BaseController {

    protected $nameController = "administrador";
    protected $user; //Usuario que ingresa
    protected $perfil;

    //vars home
    protected  $name;
    protected  $empresa;
    protected  $correo;

    //library
    protected $pdf;

    //models
    protected $modelHome;
    protected $modelSetData;
    protected $modelUpdateData;
    protected $modelGetData;


    public function __construct()
    {



        session_start();

        $this->modelHome = $this->loadModels('datosHome');
        $this->modelSetData = $this->loadModels('setDatos');
        $this->modelGetData = $this->loadModels('getDatos');
        $this->modelUpdateData = $this->loadModels('updateDatos');


        if(isset($_SESSION["usuarioActual"]) && isset($_SESSION["perfil"])){
            $this->user = $_SESSION["usuarioActual"];
            $this->perfil = $_SESSION["perfil"];
        }



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
        /*            echo "<script>alert('Datos guardados correctamente')</script>
                      <script>window.location='../$base_perfil'</script>";

        */
            header("Location: addUser?estado=true");
        }
        else
        {
           /* echo "<script>alert('Datos ingresados ya se encuentran en Sistema')</script>
                      <script>window.location='addUser'</script>";
           */
            header("Location: addUser?estado=false");
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
            header("Location: accessRequest?estado=true");
        }
        else
        {
            header("Location: accessRequest?estado=false");
        }


    }

    public function modifyDataAction()
    {
        $base_perfil = $this->perfil;

        $rut = $_POST["rutUsuario"];
        $nombre = $_POST["nombreUsuario"];
        $apellido = $_POST["apellidoUsuario"];
        $tipoPerfil = $_POST["tipoPerfil"];
        $fechaInicio = $_POST["fechaInicio"];
        $fechaFin = $_POST["fechaFin"];
        $tipoModificacion = $_POST["tipoModificacion"];


        if($tipoModificacion == "rut")
        {
            $estado = $this->modelUpdateData->modifyUserByRut($tipoPerfil,$fechaInicio,$fechaFin,$rut);

            if($estado == true)
            {
                header("Location: modifyUser?msgModify=true");
            }
            else
            {
                header("Location: modifyUser?msgModify=false");
            }

        }
        elseif($tipoModificacion == "NomApe")
        {
            $estado =  $this->modelUpdateData->modifyUserByNomApe($tipoPerfil,$fechaInicio,$fechaFin,$nombre,$apellido);

            if($estado == true)
            {
                header("Location: modifyUser?msgModify=true");
            }
            else
            {
                header("Location: modifyUser?msgModify=false");
            }
        }
    }


    //LIRABRY
    public function reportPdfAction()
    {
        $base_perfil = $this->perfil;
        $dato = $this->modelHome->getNombreEmpresaUser($this->user);

        $empresa    = $dato['cod_emp'];
        $desde      = $_POST["fecha_desde"];
        $hasta      = $_POST["fecha_hasta"];



        $datosSolicitante  = $this->modelGetData->getDataAplicant($desde,$hasta,$empresa);
        $datosVisitantes   = $this->modelGetData->getDataVisits($desde,$hasta,$empresa);

        if(count($datosSolicitante) == 0){
            echo "<script>alert('No hay datos para la empresa o rango de fecha seleccionada')</script>
                      <script>window.location='../$base_perfil'</script>";
        }
        else
        {
            $this->pdf->AddPage();
            $this->pdf->SetFont('Arial','B',12);
            $this->pdf->Cell(190,10,utf8_decode('Datos Solicitante'),1,1,'C');

            $this->pdf->Cell(10,10,utf8_decode('N°'),1,0,'C');
            $this->pdf->Cell(25,10,utf8_decode('Rut'),1,0,'C');
            $this->pdf->Cell(90,10,utf8_decode('Motivo'),1,0,'C');
            $this->pdf->Cell(20,10,utf8_decode('Fecha'),1,0,'C');
            $this->pdf->Cell(17,10,utf8_decode('Hora'),1,0,'C');
            $this->pdf->Cell(28,10,utf8_decode('Estado Visita'),1,0,'C');
            $this->pdf->Ln();
            $this->pdf->SetFont('Arial','',10);
            for($i = 0 ; $i < count($datosSolicitante) ; $i++)
            {
                $this->pdf->Cell(10,10,utf8_decode($datosSolicitante[$i]['num']),1,0,'C');
                $this->pdf->Cell(25,10,utf8_decode($datosSolicitante[$i]['rut_Solicitante']),1,0,'C');
                $this->pdf->Cell(90,10,utf8_decode($datosSolicitante[$i]['motivo']),1,0,'C');
                $this->pdf->Cell(20,10,utf8_decode($datosSolicitante[$i]['fecha']),1,0,'C');
                $this->pdf->Cell(17,10,utf8_decode($datosSolicitante[$i]['hora'] . ' hrs.'),1,0,'C');
                $this->pdf->Cell(28,10,utf8_decode($datosSolicitante[$i]['estado_Visita']),1,0,'C');
                $this->pdf->Ln();

            }
            $this->pdf->Ln();
            $this->pdf->Ln();

            $this->pdf->SetFont('Arial','B',12);
            $this->pdf->Cell(133,10,utf8_decode('Datos de Visitantes'),1,1,'C');
            $this->pdf->Cell(10,10,utf8_decode('N°'),1,0,'C');
            $this->pdf->Cell(25,10,utf8_decode('Rut'),1,0,'C');
            $this->pdf->Cell(35,10,utf8_decode('Nombre'),1,0,'C');
            $this->pdf->Cell(35,10,utf8_decode('Apellido'),1,0,'C');
            $this->pdf->Cell(28,10,utf8_decode('Estado Visita'),1,0,'C');
            $this->pdf->Ln();

            $this->pdf->SetFont('Arial','',10);
            for($i = 0 ; $i < count($datosVisitantes) ; $i++)
            {
                $this->pdf->Cell(10,10,utf8_decode($datosVisitantes[$i]['numero']),1,0,'C');
                $this->pdf->Cell(25,10,utf8_decode($datosVisitantes[$i]['Rut_Usuario']),1,0,'C');
                $this->pdf->Cell(35,10,utf8_decode($datosVisitantes[$i]['nombre']),1,0,'C');
                $this->pdf->Cell(35,10,utf8_decode($datosVisitantes[$i]['apellido']),1,0,'C');
                $this->pdf->Cell(28,10,utf8_decode($datosVisitantes[$i]['estado_Visita']),1,0,'C');
                $this->pdf->Ln();

            }


            $this->pdf->Output("reporte.pdf","D");
//            $this->pdf->Output();

        }

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