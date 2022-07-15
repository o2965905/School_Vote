<!-- 負責執行 back資料夾下 edit.php的程式 -->
<?php
/*---------------------------------------------------------------------------------*/
include_once "base.php";
/*---------------------------------------------------------------------------------*/
dd($_POST); //先測試接收過來的資料
//  exit();
/*---------------------------------------------------------------------------------*/
//修改投票主題 + 開始與結束日期 部分
$subject_id = $_POST['subject_id']; //接收來自表單傳來的舊內容
$new_subject = $_POST['subject']; //接收來自表單傳來要修改的內容文字 => 投票主題
$new_type = $_POST['types']; //接收來自表單傳來要修改的分類選項 => 投票分類
$new_start = $_POST['start']; //接收來自表單傳來要修改的日期 => 活動開始日期
$new_end = $_POST['end']; //接收來自表單傳來要修改的日期 => 活動結束日期

$subject = find('subjects', $subject_id); //把資料從資料庫撈出來
// dd($subject);//先測試撈出來的資料(修改前的舊資料)
// exit();

$subject['subject'] = $new_subject; //從資料庫撈出來的投票主題資料,請替換成$new_subject的新內容
$subject['type_id']=$new_type; //從資料庫撈出來的分類id,請替換成新的分類id
$subject['start'] = $new_start; //從資料庫撈出來的活動開始日期,請替換成新的內容
$subject['end'] = $new_end; //從資料庫撈出來的活動結束日期,請替換成新的內容
// dd($subject);//顯示修改過後的內容
// exit();

save('subjects', $subject);
// exit();
/*---------------------------------------------------------------------------------*/
// 修改投票選項部分
// $subject=find('subjects',$subject_id); => 因為這段有自帶id,所以直接拿來使用

$opts = all('options', ['subject_id' => $subject_id]); //這裡是資料表裡面的舊資料
// dd($opts); //先測試撈出的資料(修改前存在資料庫裡的舊資料)
// exit();

// 判斷選項內容在$opts是否存在 ,這裡的$opts => 用all()撈出資料庫資料判別
// 1.如果存在 ,就是要'更新'選項內容
// 2.如果不存在 ,就是要'新增'選項內容
foreach ($_POST['option'] as $key => $opt) {

    $exist = false; //先假設$exist為資料不存在
    foreach ($opts as $ot) { //這裡是判斷表單傳過來的資料是否已經存在資料庫
        if ($ot['id'] == $key) { //如果資料庫已存在資料
            $exist = true; //就把 $exist變數改成 true
            break; //如果 $exist=true =>資料存在,就中斷foreach迴圈,往下執行if判斷式的程式
        }
    }

    if ($exist) {
        // 條件1.如果$exist=true =>選項內容存在 => 更新文字內容
        $ot['option'] = $opt;
        save("options", $ot);
    } else {
        // 條件2.如果$exist=false =>選項內容不存在 => 新增文字內容
        $add_option = [
            'option' => $opt,
            'subject_id' => $subject_id,
        ];
        save("options", $add_option);
    }
}
/*---------------------------------------------------------------------------------*/
to('../back.php');
// to('./back.php');
?>