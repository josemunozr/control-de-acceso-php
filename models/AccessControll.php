<?

class AccessControll extends Response {

    public function execute()
    {
        if ($_POST["usu"]=="admin" && $_POST["pass"]=="admin"){

            Session::start();
            $_SESSION["autentificado"]= "SI";
            header ("Location: administrador");
        }else {

            header("Location: index.php?errorusuario=si");
        }

    }
}
