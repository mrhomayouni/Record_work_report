<?php

session_start();

try {
    $conn = new PDO("mysql:host=localhost;dbname=record_work_report", "root", "");
} catch (PDOException $e) {
    echo "error" . $e->getMessage();
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
