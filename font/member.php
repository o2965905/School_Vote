<!-- 前台會員中心 -->
<?php
// 非會員導回首頁
if (!isset($_SESSION['user'])) {
    to("../index.php");
    exit();
}
$acc = all('users', ['acc' => $_SESSION['user']]);
// dd($account);
foreach ($acc as $key => $value) {
    // dd($value);
}

?>
<div class="reg_main">
    <div class="reg_header">
        <h1>會員中心</h1>
    </div>
    <div class="reg_container">
        <form action="./api/edit_member.php" method="post">
            <input type="hidden" name="id" value="<?= $value['id']; ?>">
            <label style="font-weight: 600;">帳號 : <?= $value['acc']; ?></label>
            <br>
            <input class="input1" type="text" name="pw" placeholder="請輸入密碼" value="<?= $value['pw']; ?>">
            <input class="input1" type="text" name="name" placeholder="請輸入姓名" value="<?= $value['name']; ?>">
            <input class="input1" type="date" name="birthday" value="<?= $value['birthday']; ?>">
            <input class="input1" type="email" name="email" placeholder="請輸入信箱" value="<?= $value['email']; ?>">
            <div>
                <input class="btn btn-info" type="submit" value="修改">
                <input class="btn btn-warning" type="reset" value="重置">
            </div>
        </form>
    </div>
</div>