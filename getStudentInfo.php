<?php
    header("content-type:text/json; charset=utf-8");
    require_once "Sqliconnect.class.php";

    $stuId = $_GET["id"];

    $sqliConnect = new Sqliconnect();
    
    $sql = "select * from student where id=".$stuId;

    $result = $sqliConnect->excuteQuery($sql);

    $student = $result->fetch_assoc();    

    $result->free();
    $sqliConnect->close();

    echo json_encode($student);
?>