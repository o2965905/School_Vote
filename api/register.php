<!-- 負責執行font目錄下register.php的程式 -->
<?php
/*---------------------------------------------------------------------------------*/
include_once "base.php";
/*---------------------------------------------------------------------------------*/
// dd($_POST);
// exit();
$acc = $_POST['acc'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];

if (isset($_SESSION["error"])) {
    unset($_SESSION["error"]);
}
if (!empty($acc) && !empty($pw) && !empty($name) && !empty($birthday) && !empty($email)) {

    if (!empty($acc) && !empty($pw)) {
        $acc = rows('users', ['acc' => $_POST['acc']]);
        if ($acc > 0) {

            echo "<script type='text/javascript'>alert('此帳號已被註冊');location.href ='../index.php?do=register'</script>";
        } else {

            $add_user = [
                'acc' => $_POST['acc'],
                'pw' => $pw,
                'name' => $name,
                'birthday' => $birthday,
                'email' => $email,
            ];

            // dd($add_user);
            // exit();
            save('users', $add_user);
            /*---------------------------------------------------------------------------------*/
            to('../index.php?do=login');
            // to('./index.php?do=login');
        }
    }
} else {
    // $_SESSION["error"] = "註冊資料不完全";
    // to('../index.php?do=register');
    echo "<script type='text/javascript'>alert('填寫資料不完整');location.href ='../index.php?do=register'</script>";
}

?>