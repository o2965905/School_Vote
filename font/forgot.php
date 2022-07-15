<!-- 忘記密碼 -->
<div class="log_main">

    <div class="log_header">
        <h1>找回密碼</h1>
    </div>
    <div class="log_container">
        <form action="./api/forgot.php" method="post">
            <input class="input1" type="email" name="email" placeholder="請輸入註冊信箱">
            <div>
                <input class="btn btn-warning" type="submit" value="搜尋">
                <input class="btn btn-info" type="reset" value="清除">
            </div>
            <div class="forgot_pw">
                <a href="index.php">回首頁</a>
            </div>
        </form>
    </div>

</div>