<!-- 負責執行 back資料夾下 add_vote的程式 -->
<?php
/*---------------------------------------------------------------------------------*/
include_once "base.php";
// dd($_POST);
// exit();
/*---------------------------------------------------------------------------------*/
// 投票主題 + 活動開始時間 + 活動結束時間
$subject = $_POST['subject']; //主題
$start = $_POST['start']; //活動開始時間
$end = $_POST['end']; //活動結束時間
if (!empty($subject)) { //判斷'投票主題'欄位是否空白,如果不是空白就可以寫入資料庫

    $add_subject = [
        'subject' => $subject,
        'type_id' => $_POST['types'],
        'start' => $start,
        'end' => $end,
    ];

    save('subjects', $add_subject); //save(資料表名稱,寫入條件)
}
/*---------------------------------------------------------------------------------*/
// 投票項目 
$id = find('subjects', ['subject' => $subject])['id'];
if (isset($_POST['option'])) { //判斷如果'投票選項'有內容,使用foreach迴圈把選項內容一個個取出來
    foreach ($_POST['option'] as $opt) {
        if ($opt != "") { //'投票選項'的內容不是空白,就寫入options資料表
            $add_option = [
                'option' => $opt,
                'subject_id' => $id,
            ];
            save("options", $add_option);
        }
    }
}
/*---------------------------------------------------------------------------------*/
to('../back.php');
// to('./back.php');

?>