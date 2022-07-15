<!-- 負責執行font目錄下vote.php的程式 -->
<!-- 負責記錄投票結果 -->
<?php
/*---------------------------------------------------------------------------------*/
include_once "base.php";
/*---------------------------------------------------------------------------------*/
// dd($_POST);
// dd($_SESSION["user"]);
// exit();

if (isset($_POST['opt'])) { //如果有選'投票項目',就執行以下事情

    $option = find('options', $_POST['opt']);//找到被投的選項
    $option['total']++;//該選項++
    save('options', $option);

    $subject = find('subjects', $option['subject_id']);//找到該選項對應的主題
    $subject['total']++;//該主題++
    save('subjects', $subject);

    $log = [ //紀錄投票

        // 'user_id' => (isset($_SESSION["user"])) ? $_SESSION["user"] : '',
        // 'user_id' => $_SESSION["user"],
        'subject_id' => $subject['id'],
        'option_id' => $option['id'],
    ];

    save('logs', $log);
}
// to('../index.php'); //導回首頁
to("../index.php?do=vote_result&id={$option['subject_id']}"); //導回該投票主題的結果頁面

?>