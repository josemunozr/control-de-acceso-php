<?php

session_name("administrador");
session_unset("administrador");


session_start();
session_destroy();


header("Location: ../../ ");