<?php

    require_once ("Sqliconnect.class.php");

    $name = htmlspecialchars($_POST["inputName"]) ;
    $age = htmlspecialchars($_POST["inputAge"]);
    $sex = htmlspecialchars($_POST["inputSex"]);
    $grade = htmlspecialchars($_POST["inputGrade"]);
    $class = htmlspecialchars($_POST["inputClass"]);

    $sqliConn = new Sqliconnect();

    $sql = "insert into student (Name, Age, Sex, Grade, Class) values ('".$name.
        "', ".$age.", '".$sex."', '".$grade."', '".$class."')";
    
    $result = $sqliConn->excuteCUD($sql);

    if($result === 0){
        echo "<script type='text/javascript'>alert('新增成功');location.href='Index.html';</script>";
    }else{
        echo "<script type='text/javascript'>alert('新增失败');</script>";
    }
?>