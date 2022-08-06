<?php
session_start();

if (isset($_POST["codemeli"], $_POST["password"], $_POST["sub"])) {
    $codemeli = $_POST["codemeli"];
    $password = $_POST["password"];
    $_SESSION["codemeli"] = $codemeli;
    header("Location:report.php");
}
?>

<form action="" method="post">
    <input type="text" name="codemeli" placeholder="codemeli">
    <input type="text" name="password" placeholder="password">
    <input type="submit" name="sub">
</form>
