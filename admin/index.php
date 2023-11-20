<?php
include "../model/pdo.php";

// controller

$act = $_GET["act"] ?? "";
switch ($act) {
    case "":
        $view = "home.php";
        break;
    case "home":
        $view = "home.php";
    break;
    default:
        $view = "../view/404.php";
}


    include "header.php";
    include $view;
    include "footer.php";
