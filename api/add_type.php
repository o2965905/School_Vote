<!-- 負責執行back目錄下admin_type的程式 -->
<?php
/*---------------------------------------------------------------------------------*/
include_once "base.php";
/*---------------------------------------------------------------------------------*/
if (isset($_SESSION["error"])) {
    unset($_SESSION["error"]);
}

//檢查是否有帶內容
if (!empty($_POST['name'])) {

    //檢查分類名稱是否重複

    // dd($_POST['name']);
    // exit();
    $result = find('types', ['name' => $_POST['name']]);
    // dd($result);
    // exit();


    if ($result['name'] == $_POST['name']) {

        $_SESSION["error"] = "分類名稱已重複使用";
        to("../back.php?do=admin_type");
    } else {

        save('types', ['name' => $_POST['name']]);
        to("../back.php");
    }
} else {

    //     $_SESSION["error"] = "分類名稱不能為空白";
    //     to("../back.php?do=admin_type");
    echo "<script type='text/javascript'>alert('分類名稱不能為空白');location.href ='../back.php?do=admin_type'</script>";
}

?>