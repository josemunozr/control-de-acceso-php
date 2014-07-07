<?php

require '../library/Database.php';

        $sql_usu = "
                    SELECT id_user,pass_user FROM tabla_user
                    WHERE id_user = '$_POST[usuario]'
                    AND   pass_user  = '$_POST[pass]'
                   ";

        $sql_perfil = "SELECT tipo_perfil FROM tabla_user
                       WHERE id_user = '$_POST[usuario]'
                       AND   pass_user   = '$_POST[pass]'";

        $query_usu      = mysql_query($sql_usu,$con);
        $query_perfil   = mysql_query($sql_perfil, $con);

        $session = mysql_fetch_array($query_usu);
        $perfil = mysql_fetch_array($query_perfil);

        if($_POST['usuario'] == $session['id_user'])
        {

            session_name("loginUsuario");
            session_start();
            $_SESSION["autentificado"]= "SI";
            $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");

            //header ("Location: ../operadorDoc");
            header ("Location: ../$perfil[tipo_perfil]");
        }
        else
        {

            header("Location: ../index.php?errorUsuario=true");
        }

        mysql_free_result($query_usu);
        mysql_free_result($query_perfil);
        mysql_close($con);
   /* }
    
}*/