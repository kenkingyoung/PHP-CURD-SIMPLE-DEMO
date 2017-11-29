<?php
    header("content-type:text/json; charset=utf-8");
    require_once "Pagination.class.php";
    date_default_timezone_set("PRC");

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
    
    $paginationData = $pagination->getPaginationData($page, $tableName, $condition);

    $jarr = array();
    while($row = $paginationData->fetch_assoc()){
        $count=count($row);
        for($i=0;$i<$count;$i++){
            unset($row[$i]);
        }

        array_push($jarr, $row);
    }

    echo json_encode($jarr);
?>