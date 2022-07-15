<!-- 負責執行font目錄下login.php的程式 -->
<?php
/*---------------------------------------------------------------------------------*/
include_once "base.php";
/*---------------------------------------------------------------------------------*/
// dd($_POST);

if (isset($_SESSION["error"])) {
    unset($_SESSION["error"]);
}

if (!empty($_POST['acc']) && !empty($_POST['pw'])) {

    $acc = all("users", ["acc" => "s1110219"]);
    $pw = all("users", ["pw" => "s1110219"]);
    // dd($acc);
    // dd($pw);
    // exit();

    foreach ($acc as $key => $value) {
        
        if (rows("users", $_POST) > 0 && $_POST["acc"] != "s1110219" && $_POST["pw"] != "s1110219") {
            $_SESSION["user"] = $_POST["acc"];
            to("../index.php");
        } else if ($_POST["acc"] == "s1110219" && $_POST["pw"] == "s1110219") {
            $_SESSION["user"] = $_POST["acc"];
            $_SESSION["admin"] = $_POST["acc"];
            to("../back.php");
        } else {
            $_SESSION["error"] = "帳號或密碼有錯誤";
            to("../index.php?do=login");
        }
    }
} else {
    $_SESSION["error"] = "帳號或密碼不能為空白";
    to("../index.php?do=login");
}



?>