<?php

    require_once ("Sqliconnect.class.php");

    $name = htmlspecialchars($_POST["name"]) ;
    $age = htmlspecialchars($_POST["age"]);
    $sex = htmlspecialchars($_POST["sex"]);
    $grade = htmlspecialchars($_POST["grade"]);
    $class = htmlspecialchars($_POST["class"]);

    $sqliConn = new Sqliconnect();

    $sql = "insert into student (Name, Age, Sex, Grade, Class) values ('".$name.
        "', ".$age.", '".$sex."', '".$grade."', '".$class."')";
    
    $result = $sqliConn->excuteCUD($sql);

    if($result === 0){
        echo "1";
    }else{
        echo "0";
    }
?>