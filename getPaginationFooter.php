<?php
    header("content-type:text/html; charset=utf-8");
    require_once "Pagination.class.php";

    $tableName = "student";
    $stuName = "";
    $page = 1;

    if(is_array($_GET) && count($_GET) > 0){
        if(isset($_GET["page"]) && is_numeric($_GET["page"])){
            $page = intval($_GET['page']);
        }

        if(isset($_GET["stuName"])){
            $stuName = $_GET['stuName'];
        }
    }

    $pagination = new Pagination();
    
    $condition = "";
    if($stuName != ""){
        $condition = "Name like '%".$stuName."%'";
    }

    echo $pagination->getPaginationFooter($page, "Index.html?stuName=", $tableName, $condition);
?>