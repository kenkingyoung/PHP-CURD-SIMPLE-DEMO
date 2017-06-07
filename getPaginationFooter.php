<?php
    header("content-type:text/html; charset=utf-8");
    require_once "Pagination.class.php";

    $tableName = "student";
    $classId = 0;
    $newsType = "";
    $page = 1;

    if(is_array($_GET) && count($_GET) > 0){
        if(isset($_GET["page"]) && is_numeric($_GET["page"])){
            $page = intval($_GET['page']);
        }
    }

    $pagination = new Pagination();

    echo $pagination->getPaginationFooter($page, "Index.html", $tableName, "");
?>