<!-- 登入頁面 -->
<div class="log_main">

    <div class="log_header">
        <h1>會員登入</h1>
    </div>
    <?php
    if (isset($_SESSION["error"])) {
        echo "<span style='color:tomato;margin-top:10px;font-weight:600;'>" . $_SESSION['error'] . "</span>";
    }
    ?>
    <div class="log_container">
        <form action="./api/login.php" method="post">
            <input class="input1" type="text" name="acc" placeholder="帳號">
            <input class="input1" type="password" name="pw" placeholder="密碼">
            <div>
                <input class="btn btn-info" type="submit" value="登入">
                <input class="btn btn-warning" type="button" value="註冊" onclick="location.href='?do=register'">
            </div>
            <div class="forgot_pw">
                <a href="?do=forgot">忘記密碼</a>
            </div>
        </form>
    </div>

</div>