<?php
require "_load.php";
if (isset($_SESSION["codemeli"])) {
    $user = user($_SESSION["codemeli"]);
}
if (isset($_GET["sub"])) {
    save_report($_GET["date"], $_GET["enter_h"], $_GET["enter_m"], $_GET["out_h"], $_GET["out_m"], $_GET["report"], $user["code"]);


}
?>

<div class="name"> <?= $user["name"] . " " . $user["family"] ?></div>


<form action="" method="get">
    <input type="number" name="code" value="<?= $user["code"] ?>"> <br><br>
    <input type="date" name="date"> <br><br>
    ساعت ورود
    <select name="enter_h">
        <?php for($i=1;$i<24;$i++){?>
        <?php if($i==8){?> <option value="<?=$i?>" selected><?=$i?></option>
                <?php }else{ ?><option value="<?=$i?>" ><?=$i?></option>
        <?php }}?>
    </select>
    <select name="enter_m">
        <?php for($i=0;$i<60;$i+=5){?>
            <?php if($i==0){?> <option value="<?=$i?>" selected><?=$i?></option>
            <?php }else{ ?><option value="<?=$i?>" ><?=$i?></option>
            <?php }}?>
    </select> <br>
    ساعت خروج
    <select name="out_h">
        <?php for($i=1;$i<24;$i++){?>
            <?php if($i==14){?> <option value="<?=$i?>" selected><?=$i?></option>
            <?php }else{ ?><option value="<?=$i?>" ><?=$i?></option>
            <?php }}?>
    </select>
    <select name="out_m">
        <?php for($i=0;$i<60;$i+=5){?>
            <?php if($i==14){?> <option value="<?=$i?>" selected><?=$i?></option>
            <?php }else{ ?><option value="<?=$i?>" ><?=$i?></option>
            <?php }}?>
    </select> <br>
    <textarea name="report" cols="30" rows="10" placeholder="متن گزارش"></textarea> <br>
    <input type="submit" value="send" name="sub">
</form>
