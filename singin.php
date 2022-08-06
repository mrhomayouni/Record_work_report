<?php
/*session_start();*/
require "_load.php";
if (isset($_POST["codemeli"], $_POST["password"], $_POST["sub"])) {
    $codemeli = $_POST["codemeli"];
    $password = $_POST["password"];
    $check_user=chek_singin($codemeli,$password);
   if($check_user===false){
       echo "کد ملی یا رمز عبور اشتباه است!!";
   }else{
       $_SESSION["codemeli"] = $codemeli;
       header("Location:report.php");
       exit();
   }

}
?>

<form action="" method="post">
    <input type="text" name="codemeli" placeholder="codemeli">
    <input type="text" name="password" placeholder="password">
    <input type="submit" name="sub">
</form>
