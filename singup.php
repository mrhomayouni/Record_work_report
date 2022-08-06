<?php
require "_load.php";
$flag = false;
if (isset($_POST["name"], $_POST["family"], $_POST["password"], $_POST["send"], $_POST["codemeli"])) {
    $name = $_POST["name"];
    $family = $_POST["family"];
    $codemeli = $_POST["codemeli"];
    $password = $_POST["password"];
    $item = is_sing_up();
    $code = [];
    foreach ($item as $i) {
        $code[] = $i["code"];
    }
    $exist_code=in_array($codemeli, $code);
    if(!$exist_code){
        sing_up("$name", "$family", "$password", "$codemeli");
        header("Location:singin.php");

    }else{
        $flag=true;
    }
}

?>

    <form action="" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="family" placeholder="family">
        <input type="text" name="codemeli" placeholder="codemeli">
        <input type="text" name="password" placeholder="password">
        <input type="submit" name="send">

    </form>
<?php if ($flag == true) { ?>
    <div>
         قبلا ثبت نام کرده اید برای ورود
        <a href="singin.php"> اینجا </a>
        را کلیک کنید.
    </div>
<?php } ?>