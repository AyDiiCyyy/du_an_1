<?php
include "../model/pdo.php";
include "../model/danhmuc_admin.php";

// controller

$act = $_GET["act"] ?? "";
switch ($act) {
    case "":
        $view = "home.php";
        break;
    case "listdm":
        $listdanhmuc=load_all_dm();
        $view = "danhmuc/list.php";
        break;
    case "adddm":
        $view = "danhmuc/add.php";
         break;
    case "suadm":
        $view = "danhmuc/update.php";
        break;
    case "xoadm":
        
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
