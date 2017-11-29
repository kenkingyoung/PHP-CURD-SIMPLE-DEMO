<?php

    require_once ("Sqliconnect.class.php");

    $stuId = htmlspecialchars($_POST["id"]) ;
    $page = htmlspecialchars($_POST["page"]) ;
    $name = htmlspecialchars($_POST["name"]) ;
    $age = htmlspecialchars($_POST["age"]);
    $sex = htmlspecialchars($_POST["sex"]);
    $grade = htmlspecialchars($_POST["grade"]);
    $class = htmlspecialchars($_POST["class"]);

    $sqliConn = new Sqliconnect();

    $sql = "update student set Name='".$name."', Age=".$age.", Sex='".$sex."', Grade='".$grade.
        "', Class='".$class."' where id=".$stuId;
    
    $result = $sqliConn->excuteCUD($sql);

    if($result === 0){
        echo "1";
    }else{
        echo "0";
    }
?>