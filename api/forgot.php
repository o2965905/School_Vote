<!-- 負責執行font目錄下forgot.php的程式 -->
<?php
    include_once "base.php";

    $email = $_POST['email'];
    $pw =find('users',['email' => $email]);
    

    if (empty($pw)) { 
        // echo "查無此帳號";
        echo "<script type='text/javascript'>alert('查無此信箱');location.href ='../index.php'</script>";
        // to("../index.php");
    } else {
        // echo "<h2>你的密碼為:" . $pw['pw'] . "</h2>";
        echo "<script type='text/javascript'>alert('你的密碼為:" . $pw['pw'] . "');location.href ='../index.php?do=login'</script>";
        // to("../index.php");
    }
?>