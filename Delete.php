<?php

    require_once ("Sqliconnect.class.php");

    $stuId = htmlspecialchars($_GET["id"]) ;

    $sqliConn = new Sqliconnect();

    $sql = "delete from student where id=".$stuId;
    
    $result = $sqliConn->excuteCUD($sql);

    if($result === 0){
        echo "1";
    }else{
        echo "0";
    }
?>