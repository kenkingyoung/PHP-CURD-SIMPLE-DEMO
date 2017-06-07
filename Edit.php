<?php

    require_once ("Sqliconnect.class.php");

    $stuId = htmlspecialchars($_POST["id"]) ;
    $page = htmlspecialchars($_POST["page"]) ;
    $name = htmlspecialchars($_POST["inputName"]) ;
    $age = htmlspecialchars($_POST["inputAge"]);
    $sex = htmlspecialchars($_POST["inputSex"]);
    $grade = htmlspecialchars($_POST["inputGrade"]);
    $class = htmlspecialchars($_POST["inputClass"]);

    $sqliConn = new Sqliconnect();

    $sql = "update student set Name='".$name."', Age=".$age.", Sex='".$sex."', Grade='".$grade.
        "', Class='".$class."' where id=".$stuId;
    
    $result = $sqliConn->excuteCUD($sql);

    if($result === 0){
        echo "<script type='text/javascript'>alert('修改成功');location.href='Index.html?page=".$page."';</script>";
    }else{
        echo "<script type='text/javascript'>alert('修改失败');location.href='Edit.html?id=".$stuId."';</script>";
    }
?>