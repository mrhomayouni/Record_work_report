<?php

session_start();

try {
    $conn = new PDO("mysql:host=localhost;dbname=record_work_report", "root", "");
    $conn->exec("SET NAMES utf8");
} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}
function is_sing_up()
{
    global $conn;
    $sql = "SELECT `code` FROM `user`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user_singup = $stmt->fetchAll();
    return $user_singup;
}

function user($code)
{
    global $conn;
    $sql = "select * from `user` WHERE `code`=:code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("code", $code);
    $stmt->execute();
    $users = $stmt->fetch();
    return $users;
}

function sing_up($name, $family, $password, $codemelii)
{
    global $conn;
    $sql2 = "INSERT INTO `user`( `name`, `family`, `password`, `code`)
 VALUES (:name,:family,:password,:code)";
    $stmt = $conn->prepare($sql2);
    $stmt->bindParam("name", $name);
    $stmt->bindparam("family", $family);
    $stmt->bindparam("password", $password);
    $stmt->bindParam("code", $codemelii);
    $stmt->execute();
}

function save_report($date, $enter_h, $enter_m, $out_h, $out_m, $report, $user_code)
{
    global $conn;
    $sql = "INSERT INTO `report`(`date`, `enter_h`, `enter_m`, `out_h`, `out_m`, `report`, `user_code`) 
VALUES (:date, :enter_h, :enter_m, :out_h, :out_m, :report,:user_code)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam("enter_h", $enter_h);
    $stmt->bindParam("enter_m", $enter_m);
    $stmt->bindParam("out_h", $out_h);
    $stmt->bindParam("out_m", $out_m);
    $stmt->bindParam("report", $report);
    $stmt->bindParam("user_code", $user_code);
    $stmt->execute();
}

function get_report_date($code)
{
    global $conn;
    $sql = "SELECT `date` FROM `report` WHERE `user_code`=:code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("code", $code);
    $stmt->execute();
    $date = $stmt->fetchAll();
    return $date;
}


function chek_singin($code, $pass)
{
    global $conn;
    $sql = "SELECT * FROM `user` WHERE `code`=:code  AND `password`=:pass";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("code",$code);
    $stmt->bindParam("pass",$pass);
    $stmt->execute();
    $chek_user=$stmt->fetch(PDO::FETCH_ASSOC);
    return $chek_user;
}
