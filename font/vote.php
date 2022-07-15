<!-- 執行投票項目的頁面 -->
<?php
/*---------------------------------------------------------------------------------*/
include_once "./api/base.php";
/*---------------------------------------------------------------------------------*/
// 非管理者或會員導引至登入畫面
if(!isset($_SESSION["user"])){
  to("./index.php?do=login");
  exit();
}
/*---------------------------------------------------------------------------------*/
// 顯示資料內容
$subject = find("subjects", $_GET['id']);
$opts = all('options', ['subject_id' => $_GET['id']]);

// dd($subject);
// dd($opts);

?>
<form class="vote_content" action="./api/vote.php" method="post">
    <h2 class="vote_subject"><?= $subject['subject']; ?></h2>
    <?php
    foreach ($opts as $opt) {
    ?>
        <div class="vote_option">
            <!-- 根據選項的id去判斷是選擇哪一個投票項目,所所以這裡的value是$opt['id'] -->
            <input class="vote_radio" type="radio" name="opt" value="<?= $opt['id']; ?>">
            <?= $opt['option']; ?>
        </div>

    <?php
    }
    ?>
    <input class="vote_btn" type="submit" value="投票">
    <input class="vote_re" type="reset" value="重選">
    <input class="vote_reset" type="reset" value="放棄" onclick="location.href='index.php'">
</form>